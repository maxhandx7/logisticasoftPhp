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
    <?php include('layouts/main.php'); ?>
    <div class="containerConf">
        <h1>Configuración</h1>
        <form action="WELCOME.PHP" method="post">
            <label for="clb">Cia:</label>     
            <input type="number" id="clb" name="clb" value="1" placeholder="Codigo de Compania" required>

            <label for="Whscode">WhsCod:</label>
            <input type="text" id="whscode" name="whscode" value="ZFP" min="1" placeholder="Bodega" required>

            <label for="montacarga">Montacarga:</label>
            <input type="text" id="montacarga" value="MONTA-01" placeholder="Codigo de Montacarga" name="montacarga">

            <label for="cliente">Cliente:</label>
            <input type="text" id="cliente" value="INTERLLANTAS"  placeholder="Codigo de Cliente"  name="cliente">
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>

</html>