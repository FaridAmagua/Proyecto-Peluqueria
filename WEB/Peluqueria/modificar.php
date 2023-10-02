<?php 
	
	$db = new mysqli("localhost:3306", "root", "", "peluqueria");
	if ($db->connect_errno) {
		    echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		    exit;
		}

		$usuario = $_POST['usuario'];
		$fechaantigua = $_POST['fechaantigua'];
		$fechanueva = $_POST['fechanueva'];

	$stmt = $db->prepare("call ModificarCita(?, ?, ?, @salida)");

	

	$stmt->bind_param("sss", $usuario, $fechaantigua, $fechanueva);

	$stmt->execute();
	if ($stmt->affected_rows!=1) {
		echo "<script>alert('Error: usuario y/o fecha inválidos!!');</script>";
		exit();
	}else{
		header("Location: home.php");
		exit;
	}

	

 ?>