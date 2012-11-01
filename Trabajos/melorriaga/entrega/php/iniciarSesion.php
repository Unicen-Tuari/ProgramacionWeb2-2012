<?php
	ini_set('display_errors', '0');
	require_once 'config.php';
	require('DataObjects/Usuario.php');
	$usuario = new DO_Usuario;
	$usuario->find();
	$loguear = false;
	while ($usuario->fetch() && !$loguear) {
		if ($usuario->usu == $_REQUEST['usu'] && $usuario->password == $_REQUEST['password']) {
			$_SESSION['login'] = true;
			$loguear = true;
			break;
		}
	}
	if ($loguear) {
		echo 'si';
	} else {
		echo 'no';
	}
	$usuario->free();
?>