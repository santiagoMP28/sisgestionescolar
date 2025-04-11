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

    // Verificamos si existe la clave 'rol' antes de usarla
    if (isset($usuario['rol'])) {
        $_SESSION['sesion_rol'] = $usuario['rol'];

        // Redirección dependiendo del rol
        if ($usuario['rol'] === 'admin') {
            header('Location:' . APP_URL . '/admin/index.php');
        } elseif ($usuario['rol'] === 'usuario') {
            header('Location:' . APP_URL . '/usuarios/index.php');
        } else {
            // Por si el rol no es reconocido
            header('Location:' . APP_URL);
        }
    } else {
        // Si no existe el rol, lo redirigimos de forma segura
        $_SESSION['mensaje'] = "No se ha definido un rol para este usuario";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL);
    }

    exit;
} else {
    $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL);
    exit;
}
