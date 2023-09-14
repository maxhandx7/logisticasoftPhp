<?php

session_start();
require_once "../Reubica.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id    = $_GET["id"];
    $show    = $_GET["show"];

    $_SESSION["id"] = $id;
    $datos = new datosInicio();
    $usuario = $datos->obtenerUsuario();
    $contrasena = $datos->obtenerPasswprd();

    $conexion = new Conexion($usuario, $contrasena);
    $con = $conexion->Conexion();
    $recurso  =
        'SELECT S.CONUMERO, S.WHSLOC, S.RECURSO, S.RECURSO_SEQ, S.LOTE, S.CLFCOD, S.SALDO, S.QTYRES, S.QTYDIS, S.QTYDIS, S.CLFCOD, R.DRECURSO' .
        ', S.WhsCod, S.CLIENTE, S.LOTE2, S.LOTE3, S.LOTE4, L.FECPRD, L.FECVEN, S.IDINSALDO, S.CONUMERO, R.UNDMED, R.UNDMEDC, R.UNDMEDFCT ' .
        'FROM INSALDO S ' .
        'LEFT OUTER JOIN RESMST R ON R.RECURSO = S.RECURSO ' .
        'LEFT OUTER JOIN INLOTES L ON L.RECURSO=S.RECURSO AND L.LOTE=S.LOTE ' .
        'WHERE IDINSALDO = :id';

    $stmt = $con->prepare($recurso);
    $stmt->bindValue(':id', $_SESSION["id"]);

    $stmt->execute();

    $result = array();

    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $fila;
    }
    $_SESSION["resultado"] = $result;
    if (isset($show) == 1) {
        header("Location: ../../resources/consultas/details.php");
    exit;
    }else {
        header("Location: ../../resources/reubicar/reubicar.php");
        exit; 
    }
    
} else {
    $id    = $_POST["id"];
    $barcode    = $_POST["barCode"];
    $QtyAmover  = $_POST["QtyAmover"];
    $clfcodto  = $_POST["clfcodto"];
    $whslocto  = $_POST["whslocto"];


    $consult = new Reubica();
    $consult->reubicar(
        $id,
        $barcode,
        $QtyAmover,
        $clfcodto,
        $whslocto
    );
}
