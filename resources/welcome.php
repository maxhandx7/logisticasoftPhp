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
    <meta name="viewport" content="width=device-width, initial-scale=10.0">
    <link rel="stylesheet" type="text/css" href="../public/style_home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Bienvenido <?php echo  $_SESSION["user_name"]; ?></title>
</head>

<body>
    <div class="header">
        <h1><?php echo  $_SESSION["user_name"]; ?></h1>
        <p><?php echo  $_SESSION["user_email"]; ?></p>
    </div>
    <div class="container">
        <div class="widget">
            <a href="inventario.php">
                <i class="fas fa-box"></i>
                <h2>Inventario</h2>
                <p>Gestionar inventario</p>
            </a>
        </div>
        <div class="widget">
            <a href="reubicar.php">
                <i class="fas fa-shopping-cart"></i>
                <h2>Reubicar</h2>
                <p>Reubicar producto</p>
            </a>
        </div>
        <div class="widget">
            <a href="../app/logout.php">
                <i class="fas fa-times"></i>
                <h2>Salir</h2>
            </a>
        </div>
    </div>
</body>

</html>