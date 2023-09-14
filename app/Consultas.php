<?php
require_once "datosInicio.php";
class Consultas
{
    private $tipo;
    private $WhsCod;
    private $filtro;

    public function __construct($tipo, $WhsCod, $filtro)
    {
        $this->tipo    = $tipo;
        $this->WhsCod  = $WhsCod;
        $this->filtro  = $filtro;
    }



    public function consultas()
    {
        try {
            $datos = new datosInicio();
            $usuario = $datos->obtenerUsuario();
            $contrasena = $datos->obtenerPasswprd();

            $conexion = new Conexion($usuario, $contrasena);
            $con = $conexion->Conexion();
            $link = $this->urlReferencia();
            if ($this->tipo == "recurso") {
                $SQL_GET_ALL_INSALDO_RECURSO  =
                    'SELECT S.CONUMERO, S.WHSLOC, S.RECURSO, S.RECURSO_SEQ, S.LOTE, S.CLFCOD, S.SALDO, S.QTYRES, S.QTYDIS, S.QTYDIS, S.CLFCOD, R.DRECURSO' .
                    ', S.WhsCod, S.CLIENTE, S.LOTE2, S.LOTE3, S.LOTE4, L.FECPRD, L.FECVEN, S.IDINSALDO, S.CONUMERO, R.UNDMED, R.UNDMEDC, R.UNDMEDFCT ' .
                    'FROM INSALDO S ' .
                    'LEFT OUTER JOIN RESMST R ON R.RECURSO = S.RECURSO ' .
                    'LEFT OUTER JOIN INLOTES L ON L.RECURSO=S.RECURSO AND L.LOTE=S.LOTE ' .
                    'WHERE S.RECURSO = :filtro AND S.CONO = 1 AND S.WhsCod = :WhsCod ' .
                    'ORDER BY CLIENTE, WhsCod, WHSLOC ';

                $stmt = $con->prepare($SQL_GET_ALL_INSALDO_RECURSO);
                $stmt->bindValue(':filtro', $this->filtro);
                $stmt->bindValue(':WhsCod', $this->WhsCod);

                $stmt->execute();

                $result = array();

                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $fila;
                }
                $_SESSION["resultados"] = $result;
                if ($link == "http://192.168.101.27/logisticasoft/resources/consultas/consultar.php") {
                    header("Location: ../../resources/consultas/show.php");
                    exit;
                }
                header("Location: ../../resources/reubicar/show.php");
                exit;
            }
            if ($this->tipo == "codebar") {

                $SQL_GET_ALL_INSALDO_CODEBAR  = 'SELECT S.CONUMERO, S.WHSLOC, S.RECURSO, S.RECURSO_SEQ, S.LOTE, S.CLFCOD, S.SALDO, S.QTYRES, S.QTYDIS, S.QTYDIS, S.CLFCOD, R.DRECURSO' .
                    ', S.WhsCod, S.CLIENTE, S.LOTE2, S.LOTE3, S.LOTE4, L.FECPRD, L.FECVEN, S.IDINSALDO, S.CONUMERO, R.UNDMED, R.UNDMEDC, R.UNDMEDFCT, E.CODEBAR ' .
                    ' FROM INSALDO S ' .
                    'INNER JOIN RESMST R ON R.RECURSO = S.RECURSO ' .
                    'LEFT OUTER JOIN RESMSTEAN E ON E.RECURSO = S.RECURSO AND E.CLIENTE = S.CLIENTE ' .
                    'LEFT OUTER JOIN INLOTES L ON L.RECURSO=S.RECURSO AND L.LOTE=S.LOTE ' .
                    'WHERE 
                E.CODEBAR = :filtro AND 
                S.CONO = 1 AND 
                S.WhsCod = :WhsCod';
                $stmt = $con->prepare($SQL_GET_ALL_INSALDO_CODEBAR);

                $stmt->bindValue(':filtro', $this->filtro);
                $stmt->bindValue(':WhsCod', $this->WhsCod);

                $stmt->execute();

                $result = array();

                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $fila;
                }
                $_SESSION["resultados"] = $result;
                if ($link == "http://192.168.101.27/logisticasoft/resources/consultas/consultar.php") {
                    header("Location: ../../resources/consultas/show.php");
                    exit;
                }
                header("Location: ../../resources/reubicar/show.php");
                exit;
            }

            if ($this->tipo == "locacion") {
                $SQL_GET_ALL_INSALDO_WHSLOC  = 'SELECT S.CONUMERO, S.WHSLOC, S.RECURSO, S.RECURSO_SEQ, S.LOTE, S.CLFCOD, S.SALDO, S.QTYRES, S.QTYDIS, S.QTYDIS, S.CLFCOD, R.DRECURSO' .
                    ', S.WhsCod, S.CLIENTE, S.LOTE2, S.LOTE3, S.LOTE4, L.FECPRD, L.FECVEN, S.IDINSALDO, S.CONUMERO, R.UNDMED, R.UNDMEDC, R.UNDMEDFCT, ' .
                    '(SELECT FIRST 1 CODEBAR FROM RESMSTEAN WHERE RECURSO = S.RECURSO AND CLIENTE = S.CLIENTE) AS CODEBAR ' .
                    ' FROM INSALDO S ' .
                    'LEFT OUTER JOIN RESMST R ON R.RECURSO = S.RECURSO ' .
                    'LEFT OUTER JOIN INLOTES L ON L.RECURSO=S.RECURSO AND L.LOTE=S.LOTE ' .
                    'WHERE 
                    S.WHSLOC = :filtro AND 
                    S.CONO = 1 AND 
                    S.WhsCod = :WhsCod  ' .
                    'ORDER BY CLIENTE, RECURSO, LOTE ';

                $stmt = $con->prepare($SQL_GET_ALL_INSALDO_WHSLOC);
                $stmt->bindValue(':filtro', $this->filtro);
                $stmt->bindValue(':WhsCod', $this->WhsCod);

                $stmt->execute();

                $result = array();

                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $fila;
                }
                $_SESSION["resultados"] = $result;
                if ($link == "http://192.168.101.27/logisticasoft/resources/consultas/consultar.php") {
                    header("Location: ../../resources/consultas/show.php");
                    exit;
                }
                header("Location: ../../resources/reubicar/show.php");
                exit;
            }
        } catch (PDOException $e) {

            $_SESSION["error"] = 'Error de conexion. ' . $e->getMessage();
            header("Location: ../../resources/consultas/consultar.php");
            exit;
        }
    }

    public function urlReferencia()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $paginaAnterior = $_SERVER['HTTP_REFERER'];
            return $paginaAnterior;
        }
    }
}
