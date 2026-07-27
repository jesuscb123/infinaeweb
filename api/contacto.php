<?php
/**
 * Infinae — endpoint del formulario de contacto.
 * Recibe JSON desde fetch(), valida en servidor y envía el mensaje por SMTP
 * (PHPMailer). La configuración del transporte vive en variables de entorno
 * (.env en local, variables reales del servidor en producción) — ver .env.example.
 */
declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\PHPMailer;

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

$nombre     = trim((string)($data['nombre'] ?? ''));
$empresa    = trim((string)($data['empresa'] ?? ''));
$email      = trim((string)($data['email'] ?? ''));
$mensaje    = trim((string)($data['mensaje'] ?? ''));
$privacidad = (bool)($data['privacidad'] ?? false);

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
if (!$privacidad) {
    $errors[] = 'privacidad';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Revisa estos campos antes de enviar: ' . implode(', ', $errors) . '.',
    ]);
    exit;
}

$smtpConfigKeys = ['SMTP_HOST', 'SMTP_PORT', 'SMTP_USER', 'SMTP_PASS', 'SMTP_FROM_EMAIL', 'CONTACT_TO_EMAIL'];
foreach ($smtpConfigKeys as $key) {
    if (getenv($key) === false || getenv($key) === '') {
        error_log("contacto.php: falta la variable de entorno {$key} (revisa .env)");
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'El formulario no está disponible en este momento. Escríbenos directamente a info@infinaeconsulting.com.',
        ]);
        exit;
    }
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = getenv('SMTP_HOST');
    $mail->Port       = (int)getenv('SMTP_PORT');
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv('SMTP_USER');
    $mail->Password   = getenv('SMTP_PASS');
    $mail->SMTPSecure = getenv('SMTP_SECURE') === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->CharSet    = PHPMailer::CHARSET_UTF8;

    $mail->setFrom(getenv('SMTP_FROM_EMAIL'), getenv('SMTP_FROM_NAME') ?: 'Infinae Web');
    $mail->addAddress(getenv('CONTACT_TO_EMAIL'), getenv('CONTACT_TO_NAME') ?: 'Infinae');
    $mail->addReplyTo($email, $nombre);

    $mail->isHTML(false);
    $mail->Subject = 'Nuevo mensaje de contacto — infinaeconsulting.com';
    $mail->Body    = "Nombre: {$nombre}\n"
                   . 'Empresa: ' . ($empresa !== '' ? $empresa : '—') . "\n"
                   . "Email: {$email}\n\n"
                   . "Mensaje:\n{$mensaje}\n";

    $mail->send();

    echo json_encode(['success' => true]);
} catch (PHPMailerException $e) {
    error_log('contacto.php: fallo al enviar por SMTP — ' . $mail->ErrorInfo);
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'No se pudo enviar el mensaje. Escríbenos directamente a info@infinaeconsulting.com.',
    ]);
}
