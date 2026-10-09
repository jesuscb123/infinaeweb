<?php

declare(strict_types=1);

/**
 * Cliente SMTP mínimo — Infinae.
 *
 * Implementa lo justo del protocolo SMTP (RFC 5321) para enviar un correo de
 * texto plano autenticado, sin librerías externas ni Composer. Pensado para
 * hosting compartido (cPanel / Apache) con PHP 8+.
 */

/**
 * Abre la conexión TCP (o TLS implícito si $secure=ssl) con el servidor SMTP.
 *
 * @return resource|false
 */
function infinae_smtp_connect(string $host, int $port, string $secure, int $timeout)
{
    $transport = strtolower($secure) === 'ssl' ? 'ssl://' : 'tcp://';

    $socket = @stream_socket_client(
        $transport . $host . ':' . $port,
        $errno,
        $errstr,
        $timeout
    );

    if ($socket === false) {
        error_log("infinae_smtp: no se pudo conectar a {$host}:{$port} ({$transport}) — error {$errno}: {$errstr}. Puede que el hosting bloquee conexiones SMTP salientes a ese host/puerto.");
    }

    return $socket;
}

/**
 * Lee una respuesta SMTP completa. El servidor puede partirla en varias
 * líneas (p.ej. "250-PIPELINING" ... "250 OK"); las líneas intermedias usan
 * un guion tras el código y la última usa un espacio, así que paramos ahí.
 *
 * @param resource $socket
 */
function infinae_smtp_read($socket): string
{
    $response = '';
    while (!feof($socket)) {
        $line = fgets($socket, 515);
        if ($line === false) {
            break;
        }
        $response .= $line;
        if (preg_match('/^\d{3} /', $line)) {
            break;
        }
    }
    return $response;
}

/**
 * Envía un comando SMTP (añadiendo el CRLF final) y comprueba que la
 * respuesta del servidor empiece por el código de éxito esperado. Si falla,
 * registra la respuesta del servidor con un $context legible (nunca el
 * comando en sí, para no dejar credenciales de AUTH en el log).
 *
 * @param resource $socket
 */
function infinae_smtp_command($socket, string $command, string $expectedCode, string $context): bool
{
    fwrite($socket, $command . "\r\n");
    $response = infinae_smtp_read($socket);
    $ok = strpos($response, $expectedCode) === 0;
    if (!$ok) {
        error_log("infinae_smtp: paso '{$context}' fallido (se esperaba código {$expectedCode}). Respuesta del servidor: " . trim($response));
    }
    return $ok;
}

/**
 * Aplica "dot-stuffing" (RFC 5321 §4.5.2): si una línea del mensaje empieza
 * por un punto, se duplica ese punto. Es obligatorio porque el propio
 * protocolo usa una línea con un único "." para marcar el fin de los datos;
 * sin este escape, una línea de usuario que empezara por "." cortaría el
 * correo a la mitad.
 */
function infinae_smtp_dot_stuff(string $mensaje): string
{
    $lineas = explode("\r\n", str_replace("\n", "\r\n", $mensaje));
    foreach ($lineas as &$linea) {
        if (isset($linea[0]) && $linea[0] === '.') {
            $linea = '.' . $linea;
        }
    }
    return implode("\r\n", $lineas);
}

/**
 * Elimina CR/LF y bytes nulos de un valor que va a insertarse en una
 * cabecera de correo, para evitar header injection.
 */
function infinae_smtp_header_safe(string $v): string
{
    return trim(str_replace(["\r", "\n", "\0"], '', $v));
}

/**
 * Envía un correo por SMTP autenticado siguiendo la conversación estándar:
 * banner → EHLO → STARTTLS (si aplica) → AUTH LOGIN → MAIL FROM → RCPT TO →
 * DATA → cuerpo → QUIT. La configuración se lee de las variables de entorno
 * cargadas por bootstrap.php (SMTP_HOST, SMTP_PORT, SMTP_SECURE, SMTP_USER,
 * SMTP_PASS, SMTP_FROM_EMAIL).
 *
 * @param string        $to      Destinatario (ya validado como email por el llamador).
 * @param array<string> $headers Cabeceras RFC 822 completas (From, To, Subject...).
 * @param string        $cuerpo  Cuerpo del mensaje en texto plano.
 */
function infinae_smtp_send(string $to, array $headers, string $cuerpo): bool
{
    $host   = (string) getenv('SMTP_HOST');
    $port   = (int) getenv('SMTP_PORT');
    $secure = (string) getenv('SMTP_SECURE');
    $user   = (string) getenv('SMTP_USER');
    $pass   = (string) getenv('SMTP_PASS');
    $from   = (string) getenv('SMTP_FROM_EMAIL');
    $timeout = 10;

    $socket = infinae_smtp_connect($host, $port, $secure, $timeout);
    if ($socket === false) {
        return false;
    }

    stream_set_timeout($socket, $timeout);

    $bannerResponse = infinae_smtp_read($socket);
    $ok = strpos($bannerResponse, '220') === 0;
    if (!$ok) {
        error_log("infinae_smtp: paso 'banner inicial' fallido (se esperaba código 220). Respuesta del servidor: " . trim($bannerResponse));
    }

    $ehloHost = gethostname() ?: ($_SERVER['SERVER_NAME'] ?? 'localhost');
    $ok = $ok && infinae_smtp_command($socket, 'EHLO ' . $ehloHost, '250', 'EHLO');

    if ($ok && strtolower($secure) === 'tls') {
        $ok = infinae_smtp_command($socket, 'STARTTLS', '220', 'STARTTLS');
        if ($ok) {
            $cryptoOk = @stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            if (!$cryptoOk) {
                error_log('infinae_smtp: fallo al negociar TLS (stream_socket_enable_crypto). Revisa que la extensión OpenSSL de PHP esté activa en el hosting.');
            }
            $ok = $cryptoOk;
        }
        // El servidor "olvida" el EHLO anterior al cifrar la conexión; hay que repetirlo.
        $ok = $ok && infinae_smtp_command($socket, 'EHLO ' . $ehloHost, '250', 'EHLO tras STARTTLS');
    }

    if ($ok && $user !== '') {
        $ok = infinae_smtp_command($socket, 'AUTH LOGIN', '334', 'AUTH LOGIN');
        $ok = $ok && infinae_smtp_command($socket, base64_encode($user), '334', 'AUTH usuario');
        $ok = $ok && infinae_smtp_command($socket, base64_encode($pass), '235', 'AUTH contraseña');
    }

    $ok = $ok && infinae_smtp_command($socket, 'MAIL FROM:<' . $from . '>', '250', 'MAIL FROM');
    $ok = $ok && infinae_smtp_command($socket, 'RCPT TO:<' . $to . '>', '250', 'RCPT TO');
    $ok = $ok && infinae_smtp_command($socket, 'DATA', '354', 'DATA');

    if ($ok) {
        $mensaje = infinae_smtp_dot_stuff(implode("\r\n", $headers) . "\r\n\r\n" . $cuerpo);
        fwrite($socket, $mensaje . "\r\n.\r\n");
        $finalResponse = infinae_smtp_read($socket);
        $ok = strpos($finalResponse, '250') === 0;
        if (!$ok) {
            error_log("infinae_smtp: paso 'envío del cuerpo (DATA)' fallido (se esperaba código 250). Respuesta del servidor: " . trim($finalResponse));
        }
    }

    if (is_resource($socket)) {
        @infinae_smtp_command($socket, 'QUIT', '221', 'QUIT');
        fclose($socket);
    }

    return $ok;
}
