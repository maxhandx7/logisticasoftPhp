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
    <title>Bienvenido <?php echo  $_SESSION["user_name"]; ?></title>
</head>
<style>
    body.scroll-down .boton-flotante {
        opacity: 1;
    }

    .opcion {
        display: flex;
        justify-content: space-between;
        text-align: justify;
        align-items: center;
    }

    h1 {
        margin: 10px;
    }

    a {

        padding: 2%;
        border: 1px solid #007bff;
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

    .boton-flotante {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        z-index: 1000;
    }
</style>

<body>
    <?php include('../layouts/main.php'); ?>
    <a href="#" class="boton-flotante">Arriba</a>
    <div class="containerConf">
        <div class="opcion">
            <h1>Consultas</h1>
            <a href="consultar.php">Salir</a>
        </div>
        <ul class="android-list">
            <?php
            if ($_SESSION["resultado"] == null) {
                echo "";
                echo "<p style='color:red;'>" . 'No hay datos, intente de nuevo' . "</p>";
            }
            foreach ($_SESSION["resultado"] as $result) {
            ?>
                <li class="list-item">
                    <div class="list-item-content"><?php echo $result['DRECURSO'] ?></div>
                    <div class="list-item-details">Unidad de Medida: <?php echo $result['UNDMED'] ?></div>
                    <div class="list-item-details">Saldo: <strong><?php echo $result['SALDO'] ?></strong> Cant Reservada: <strong><?php echo $result['QTYRES'] ?></strong></div>
                    <div class="list-item-details">Cant Disponible: <strong><?php echo $result['QTYDIS'] ?></strong></div>
                    <div class="list-item-details">Fecha Vencimiento:<?php echo $result['FECVEN'] ?></div>
                    <div class="list-item-details">Cliente: <?php echo $result['CLIENTE'] ?></div>
                    <div class="list-item-details">Lote: <?php echo $result['LOTE'] ?> Lote 4: <?php echo $result['LOTE4'] ?></div>
                    <div class="list-item-details">ID: <?php echo $result['IDINSALDO'] ?></div>
                </li>
            <?php }
            ?>
        </ul>
    </div>
</body>
<script>
    window.addEventListener("scroll", function() {
        if (window.scrollY > 100) {
            document.body.classList.add("scroll-down");
        } else {
            document.body.classList.remove("scroll-down");
        }
    });
</script>

</html>