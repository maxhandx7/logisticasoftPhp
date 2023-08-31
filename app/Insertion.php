<?php

session_start();
require_once "Insertar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $NOMBRE = $_POST["username"];
    $PASSWORD = $_POST["password"];

    if ($NOMBRE == "" || $PASSWORD == "") {
        $_SESSION["error"] = 'Usuario o contraseña vacios';
        header("Location: ../public/index.php");
        exit;
    }

    $con = new Conexion();
    $Conexion = $con->Conn($NOMBRE, $PASSWORD);
}
