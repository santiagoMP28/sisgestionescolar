<?php
/**
 * Configuración para PostgreSQL en Render
 */

// Solo inicia la sesión si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define('SERVIDOR', 'dpg-cvqv76euk2gs73c2ugig-a.oregon-postgres.render.com');
define('USUARIO', 'sisgestion_escolar_user');
define('PASSWORD', 'XEoM2JZ6mzJVhRcwGTUFp4k4L1ymzmwl');
define('BD', 'sisgestion_escolar');
define('PUERTO', '5432');

define('APP_NAME', 'SISTEMA DE GESTIÓN ESCOLAR');
define('APP_URL', 'https://sisgestionescolar-1.onrender.com');
define('KEY_API_MAPS', '');

// Conexión PostgreSQL
$dsn = "pgsql:host=" . SERVIDOR . ";port=" . PUERTO . ";dbname=" . BD . ";";

try {
    $pdo = new PDO($dsn, USUARIO, PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

date_default_timezone_set("America/Caracas");

$fechaHora = date('Y-m-d H:i:s');
$fecha_actual = date('Y-m-d');
$dia_actual = date('d');
$mes_actual = date('m');
$ano_actual = date('Y');
$estado_de_registro = '1';
