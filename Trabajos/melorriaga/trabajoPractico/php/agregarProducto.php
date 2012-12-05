<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('config.php');
	require_once('DataObjects/Categoria.php');

	require_once('HTML/Template/Sigma.php');

	for ($i = 1; $i <= 3; $i++) { 
		$_SESSION['nombreImagen' . $i] = 'no_disponible.jpg';
	}

	$template = new HTML_Template_Sigma('.');
	$error = $template->loadTemplateFile('../templates/agregarProducto.html');

	$categoria = new DO_Categoria;
	$categoria->find();

	while ($categoria->fetch()) {
		$template->setVariable('codigo', $categoria->codigo);
		$template->setVariable('categoria', $categoria->cat);

		$template->parse('select');
	}

	$template->show();
?>