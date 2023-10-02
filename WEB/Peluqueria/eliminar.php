<?php 
	$db = new mysqli("localhost:3306", "root", "", "peluqueria");
	if ($db->connect_errno) {
		    echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		    exit;
		}
		$usuario = $_POST['usuario'];
		$correo = $_POST['correo'];
		$fecha = $_POST['fecha'];
	$stmt = $db->prepare("call QuitarCita(?, ?, ?, @salida)");
	$stmt->bind_param("sss", $usuario, $correo, $fecha);
	$stmt->execute();
	if ($stmt->affected_rows!=1) {
		echo "<script>alert('Error: usuario, correo y/o fecha incorrectos!!');</script>";
		exit();
	}else{
		header("Location: home.php");
		exit;
	}
 ?>