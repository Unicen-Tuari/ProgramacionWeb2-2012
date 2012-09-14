<?php
	include('manager.inc.php');
	
	$server = 'localhost';
	$username = 'tp';
	$pass = '123456';
	$database = 'tp';
	
	$conexion = new conexion();
	$conexion->conectar($server, $username, $pass, $database);
	
	$usuario = new usuario();
	$usuario->setUsu($_REQUEST['newUser']);
	$usuario->setPassword($_REQUEST['newPass']);
	
	$manager = new manager();
	$manager->addUser($conexion, $usuario);

	header('Location: index.php');
?>