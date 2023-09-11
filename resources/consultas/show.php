<?php
session_start();

if (!isset($_SESSION["resultado"])) {
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
<style>
    .opcion {
        display: flex;
        background-color: #333;
        color: #fff;
        position: fixed;
        justify-content: space-between;
        align-items: center;
        top: 0;
        width: 100%;
    }

    .containerConf {
        margin-top: 15%;
    }

    h1 {
        margin: 10px;
    }

    a {
        padding: 2%;
        color: white;
        background-color: red;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    a:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .android-list {
        list-style: none;
        padding: 0;
    }

    .list-item {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #fff;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .list-item-content {
        font-weight: bold;
    }

    .list-item-details {
        color: #666;
    }
</style>

<body>
    <div class="opcion">
        <h1>Consultas</h1>
        <a href="#" class="boton-flotante">Arriba</a>
        <a href="consultar.php" id="salir">Salir</a>
    </div>
    <div class="containerConf">

        <ul class="android-list">
            <?php
            if ($_SESSION["resultado"] == null) {
                echo "";
                echo "<p style='color:red;'>" . 'No hay datos, intente de nuevo' . "</p>";
            }
            foreach ($_SESSION["resultado"] as $result) {
            ?>
                <li class="list-item">
                    <form action="../../app/Controlador/consulta.php" method="get">
                    <div class="list-item-content"><?php echo $result['DRECURSO'] ?></div>
                    <div class="list-item-details">Unidad de Medida: <?php echo $result['UNDMED'] ?></div>
                    <div class="list-item-details">Saldo: <strong><?php echo $result['SALDO'] ?></strong> Cant Reservada: <strong><?php echo $result['QTYRES'] ?></strong></div>
                    <div class="list-item-details">Cant Disponible: <strong><?php echo $result['QTYDIS'] ?></strong></div>
                    <div class="list-item-details">Fecha Vencimiento:<?php echo $result['FECVEN'] ?></div>
                    <div class="list-item-details">Cliente: <?php echo $result['CLIENTE'] ?></div>
                    <div class="list-item-details">Lote: <?php echo $result['LOTE'] ?> Lote 4: <?php echo $result['LOTE4'] ?></div>
                    <div class="list-item-details">ID: <?php echo $result['IDINSALDO'] ?></div>
                    <input type="hidden" value="<?php echo $result['IDINSALDO'] ?>" name="id">
                    <button type="submit">ver</button>
                    </form>
                </li>
            <?php }
            ?>
        </ul>
    </div>
</body>


</html>