<?php
/**
 * Configuración para InfinityFree
 */

// Datos de InfinityFree
define('SERVIDOR','sql200.infinityfree.com');
define('USUARIO','if0_38689096');
define('PASSWORD','OwvvFsk0dpJpp');
define('BD','if0_38689096_sisgestion_escolar'); // Cambia XXX por el nombre exacto de tu base de datos

define('APP_NAME','SISTEMA DE GESTIÓN ESCOLAR');
define('APP_URL','https://if0_38689096.epizy.com'); // Cambia si tienes un dominio personalizado
define('KEY_API_MAPS','');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    print_r($e);
    echo "Error: no se pudo conectar a la base de datos";
}

date_default_timezone_set("America/Caracas");

$fechaHora = date('Y-m-d H:i:s');
$fecha_actual = date('Y-m-d');
$dia_actual = date('d');
$mes_actual = date('m');
$ano_actual = date('Y');
$estado_de_registro = '1';
