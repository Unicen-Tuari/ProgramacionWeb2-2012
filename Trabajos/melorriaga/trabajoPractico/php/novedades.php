<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('config.php');
	require_once('DataObjects/Producto.php');

	require_once('HTML/Template/Sigma.php');

	$template = new HTML_Template_Sigma('.');
	$error = $template->loadTemplateFile('../templates/listado.html');

	$producto = new DO_Producto;
	$producto->orderBy('fecha_ingreso desc');
	$producto->limit(3);
	$producto->find();
	while ($producto->fetch()) {
		$template->setVariable('nombre_imagen', $producto->nombre_imagen);
		$template->setVariable('caracteristicas', $producto->caracteristicas);
		$template->setVariable('precio', $producto->precio);
		$template->setVariable('nombre', $producto->nombre);

		$template->parse('listado');
	}
	$template->show();
	$producto->free();
?>