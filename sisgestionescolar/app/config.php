<?php
/**
 * Configuración para PostgreSQL en Render
 */

// Inicia la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuración de la base de datos
define('SERVIDOR', 'dpg-cvqv76euk2gs73c2ugig-a.oregon-postgres.render.com');
define('USUARIO', 'sisgestion_escolar_user');
define('PASSWORD', 'XEoM2JZ6mzJVhRcwGTUFp4k4L1ymzmwl');
define('BD', 'sisgestion_escolar');
define('PUERTO', '5432');

// Configuración de la aplicación
define('APP_NAME', 'SISTEMA DE GESTIÓN ESCOLAR');
define('APP_URL', 'https://sisgestionescolar-1.onrender.com');
define('KEY_API_MAPS', ''); // Llave de Google Maps (opcional)

// Configuración regional
date_default_timezone_set('America/Caracas');

// Fechas globales
define('FECHA_HORA', date('Y-m-d H:i:s'));
define('FECHA_ACTUAL', date('Y-m-d'));
define('DIA_ACTUAL', date('d'));
define('MES_ACTUAL', date('m'));
define('ANO_ACTUAL', date('Y'));

// Estado de registro por defecto
define('ESTADO_REGISTRO_ACTIVO', '1');

// Conexión a PostgreSQL
$dsn = "pgsql:host=" . SERVIDOR . ";port=" . PUERTO . ";dbname=" . BD;

try {
    $pdo = new PDO($dsn, USUARIO, PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Evita mostrar errores en producción
    error_log('Error de conexión a la base de datos: ' . $e->getMessage());

    // Redirige a la página de error si las cabeceras no han sido enviadas
    if (!headers_sent()) {
        header('Location: ' . APP_URL . '/error.php');
        exit;
    } else {
        echo "Error de conexión. Por favor, inténtelo más tarde.";
        exit;
    }
}
