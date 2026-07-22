<?php
/**
 * Infinae — endpoint del formulario de contacto.
 * Recibe JSON desde fetch(), valida en servidor y envía el mensaje.
 * Nota de despliegue: mail() requiere un transporte de correo (sendmail/SMTP)
 * configurado en el servidor de producción; en entorno local sin ese
 * transporte, la validación funciona pero el envío devolverá error.
 */
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Datos no válidos.']);
    exit;
}

$nombre  = trim((string)($data['nombre'] ?? ''));
$empresa = trim((string)($data['empresa'] ?? ''));
$email   = trim((string)($data['email'] ?? ''));
$mensaje = trim((string)($data['mensaje'] ?? ''));

$errors = [];
if ($nombre === '' || mb_strlen($nombre) > 120) {
    $errors[] = 'nombre';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'email';
}
if ($mensaje === '' || mb_strlen($mensaje) > 4000) {
    $errors[] = 'mensaje';
}
if (mb_strlen($empresa) > 150) {
    $errors[] = 'empresa';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Revisa estos campos antes de enviar: ' . implode(', ', $errors) . '.',
    ]);
    exit;
}

$to      = 'info@infinaeconsulting.com';
$subject = 'Nuevo mensaje de contacto — infinaeconsulting.com';
$body    = "Nombre: {$nombre}\n"
         . 'Empresa: ' . ($empresa !== '' ? $empresa : '—') . "\n"
         . "Email: {$email}\n\n"
         . "Mensaje:\n{$mensaje}\n";

$headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'From: web@infinaeconsulting.com',
    'Reply-To: ' . $email,
];

$sent = @mail($to, $subject, $body, implode("\r\n", $headers));

if ($sent) {
    echo json_encode(['success' => true]);
    exit;
}

http_response_code(500);
echo json_encode([
    'success' => false,
    'message' => 'No se pudo enviar el mensaje. Escríbenos directamente a info@infinaeconsulting.com.',
]);
