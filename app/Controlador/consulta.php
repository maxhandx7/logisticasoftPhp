<?php

session_start();
require_once "../Consultas.php";
$consult = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipo    = $_POST["tipo"];
    $whscod  = $_POST["whscode"];
    $filtro  = $_POST["filtro"];

    if ($whscod == "" || $filtro == "") {
        $_SESSION["error"] = 'El "filtro" o el "whscod" no pueden estar vacios';
        header("Location: ../../resources/consultas/consultar.php");
        exit;
    }
    $consult = new Consultas($tipo, $whscod, $filtro);
    $consult->consultas();
} 
