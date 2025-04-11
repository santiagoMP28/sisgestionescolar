<?php
session_start();

include (__DIR__ . '/../app/config.php');

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Preparar la consulta segura
$sql = "SELECT * FROM usuarios WHERE email = :email AND estado = '1'";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();

$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password, $usuario['password'])) {
    $_SESSION['mensaje'] = "Bienvenido al sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['sesion_email'] = $email;
    $_SESSION['sesion_rol'] = $usuario['rol_id']; // corregido

    // Redirección dependiendo del rol_id
    switch ($usuario['rol_id']) {
        case 1: // ADMINISTRADOR
            header('Location:' . APP_URL . '/admin/index.php');
            break;
        case 6: // DOCENTE
            header('Location:' . APP_URL . '/docentes/index.php');
            break;
        case 7: // ESTUDIANTE
            header('Location:' . APP_URL . '/estudiantes/index.php');
            break;
        default:
            // Rol no reconocido
            $_SESSION['mensaje'] = "No se ha definido una ruta para este rol";
            $_SESSION['icono'] = "error";
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
