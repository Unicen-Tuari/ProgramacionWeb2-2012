<?php
	ini_set('display_errors', '0');
	require_once 'config.php';
	require('DataObjects/Comentario.php');
	$comentario = new DO_Comentario;
	$comentario->find();
	$comentario->Nombre = $_POST['nombre'];
	$comentario->Fecha = $_POST['fecha'];
	$comentario->Comentario = $_POST['comentario'];
	$id = $comentario->insert();
	$comentario->free();

	header('location: index.php');
?>