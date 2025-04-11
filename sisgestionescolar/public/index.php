<?php
include(__DIR__ . '/../app/config.php');

// Iniciar la sesión si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <center>
        <br>
        <img src="<?= APP_URL; ?>/public/img/login.png" width="150px" alt="Imagen de acceso">
        <br><br>
    </center>
    <div class="login-logo">
        <h3><b><?= APP_NAME; ?></b></h3>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicio de sesión</p>
            <hr>

            <!-- Ruta corregida a absoluta -->
            <form action="<?= APP_URL; ?>/controller_login.php" method="POST">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="input-group mb-3">
                    <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
                </div>
            </form>

            <?php if (isset($_SESSION['mensaje'])): ?>
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "<?= $_SESSION['icono'] ?? 'info'; ?>",
                        title: "<?= $_SESSION['mensaje']; ?>",
                        showConfirmButton: false,
                        timer: 4000
                    });
                </script>
                <?php
                // Limpiar sesión para que no se repita el mensaje
                unset($_SESSION['mensaje']);
                unset($_SESSION['icono']);
                ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= APP_URL; ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= APP_URL; ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= APP_URL; ?>/public/dist/js/adminlte.min.js"></script>

</body>
</html>
