<?php
session_start();

if (!isset($_SESSION["user_name"])) {
    header("Location: ../public/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/style_home.css">
    <link rel="shortcut icon" href="../public/lol.png" type="image/x-icon">
    <title>Bienvenido <?php echo  $_SESSION["user_name"]; ?></title>
</head>

<body>
    <?php  include('layouts/main.php'); ?>
    <div class="container">
        <div class="widget">
            <a href="consultas/consultar.php">
                <h2>Consultar</h2>
                <p>Consultar inventario</p>
            </a>
        </div>
        <div class="widget">
            <a href="reubicar.php">
                <h2>Reubicar</h2>
                <p>Reubicar producto</p>
            </a>
        </div>
        <div class="widget">
            <a href="../app/logout.php">
                <i class="fas fa-times"></i>
                <h2>Cerrar sesión</h2>
            </a>
        </div>
    </div>
</body>

</html>