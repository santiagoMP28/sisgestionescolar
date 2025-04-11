<?php
session_start();

// Definir base path para rutas absolutas
define('BASE_PATH', dirname(__DIR__));

// Definir URL base dinámica para que siempre funcione
$host = $_SERVER['HTTP_HOST'];
$publicPath = '/public'; // <- si lo movés, cambiás solo acá
define('APP_URL', 'https://' . $host . $publicPath);

// Incluir la configuración
require_once BASE_PATH . '/app/config.php';

// Función reutilizable para redireccionar y salir
function exitRedirect($mensaje, $icono, $url = APP_URL) {
    $_SESSION['mensaje'] = $mensaje;
    $_SESSION['icono'] = $icono;
    header('Location: ' . $url);
    exit;
}

// Verificar método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exitRedirect("Acceso no permitido", "error");
}

// Recibir y limpiar datos del formulario
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

// Validar campos obligatorios
if (empty($email) || empty($password)) {
    exitRedirect("Por favor, completa todos los campos", "warning");
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
            exitRedirect("No se ha definido una ruta para este rol", "error");
        }
    } else {
        // Credenciales incorrectas
        exitRedirect("Los datos introducidos son incorrectos, vuelva a intentarlo", "error");
    }
} catch (PDOException $e) {
    // Error de base de datos
    // Opcional: Para producción, mejor no exponer detalles de error.
    exitRedirect("Error del servidor. Inténtalo más tarde.", "error");
}
