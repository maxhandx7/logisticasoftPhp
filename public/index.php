<?php include("../app/Conexion.php");
session_start();
if (isset($_SESSION["user_name"])) {
    header("Location: ../resources/welcome.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="lol.png" type="image/x-icon">
</head>

<body>
    <div class="login-container">
        <div class="image-container">
            <img src="../public/logo.png" alt="Imagen de fondo">
        </div>
        <br>
        <form action="../app/Controlador/login.php" method="post">
            <label for="username">Nombre de usuario</label>
            <input type="text" id="username" name="username" placeholder="Ingrese su nombre" value="SYSDBA" required><br>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" value="masterkey" required><br>

            <input type="submit" value="Iniciar sesión">
            <?php 
            if (isset($_SESSION["error"])) {
                echo "<p style='color:red;'>".$_SESSION["error"]."</p>";
                $_SESSION["error"] = "";
                exit;
            }
            ?>
        </form>
    </div>
</body>

</html>