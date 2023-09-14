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
        margin-top: 10%;
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

    form {
        text-align: left;
    }


    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .formControl {
        width: 90% !important;
    }
</style>

<body>
    <div class="opcion">
        <h1>Reubicar</h1>
        <a href="show.php" id="salir">Salir</a>
    </div>
    <div class="containerConf">

        <ul class="android-list">
            <li class="list-item">
                <form action="../../app/Controlador/reubicar.php" method="post">
                    <div class="list-item-content">
                        <input type="hidden" name="id" value="<?php echo $_SESSION["id"] ?>">
                    </div>

                    <div class="list-item-content">
                        <label for="barcode">Codigo de barras</label>
                        <input type="text" class="formControl" name="barCode">
                    </div>

                    <div class="list-item-content">
                        <label for="QtyAmover">Cantidad a mover</label>
                        <input type="number" class="formControl" value="<?php echo $_SESSION["resultado"][0]['QTYDIS'] ?>" name="QtyAmover">
                    </div>

                    <div class="list-item-content">
                        <label for="clfcodto">clfcodto</label>
                        <input type="text" class="formControl" value="<?php echo $_SESSION["resultado"][0]['CLFCOD'] ?>" name="clfcodto">
                    </div>

                    <div class="list-item-content">
                        <label for="Lote">Lote</label>
                        <input type="text" class="formControl" value="<?php echo $_SESSION["resultado"][0]['LOTE'] ?>" name="Lote">
                    </div>

                    <div class="list-item-content">
                        <label for="whslocto">whsLocTo</label>
                        <input type="text" class="formControl" name="whslocto">
                    </div>

                    <div class="list-item-content">
                        <button type="submit">reubicar</button>
                    </div>
                </form>
            </li>
            <?php ?>
        </ul>
        <ul class="android-list">
            <?php
            if ($_SESSION["resultado"] == null) {
                echo "";
                echo "<p style='color:red;'>" . 'No hay datos, intente de nuevo' . "</p>";
            }

            foreach ($_SESSION["resultado"] as $result) {
            ?>
                <li>
                    <div class="list-item-details">
                    <div class="list-item-details">CONUMERO: <strong><?php echo $result['CONUMERO'] ?></strong></div>
                    <div class="list-item-details">WHSLOC: <strong><?php echo $result['WHSLOC'] ?></strong></div>
                    <div class="list-item-details">RECURSO: <strong><?php echo $result['RECURSO'] ?></strong></div>
                    <div class="list-item-details">RECURSO_SEQ: <strong><?php echo $result['RECURSO_SEQ'] ?></strong></div>
                    <div class="list-item-details">LOTE: <strong><?php echo $result['LOTE'] ?></strong></div>
                    <div class="list-item-details">CLFCOD: <strong><?php echo $result['CLFCOD'] ?></strong></div>
                    <div class="list-item-details">SALDO: <strong><?php echo $result['SALDO'] ?></strong></div>
                    <div class="list-item-details">QTYRES: <strong><?php echo $result['QTYRES'] ?></strong></div>
                    <div class="list-item-details">QTYDIS: <strong><?php echo $result['QTYDIS'] ?></strong></div>
                    <div class="list-item-details">CLFCOD: <strong><?php echo $result['CLFCOD'] ?></strong></div>
                    <div class="list-item-details">DRECURSO: <strong><?php echo $result['DRECURSO'] ?></strong></div>
                    <div class="list-item-details">WhsCod: <strong><?php echo $result['WHSCOD'] ?></strong></div>
                    <div class="list-item-details">CLIENTE: <strong><?php echo $result['CLIENTE'] ?></strong></div>
                    <div class="list-item-details">LOTE2: <strong><?php echo $result['LOTE2'] ?></strong></div>
                    <div class="list-item-details">LOTE3: <strong><?php echo $result['LOTE3'] ?></strong></div>
                    <div class="list-item-details">LOTE4: <strong><?php echo $result['LOTE4'] ?></strong></div>
                    <div class="list-item-details">FECPRD: <strong><?php echo $result['FECPRD'] ?></strong></div>
                    <div class="list-item-details">FECVEN: <strong><?php echo $result['FECVEN'] ?></strong></div>
                    <div class="list-item-details">IDINSALDO: <strong><?php echo $result['IDINSALDO'] ?></strong></div>
                    <div class="list-item-details">CONUMERO: <strong><?php echo $result['CONUMERO'] ?></strong></div>
                    <div class="list-item-details">UNDMED: <strong><?php echo $result['UNDMED'] ?></strong></div>
                    <div class="list-item-details">UNDMEDC: <strong><?php echo $result['UNDMEDC'] ?></strong></div>
                    <div class="list-item-details">UNDMEDFCT: <strong><?php echo $result['UNDMEDFCT'] ?></strong></div>

                    </div>
                </li>
            <?php }
            ?>
        </ul>
    </div>
</body>


</html>