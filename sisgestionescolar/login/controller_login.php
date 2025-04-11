<?php
session_start();

// Definir base path para rutas absolutas
define('BASE_PATH', dirname(__DIR__));

// Incluir la configuración
require_once BASE_PATH . '/app/config.php';

// Verificar método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['mensaje'] = "Acceso no permitido";
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL);
    exit;
}

// Recibir y limpiar datos del formulario
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

// Validar campos obligatorios
if (empty($email) || empty($password)) {
    $_SESSION['mensaje'] = "Por favor, completa todos los campos";
    $_SESSION['icono'] = "warning";
    header('Location: ' . APP_URL);
    exit;
}

try {
    // Consulta preparada para buscar el usuario por email y estado activo
    $sql = "SELECT * FROM usuarios WHERE email = :email AND estado = '1' LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        // Inicio de sesión exitoso
        $_SESSION['mensaje'] = "Bienvenido al sistema";
        $_SESSION['icono'] = "success";
        $_SESSION['sesion_email'] = $usuario['email'];
        $_SESSION['sesion_rol'] = $usuario['rol_id'];
        $_SESSION['sesion_id_usuario'] = $usuario['id_usuario'];

        // Definir rutas por rol
        $rutasPorRol = [
            1 => APP_URL . '/admin/index.php',        // ADMINISTRADOR
            6 => APP_URL . '/docentes/index.php',     // DOCENTE
            7 => APP_URL . '/estudiantes/index.php',  // ESTUDIANTE
        ];

        // Verificar ruta por rol, si no existe, redirigir al inicio con mensaje de error
        if (isset($rutasPorRol[$usuario['rol_id']])) {
            header('Location: ' . $rutasPorRol[$usuario['rol_id']]);
            exit;
        } else {
            $_SESSION['mensaje'] = "No se ha definido una ruta para este rol";
            $_SESSION['icono'] = "error";
            header('Location: ' . APP_URL);
            exit;
        }
    } else {
        // Credenciales incorrectas
        $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL);
        exit;
    }
} catch (PDOException $e) {
    // Error de base de datos
    $_SESSION['mensaje'] = "Error del servidor: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL);
    exit;
}
