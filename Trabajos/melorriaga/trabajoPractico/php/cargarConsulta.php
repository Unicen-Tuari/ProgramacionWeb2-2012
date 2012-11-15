<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('config.php');
	require_once('DataObjects/Consulta.php');
	$consulta = new DO_Consulta;
	$consulta->nombre = $_REQUEST['nombre'];
	$consulta->mail = $_REQUEST['mail'];
	$consulta->con = $_REQUEST['con'];
	$id = $consulta->insert();
	$consulta->free();
?>