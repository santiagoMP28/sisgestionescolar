<?php
session_start();

include (__DIR__ . '/../app/config.php');

// Verificar que se haya enviado el formulario por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['mensaje'] = "Acceso no permitido";
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL);
    exit;
}

// Recibir y limpiar datos
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

// Validar datos mínimos
if (empty($email) || empty($password)) {
    $_SESSION['mensaje'] = "Por favor, completa todos los campos";
    $_SESSION['icono'] = "warning";
    header('Location: ' . APP_URL);
    exit;
}

try {
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
        $_SESSION['sesion_rol'] = $usuario['rol_id'];

        // Definir rutas por rol
        $rutasPorRol = [
            1 => APP_URL . '/admin/index.php',        // ADMINISTRADOR
            6 => APP_URL . '/docentes/index.php',     // DOCENTE
            7 => APP_URL . '/estudiantes/index.php',  // ESTUDIANTE
        ];

        // Redirección según el rol
        $ruta = $rutasPorRol[$usuario['rol_id']] ?? APP_URL;

        if (!isset($rutasPorRol[$usuario['rol_id']])) {
            $_SESSION['mensaje'] = "No se ha definido una ruta para este rol";
            $_SESSION['icono'] = "error";
        }

        header('Location: ' . $ruta);
        exit;
    } else {
        $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL);
        exit;
    }
} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    $_SESSION['mensaje'] = "Error del servidor: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL);
    exit;
}
