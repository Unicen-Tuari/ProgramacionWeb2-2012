<?php
	ini_set('display_errors', '0');
	require_once 'config.php';
	require('DataObjects/Comentario.php');
	$comentario = new DO_Comentario;

	$comentario->get($_REQUEST['id']);
	$comentario->delete();

	header('location: index.php');
?>