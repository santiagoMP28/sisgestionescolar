<?php
session_start(); // ✅ Solo una vez arriba



include (__DIR__ . '/../app/config.php');

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Preparar la consulta segura
$sql = "SELECT * FROM usuarios WHERE email = :email AND estado = '1' ";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();

$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password, $usuario['password'])) {
    $_SESSION['mensaje'] = "Bienvenido al sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['sesion_email'] = $email;
    header('Location:' . APP_URL);
    exit;
} else {
    $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo";
    header('Location:' . APP_URL);
    exit;
}
