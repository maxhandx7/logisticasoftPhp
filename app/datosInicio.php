<?php
require_once "Conexion.php";

class datosInicio
{
    private $username;
    private $password;

    public function __construct()
    {
        $this->username = "SYSDBA";
        $this->password = "masterkey";
    }


    public function obtenerUsuario()
    {
        return $this->username;
    }

    public function obtenerPasswprd()
    {
        return $this->password;
    }
}
