<?php
/**
 * Infinae — SOLO PARA PRUEBAS.
 * Previsualiza el diseño del correo de contacto con datos de ejemplo
 * y permite enviarse una copia real (por el SMTP configurado en .env)
 * para verlo en un cliente de correo de verdad.
 *
 * IMPORTANTE: borrar este archivo antes de publicar en producción,
 * ya que permite disparar envíos de correo desde el navegador.
 */
declare(strict_types=1);

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/smtp.php';
require __DIR__ . '/email-template.php';

$muestra = [
    'nombre'  => 'María López',
    'empresa' => 'Bodegas del Sur, S.L.',
    'email'   => 'maria.lopez@bodegasdelsur.com',
    'mensaje' => "Hola,\n\nNos gustaría recibir más información sobre vuestros servicios de call center B2B para el segundo semestre. ¿Podríais llamarnos esta semana?\n\nGracias,\nMaría",
];

$enviado    = null;
$errorEnvio = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destino = trim((string)($_POST['destino'] ?? ''));

    if (!filter_var($destino, FILTER_VALIDATE_EMAIL)) {
        $errorEnvio = 'Introduce un email válido para recibir la prueba.';
    } else {
        $smtpConfigKeys = ['SMTP_HOST', 'SMTP_PORT', 'SMTP_USER', 'SMTP_PASS', 'SMTP_FROM_EMAIL'];
        $faltan = [];
        foreach ($smtpConfigKeys as $k) {
            if (getenv($k) === false || getenv($k) === '') {
                $faltan[] = $k;
            }
        }

        if ($faltan) {
            $errorEnvio = 'Falta configurar el SMTP en tu .env (' . implode(', ', $faltan) . ').';
        } else {
            $fromEmail = (string) getenv('SMTP_FROM_EMAIL');
            $fromName  = getenv('SMTP_FROM_NAME') ?: 'Infinae Web';

            $asunto     = '[PRUEBA] Nuevo mensaje de contacto — infinaeconsulting.com';
            $asuntoMime = '=?UTF-8?B?' . base64_encode($asunto) . '?=';

            $multipart = infinae_contact_multipart_body($muestra['nombre'], $muestra['empresa'], $muestra['email'], $muestra['mensaje']);

            $headers = [
                'From: ' . infinae_smtp_header_safe($fromName) . ' <' . $fromEmail . '>',
                'To: ' . infinae_smtp_header_safe($destino) . ' <' . $destino . '>',
                'Reply-To: ' . infinae_smtp_header_safe($muestra['nombre']) . ' <' . $muestra['email'] . '>',
                'Subject: ' . $asuntoMime,
                'MIME-Version: 1.0',
                'Content-Type: multipart/alternative; boundary="' . $multipart['boundary'] . '"',
                'X-Mailer: Infinae-SMTP/1.0',
            ];

            $enviado = infinae_smtp_send($destino, $headers, $multipart['body']);
        }
    }
}

$fecha      = date('d/m/Y H:i');
$htmlCorreo = infinae_contact_email_html($muestra['nombre'], $muestra['empresa'], $muestra['email'], $muestra['mensaje'], $fecha);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vista previa — correo de contacto Infinae</title>
<style>
  body { margin:0; padding:24px; background:#F4F5F7; font-family: Arial, Helvetica, sans-serif; color:#1D3557; }
  .aviso { max-width:900px; margin:0 auto 20px; background:#FFF3E0; border:1px solid #E87722; color:#7a3d0a; padding:14px 18px; border-radius:8px; font-size:14px; }
  .panel { max-width:900px; margin:0 auto 20px; background:#FFFFFF; border-radius:8px; padding:20px 24px; box-shadow:0 1px 4px rgba(0,0,0,.08); }
  h1 { font-size:18px; margin:0 0 4px; color:#1D3557; }
  p.sub { margin:0 0 16px; font-size:13px; color:#6B7280; }
  form { display:flex; gap:10px; flex-wrap:wrap; align-items:center; }
  input[type=email] { flex:1; min-width:220px; padding:10px 12px; border:1px solid #D1D5DB; border-radius:6px; font-size:14px; }
  button { background:#E87722; color:#fff; border:0; padding:10px 18px; border-radius:6px; font-size:14px; font-weight:bold; cursor:pointer; }
  button:hover { background:#cf6812; }
  .msg-ok { color:#166534; font-size:14px; margin-top:10px; }
  .msg-error { color:#b91c1c; font-size:14px; margin-top:10px; }
  iframe { width:100%; height:900px; border:1px solid #E5E7EB; border-radius:8px; background:#F4F5F7; }
  .frame-wrap { max-width:900px; margin:0 auto; }
</style>
</head>
<body>

  <div class="aviso">
    ⚠️ Archivo de prueba — muestra datos de ejemplo y envía correos reales usando tu SMTP de <code>.env</code>.
    Elimínalo antes de publicar el sitio en producción (<code>api/preview-correo.php</code>).
  </div>

  <div class="panel">
    <h1>Vista previa del correo de contacto</h1>
    <p class="sub">Así verá el mensaje la persona que reciba el formulario de <code>infinaeconsulting.com</code>. Los datos son de ejemplo.</p>

    <form method="post">
      <input type="email" name="destino" placeholder="tu-email@ejemplo.com" required>
      <button type="submit">Enviarme una prueba real</button>
    </form>

    <?php if ($errorEnvio !== null): ?>
      <p class="msg-error"><?= htmlspecialchars($errorEnvio, ENT_QUOTES, 'UTF-8') ?></p>
    <?php elseif ($enviado === true): ?>
      <p class="msg-ok">Correo de prueba enviado. Revisa tu bandeja de entrada (y spam).</p>
    <?php elseif ($enviado === false): ?>
      <p class="msg-error">No se pudo enviar por SMTP. Revisa las credenciales en <code>.env</code> y que el servidor tenga salida al puerto SMTP configurado.</p>
    <?php endif; ?>
  </div>

  <div class="frame-wrap">
    <iframe title="Vista previa del correo" srcdoc="<?= htmlspecialchars($htmlCorreo, ENT_QUOTES, 'UTF-8') ?>"></iframe>
  </div>

</body>
</html>
