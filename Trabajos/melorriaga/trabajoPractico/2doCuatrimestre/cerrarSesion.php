<?php
	session_start();
	unset($_SESSION['login']);
	echo "<button class='boton' id='botonIngresar'>Ingresar</button>";
	echo "<div id='login' class='oculto'>";
	echo "Usuario: <input type='text' class='text' id='usuarioLogin' />";
	echo "Contrase&ntilde;a: <input type='password' class='text' id='contrasenaLogin' />";
	echo "<button class='boton' id='botonLogin' style='float: none'>Aceptar</button>";
	echo "</div>";
?>