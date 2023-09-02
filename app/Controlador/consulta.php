<?php

session_start();
require_once "../Consultas.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipo = $_POST["tipo"];
    $whscode = $_POST["whscode"];
    $filtro = $_POST["filtro"];

    if ($whscode == "" || $filtro == "") {
        $_SESSION["error"] = 'El "filtro" o el "whscode" no pueden estar vacios';
        header("Location: ../../resources/consultas/consultar.php");
        exit;
    }

    $consult = new Consultas($tipo, $whscode, $filtro);
    $consult->consultas();
}
