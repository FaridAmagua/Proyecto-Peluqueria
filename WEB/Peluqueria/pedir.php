<?php 
	$db = new mysqli("localhost:3306", "root", "", "peluqueria");
	$db->set_charset('utf8');
	if ($db->connect_errno) {
		    echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		    exit;
		}
		$usuario = $_POST['usuario'];
		$tratamiento = $_POST['tratamiento'];
		$fecha = $_POST['fecha'];
	$stmt = $db->prepare("call ReservarCita(?, ?, ?, @salida)");
	$stmt->bind_param("sss", $usuario, $tratamiento, $fecha);
	$stmt->execute();
	if ($stmt->affected_rows!=1) {
		echo "<script>alert('Error: usuario, tratamiento y/o fecha inválidos!!');</script>";
		exit();
	}else{
		header("Location: home.php");
		exit;
	}
 ?>