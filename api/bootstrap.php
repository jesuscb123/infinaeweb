<?php
/**
 * Arranque común de las APIs: carga de variables de entorno.
 * Las variables ya definidas a nivel de servidor (getenv) tienen prioridad
 * sobre las del archivo .env, que solo cubre el hueco en desarrollo local.
 */
declare(strict_types=1);

function infinae_load_env(string $path): void
{
    if (!is_file($path)) {
        return;
    }

    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }

        [$name, $value] = array_pad(explode('=', $line, 2), 2, '');
        $name = trim($name);
        $value = trim($value);
        if ($name === '' || getenv($name) !== false) {
            continue;
        }

        if (strlen($value) > 1 && $value[0] === $value[-1] && in_array($value[0], ['"', "'"], true)) {
            $value = substr($value, 1, -1);
        }

        putenv("{$name}={$value}");
        $_ENV[$name] = $value;
    }
}

infinae_load_env(__DIR__ . '/../.env');
