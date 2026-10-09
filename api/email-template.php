<?php
/**
 * Infinae — plantilla del correo de contacto.
 * Genera el cuerpo de texto plano y el HTML con el diseño de marca
 * (naranja #E87722 / azul #1D3557), y arma el cuerpo multipart/alternative
 * que envía api/smtp.php, para que el mensaje llegue bien a cualquier cliente.
 */
declare(strict_types=1);

function infinae_contact_text_body(string $nombre, string $empresa, string $email, string $mensaje): string
{
    return "Nombre: {$nombre}\n"
         . 'Empresa: ' . ($empresa !== '' ? $empresa : '—') . "\n"
         . "Email: {$email}\n\n"
         . "Mensaje:\n{$mensaje}\n";
}

function infinae_contact_email_html(string $nombre, string $empresa, string $email, string $mensaje, string $fecha): string
{
    $nombreEsc       = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
    $empresaEsc      = htmlspecialchars($empresa !== '' ? $empresa : '—', ENT_QUOTES, 'UTF-8');
    $emailEsc        = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $mensajeEsc      = nl2br(htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'));
    $fechaEsc        = htmlspecialchars($fecha, ENT_QUOTES, 'UTF-8');
    $primerNombre    = explode(' ', trim($nombre))[0] ?? '';
    $primerNombreEsc = htmlspecialchars($primerNombre !== '' ? $primerNombre : 'la persona interesada', ENT_QUOTES, 'UTF-8');

    return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nuevo mensaje de contacto — Infinae</title>
</head>
<body style="margin:0;padding:0;background-color:#F4F5F7;font-family:Arial, Helvetica, sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#F4F5F7;padding:32px 16px;">
<tr>
<td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background-color:#FFFFFF;border-radius:8px;overflow:hidden;">

<tr>
<td style="background-color:#1D3557;padding:28px 32px;">
<table role="presentation" cellpadding="0" cellspacing="0">
<tr>
<td style="width:10px;height:26px;background-color:#E87722;border-radius:2px;">&nbsp;</td>
<td style="padding-left:12px;">
<span style="font-size:22px;font-weight:bold;color:#FFFFFF;letter-spacing:1px;font-family:Arial, Helvetica, sans-serif;">INFINAE</span>
</td>
</tr>
</table>
</td>
</tr>

<tr>
<td style="padding:28px 32px 8px 32px;">
<p style="margin:0;font-size:12px;font-weight:bold;color:#E87722;letter-spacing:.5px;text-transform:uppercase;">Nuevo mensaje de contacto</p>
<h1 style="margin:6px 0 0 0;font-size:20px;line-height:1.3;color:#1D3557;font-family:Arial, Helvetica, sans-serif;">Alguien ha escrito desde infinaeconsulting.com</h1>
</td>
</tr>

<tr>
<td style="padding:16px 32px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
<tr>
<td style="padding:10px 0;border-bottom:1px solid #E5E7EB;font-size:13px;color:#6B7280;width:100px;vertical-align:top;">Nombre</td>
<td style="padding:10px 0;border-bottom:1px solid #E5E7EB;font-size:14px;color:#1D3557;font-weight:bold;">{$nombreEsc}</td>
</tr>
<tr>
<td style="padding:10px 0;border-bottom:1px solid #E5E7EB;font-size:13px;color:#6B7280;vertical-align:top;">Empresa</td>
<td style="padding:10px 0;border-bottom:1px solid #E5E7EB;font-size:14px;color:#22303F;">{$empresaEsc}</td>
</tr>
<tr>
<td style="padding:10px 0;font-size:13px;color:#6B7280;vertical-align:top;">Email</td>
<td style="padding:10px 0;font-size:14px;">
<a href="mailto:{$emailEsc}" style="color:#E87722;text-decoration:none;font-weight:bold;">{$emailEsc}</a>
</td>
</tr>
</table>
</td>
</tr>

<tr>
<td style="padding:8px 32px 24px 32px;">
<p style="margin:0 0 8px 0;font-size:13px;color:#6B7280;">Mensaje</p>
<div style="background-color:#F9FAFB;border:1px solid #E5E7EB;border-radius:6px;padding:16px;font-size:14px;line-height:1.6;color:#22303F;">
{$mensajeEsc}
</div>
</td>
</tr>

<tr>
<td style="padding:0 32px 32px 32px;">
<table role="presentation" cellpadding="0" cellspacing="0">
<tr>
<td style="border-radius:6px;background-color:#E87722;">
<a href="mailto:{$emailEsc}" style="display:inline-block;padding:12px 24px;font-size:14px;font-weight:bold;color:#FFFFFF;text-decoration:none;border-radius:6px;font-family:Arial, Helvetica, sans-serif;">Responder a {$primerNombreEsc}</a>
</td>
</tr>
</table>
</td>
</tr>

<tr>
<td style="background-color:#F4F5F7;padding:20px 32px;border-top:1px solid #E5E7EB;">
<p style="margin:0;font-size:12px;color:#9CA3AF;">Mensaje generado automáticamente desde el formulario de contacto de <a href="https://infinaeconsulting.com" style="color:#9CA3AF;">infinaeconsulting.com</a> · {$fechaEsc}</p>
</td>
</tr>

</table>
</td>
</tr>
</table>
</body>
</html>
HTML;
}

/**
 * Arma el cuerpo multipart/alternative (texto + HTML) listo para pasar a
 * infinae_smtp_send() junto con un header Content-Type que use el mismo boundary.
 *
 * @return array{boundary: string, body: string}
 */
function infinae_contact_multipart_body(string $nombre, string $empresa, string $email, string $mensaje): array
{
    $boundary = md5(uniqid((string) mt_rand(), true));
    $fecha    = date('d/m/Y H:i');

    $textoPlano = infinae_contact_text_body($nombre, $empresa, $email, $mensaje);
    $html       = infinae_contact_email_html($nombre, $empresa, $email, $mensaje, $fecha);

    $body = "--{$boundary}\r\n"
          . "Content-Type: text/plain; charset=UTF-8\r\n"
          . "Content-Transfer-Encoding: 8bit\r\n\r\n"
          . $textoPlano . "\r\n\r\n"
          . "--{$boundary}\r\n"
          . "Content-Type: text/html; charset=UTF-8\r\n"
          . "Content-Transfer-Encoding: 8bit\r\n\r\n"
          . $html . "\r\n\r\n"
          . "--{$boundary}--";

    return ['boundary' => $boundary, 'body' => $body];
}
