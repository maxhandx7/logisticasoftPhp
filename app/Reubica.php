<?php
require_once "datosInicio.php";
class Reubica
{



    public function reubicar(
        $barcode,
        $QtyAmover,
        $clfcodto,
        $whslocto)
    {
        try {
            $datos = new datosInicio();
            $usuario = $datos->obtenerUsuario();
            $contrasena = $datos->obtenerPasswprd();

            $conexion = new Conexion($usuario, $contrasena);
            $con = $conexion->Conexion();
            try {
                $con->beginTransaction();

                $stmt = $con->prepare("EXECUTE PROCEDURE INWHSREUBICA2_20230906('TR-20230906', NULL, 3231464, 'REUBICA', 1, 'SUPERVISOR-1', 'REUBICAPRUEBA')");
                $stmt->bindValue(':barcode', $barcode);
                $stmt->bindValue(':QtyAmover', $QtyAmover);
                $stmt->bindValue(':clfcodto', $clfcodto);
                $stmt->bindValue(':whslocto', $whslocto);
                $stmt->execute();

                $con->commit();

                echo "Transacción completada con éxito.";
            } catch (PDOException $e) {
                $con->rollBack();
                echo "Error en la transacción: " . $e->getMessage();
            }
        } catch (\Throwable $th) {
        }
    }
}
