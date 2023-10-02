<?php 
	
	$db = new mysqli("localhost:3306", "root", "", "peluqueria");
	if ($db->connect_errno) {
		    echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		    exit;
		}

		$correo = $_POST['correo'];
		$contrasena2 = $_POST['cambiar-contrasena'];

		$newcontrasena = md5($contrasena2);

	$stmt = $db->prepare("call CambiarContrasena(?, ?, @salida)");

	

	$stmt->bind_param("ss", $correo, $newcontrasena);

	$stmt->execute();
	if ($stmt->affected_rows!=1) {
		echo "Error al insertar";
		exit();
	}else{
		header("Location: home.php");
		exit;
	}

	

 ?>