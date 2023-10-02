<?php
	session_start();
	if(isset($_SESSION['id'])){
		$session = true;
		$user_id = $_SESSION['id'];
		$username = $_SESSION['usuario'];
	}
	else{
		$session = false;
	}
?>