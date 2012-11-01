<?php
	ini_set('display_errors', '0');
	require_once 'config.php';
	require('DataObjects/Comentario.php');

	require_once 'HTML/Template/Sigma.php';

	$tpl = new HTML_Template_Sigma('.');
	$error = $tpl->loadTemplateFile("templates/comentarios.html");

	$comentario = new DO_Comentario;
	$comentario->find();
	while ($comentario->fetch()) {
		$tpl->setVariable('comentario', $comentario->Comentario);
		$tpl->setVariable('nombre', $comentario->Nombre);
		$tpl->setVariable('fecha', $comentario->Fecha);
		$tpl->setVariable('id', $comentario->ID);

		$tpl->parse('comentario');
	}

	$tpl->show();
?>