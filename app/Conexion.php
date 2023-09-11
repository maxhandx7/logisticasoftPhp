<?php
require_once "datosInicio.php";
class Conexion
{
	private	$host;
	private	$database;
	private	$username;
	private	$password;
	private	$opciones;

	public function __construct($NOMBRE, $PASSWORD)
	{	//cambiar esto por un archivo de configuracion
		$this->host = "192.168.1.27";
		$this->database = "C:\\xampp\\htdocs\\logisticasoft\\db\\SERVINETDB-2023-V3.FDB";
		//$this->database = "C:\\SERVINET-XE11\\SERVINETDB-2023-V3.FDB";
		$this->username = $NOMBRE;
		$this->password = $PASSWORD;
		$this->opciones = [
			PDO::ATTR_PERSISTENT => true, // Habilita la conexión persistente
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Habilita el manejo de excepciones
		];
	}

	public function Conn()
	{
		try {
			$dsn = "firebird:dbname=$this->host:$this->database;charset=NONE";
			$pdo = new PDO($dsn, $this->username, $this->password, $this->opciones);
			if ($pdo) {
				$_SESSION["user_name"] = $this->username;
				header("Location: ../../resources/conf.php");
				exit;
			}
		} catch (PDOException $e) {

			$_SESSION["error"] = 'Credenciales incorrectas. Inténtalo de nuevo. ';
			header("Location: ../../public/index.php");
			exit;
		}
	}

	public function Conexion()
	{
		try {
			$dsn = "firebird:dbname=$this->host:$this->database;charset=UTF8";
			$pdo = new PDO($dsn, $this->username, $this->password, $this->opciones);
			return $pdo;
		} catch (PDOException $e) {
			$_SESSION["error"] = $e;
			header("Location: ../public/index.php");
			exit;
		}
	}
}
