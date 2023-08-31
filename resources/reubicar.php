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
    <title>Bienvenido <?php echo  $_SESSION["user_name"]; ?></title>
</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <h3><?php echo  $_SESSION["user_email"]; ?></h3>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Reubicar</a></li>
                <li><a href="#">Configuración</a></li>
                <li><a href="../app/logout.php">Salir</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Hola <?php echo  $_SESSION["user_name"]; ?></h1>
            <p>¡Bienvenido a tu dashboard! Aquí puedes administrar tus datos y configuraciones.</p>
        </div>
    </div>

</body>

</html>