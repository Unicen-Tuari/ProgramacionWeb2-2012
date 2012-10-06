<?php
	include('inc/conexion.inc.php');
	include('inc/usuario.inc.php');

	include('conexion.php');

	$usuario = new Usuario();
	$usuario->setUsuario($_REQUEST['usuario']);
	$usuario->setPassword($_REQUEST['contrasena']);

	$nuevo = $usuario->getUsuario();
	$agregar = true;

	$usuarios = $usuario->getAllUsers($conexion);
	foreach ($usuarios as $u) {
		$viejo = $u->getUsuario();
		if ($viejo == $nuevo) {
			echo "<div id='texto'>";
			echo 'El usuario ' . $nuevo . ' ya existe!';
			echo "</div>";
			$agregar = false;
			break;
		}
	}

	if ($agregar) {
		$usuario->addUser($conexion);
		echo "<div id='texto'>";
		echo 'Se ha registrado correctamente!';
		echo "</div>";
	}

	include('desconexion.php');
?>