<?php
	ini_set('display_errors', '0');
	require_once('config.php');
	require('DataObjects/Categoria.php');

	require_once('HTML/Template/Sigma.php');

	$template = new HTML_Template_Sigma('.');
	$error = $template->loadTemplateFile('../templates/categorias.html');

	$categoria = new DO_Categoria;
	$categoria->find();

	while ($categoria->fetch()) {
		$template->setVariable('codigo', $categoria->codigo);
		$template->setVariable('categoria', $categoria->cat);

		$template->parse('categoria');
	}

	$template->show();
	$categoria->free();
?>