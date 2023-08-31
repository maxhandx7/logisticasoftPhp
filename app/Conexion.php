<?php

class Conexion
{
	private	$host;
	private	$database;
	private	$username;
	private	$password;

	public function __construct()
	{
		$this->host = "192.168.1.115";
		$this->database = "C:\\SERVINET-XE11\\SERVINETDB-2023-V3.FDB";
	}

	public function Conn($NOMBRE, $PASSWORD)
	{
		try {
			$this->username = $NOMBRE;
			$this->password = $PASSWORD;
			$dsn = "firebird:dbname=$this->host:$this->database;charset=UTF8";
			$pdo = new PDO($dsn, $this->username, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($pdo) {
				$_SESSION["user_name"] = $NOMBRE;
				$_SESSION["user_email"] = $PASSWORD;
				header("Location: ../resources/welcome.php");
				exit;
			} 
		} catch (PDOException $e) {
			$_SESSION["error"] = 'Credenciales incorrectas. Inténtalo de nuevo.';
				header("Location: ../public/index.php");
				exit;/* 
			return 'Acceso denegado: ' . $e->getMessage(); */
		}
	}

	/* public function Login()
	{

		try {
			$Conexion = $this->Conn();

			$query = "SELECT * FROM  USRMST WHERE USUARIO = :nombre AND PASSW = :password";
			$stmt = $Conexion->prepare($query);
			$stmt->bindValue(':nombre', $NOMBRE);
			$stmt->bindValue(':password', $PASSWORD);

			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);



			if ($row) {
				$_SESSION["user_name"] = $row["NOMBRE"];
				$_SESSION["user_email"] = $row["EMAIL"];
				header("Location: ../resources/welcome.php");
				exit;
			} else {
				$_SESSION["error"] = 'Credenciales incorrectas. Inténtalo de nuevo.';
				header("Location: ../public/index.php");
				exit;
			}
		} catch (PDOException $e) {
			echo "Error al ejecutar la consulta: " . $e->getMessage();
		}
	} */
}
