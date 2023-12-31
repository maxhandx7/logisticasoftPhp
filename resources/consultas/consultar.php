<?php
session_start();

if (!isset($_SESSION["user_name"])) {
    header("Location: ../../public/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/style_home.css">
    <link rel="shortcut icon" href="../../public/lol.png" type="image/x-icon">
    <title>Bienvenido <?php echo  $_SESSION["user_name"]; ?></title>
</head>


<body>
    <?php include('../layouts/main.php'); ?>
    <div class="containerConf">
        <h1>Consultas</h1>
        <form action="../../app/Controlador/consulta.php" method="post">
            <label for="clb">Ordenado Por:</label>
            <select name="tipo" id="tipo">
                <option value="recurso">Recurso</option>
                <option value="codebar">Codigo de Barras</option>
                <option value="locacion" selected>Localización</option> Whsloc
            </select>

            <label for="whscode">WhsCod:</label>
            <input type="text" id="whscode" name="whscode" value="ZFP" min="1" required>

            <label for="filtro">Filtro:</label>
            <input type="text" id="filtro" value="001.001.01.1" name="filtro">

            <button type="submit">Consultar</button>
            <a href="../welcome.php">Salir</a>
        </form>
        <?php
        if (isset($_SESSION["error"]) != null) {
            echo "<p style='color:red;'>" . $_SESSION["error"] . "</p>";
            $_SESSION["error"] = "";
            exit;
        } 
        if (isset($_SESSION["success"]) != null) {
            echo "<p style='color:green;'>" . $_SESSION["success"] . "</p>";
            $_SESSION["success"] = "";
            exit;
        }
        ?>
    </div>
</body>

</html>