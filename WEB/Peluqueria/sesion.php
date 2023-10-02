<?php
session_start();
$db = new mysqli('localhost:3306', 'root', '', 'peluqueria');
if ($db->connect_errno) {
    echo "ERROR al conectar con la DB.";
    exit;
}
if(!isset($_SESSION['usuario'])){
    if (!isset($_POST['usuario']) || !isset($_POST['clave'])) {
        header("Location: login.php");
        exit;
    }
    $usuario = $_POST['usuario'];
    $contrasena = md5($_POST['clave']);
    if ($db->connect_errno) {
        echo "Falló la conexión con MySQL";
        exit;
    }
    $stmt = $db->prepare("SELECT id_cliente FROM cliente WHERE usuario LIKE ? AND contrasena LIKE ?");
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows != 1) {
        echo "<script>alert('Error: usuario y/o contraseña inválidos!!');</script>";
        exit();
    }else{
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id'] = $result->fetch_assoc()['id_cliente'];
        header("Location: home.php");
        exit;
    }
}else{
    $_SESSION['id_cliente'] = $usuario;
    header("Location: home.php");
    exit;
}
?>