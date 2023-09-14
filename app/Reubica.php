<?php
require_once "datosInicio.php";
class Reubica
{
    public function reubicar(
        $id,
        $barcode,
        $QtyAmover,
        $clfcodto,
        $whslocto
    ) {
        $fecha = date("Ymd");
        $fecha1 = date("Y-m-d");

        $datos = new datosInicio();
        $usuario = $datos->obtenerUsuario();
        $contrasena = $datos->obtenerPasswprd();
        $conexion = new Conexion($usuario, $contrasena);
        $con = $conexion->Conexion();
        try {
            $con->beginTransaction();

            $stmt = $con->prepare("EXECUTE PROCEDURE INWHSREUBICA2_20230906(:DOC1, :fecha, :id, 'REUBICA', :QtyAmover, :whslocto, 'REUBICAPRUEBA')");
            $stmt->bindValue(':DOC1', 'TR-' . $fecha);
            $stmt->bindValue(':fecha', $fecha1);
            $stmt->bindValue(':QtyAmover', $QtyAmover);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':whslocto', $whslocto);

            $stmt->execute();


            $con->commit();
            $_SESSION["success"] = "Transacción completada con éxito.";
            header("Location: ../../resources/reubicar/consulta.php");
            exit;
        } catch (PDOException $e) {
            $con->rollBack();
            $_SESSION["error"] = "Error en la transacción: " . $e->getMessage();
            header("Location: ../../resources/reubicar/consulta.php");
            exit;
        }
    }
}
