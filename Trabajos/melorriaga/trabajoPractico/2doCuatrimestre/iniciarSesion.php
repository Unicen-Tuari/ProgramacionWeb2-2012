<?php
	include('inc/conexion.inc.php');
	include('inc/usuario.inc.php');

	include('conexion.php');

	$usuario = new Usuario();
	$usuario->setUsuario($_REQUEST['usuario']);
	$usuario->setPassword($_REQUEST['contrasena']);

	$nuevoUsuario = $usuario->getUsuario();
	$nuevoPassword = $usuario->getPassword();
	$login = false;

	$usuarios = $usuario->getAllUsers($conexion);
	foreach ($usuarios as $u) {
		$viejoUsuario = $u->getUsuario();
		$viejoPassword = $u->getPassword();
		if ($viejoUsuario == $nuevoUsuario && $viejoPassword == $nuevoPassword) {
			$_SESSION['login'] = $viejoUsuario;
			$login = true;
			break;
		}
	}

	if ($login) {
		echo "<button class='boton' id='botonCerrar'>Cerrar Sesion</button>";
		echo "<div id='info'>";
		echo "Has iniciado sesion como " . $_SESSION['login'];
		echo "</div>";
	} else {
		echo "<button class='boton' id='botonIngresar'>Ingresar</button>";
		echo "<div id='login' class='oculto'>";
		echo "Usuario: <input type='text' class='text' id='usuarioLogin' />";
		echo "Contrase&ntilde;a: <input type='password' class='text' id='contrasenaLogin' />";
		echo "<button class='boton' id='botonLogin' style='float: none'>Aceptar</button>";
		echo "</div>";
	}

	include('desconexion.php');
?>