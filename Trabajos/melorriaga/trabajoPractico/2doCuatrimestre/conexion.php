<?php
	$server = 'localhost';
	$username = 'tp';
	$password = '123456';
	$database = 'tp';
	$conexion = new Conexion();
	$conexion->connect($server, $username, $password, $database);
?>