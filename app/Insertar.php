<?php

require_once "Conexion.php";

class Insertar {

    public function insertar(){
        try {
            $conexion = new Conexion();

            $con = $conexion->Conn();
            // Iniciar una transacción
            $con->beginTransaction();
        
            // Realizar operaciones dentro de la transacción
            $sql1 = "UPDATE tabla SET columna = valor WHERE condicion";
            $con->exec($sql1);
        
            $sql2 = "INSERT INTO otra_tabla (columna1, columna2) VALUES (valor1, valor2)";
            $con->exec($sql2);
        
            // Confirmar la transacción si todas las operaciones se completaron correctamente
            $con->commit();
        
        } catch (PDOException $e) {
            // Si ocurre algún error, deshacer la transacción
            $con->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

}


