<?php
session_start();

include (__DIR__ . '/../app/config.php');

// Recoger los datos del formulario de forma segura
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validar que se envió el email y el password
if (empty($email) || empty($password)) {
    $_SESSION['mensaje'] = "Por favor, completa todos los campos.";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL);
    exit;
}

// Preparar la consulta segura
$sql = "SELECT * FROM usuarios WHERE email = :email AND estado = '1'";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();

$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password, $usuario['password'])) {
    // Asignar variables de sesión de forma segura
    session_regenerate_id(true); // Regenerar ID de sesión por seguridad

    $_SESSION['mensaje'] = "Bienvenido al sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['sesion_email'] = $email;
    $_SESSION['sesion_rol'] = $usuario['rol'];

    // Redirección dependiendo del rol
    switch ($usuario['rol']) {
        case 'admin':
            header('Location:' . APP_URL . '/admin/index.php');
            break;
        case 'usuario':
            header('Location:' . APP_URL . '/usuarios/index.php');
            break;
        default:
            header('Location:' . APP_URL);
            break;
    }
    exit;
} else {
    $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL);
    exit;
}
