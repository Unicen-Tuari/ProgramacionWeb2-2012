<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('config.php');
	require_once('DataObjects/Usuario.php');
	$usuario = new DO_Usuario;
	$usuario->find();
	$agregar = true;
	while ($usuario->fetch()) {
		if ($usuario->usu == $_REQUEST['usu']) {
			$agregar = false;
			echo 'El usuario ' . $usuario->usu . ' ya existe!';
			break;
		}
	}
	if ($agregar) {
		$usuario->usu = $_REQUEST['usu'];
		$usuario->password = $_REQUEST['password'];
		$id = $usuario->insert();
		echo 'Se ha registrado correctamente!';
	}
	$usuario->free();
?>