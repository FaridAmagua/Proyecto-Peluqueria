<?php 
	
	$db = new mysqli("localhost:3306", "root", "", "peluqueria");
	if ($db->connect_errno) {
		    echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		    exit;
		}

		$usuario = $_POST['usuario'];
		$nombre = $_POST['nombre'];
		$pass = $_POST['contrasena'];
		$apellido_1 = $_POST['apellido_1'];
		$apellido_2 = $_POST['apellido_2'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$correo = $_POST['email'];
		$sexo = $_POST['optradio'];

		$contrasena = md5($pass);

	$stmt = $db->prepare("call AltaUsuario(?,?,?, ?, ?, ?, ?, ?, ?, @salida);");

	$stmt->bind_param("sssssssss", $usuario, $nombre, $contrasena, $apellido_1, $apellido_2, $telefono, $direccion, $correo, $sexo);

	$stmt->execute();
	if ($stmt->affected_rows!=1) {
		echo "<script>alert('Error: usuario y/o correo existentes!!');</script>";
		exit();
	}else{
		header("Location: home.php");
		exit;
	}

	

 ?>