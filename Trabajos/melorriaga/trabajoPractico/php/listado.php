<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('config.php');
	require_once('DataObjects/Producto.php');

	require_once('HTML/Template/Sigma.php');

	$template = new HTML_Template_Sigma('.');
	$error = $template->loadTemplateFile('../templates/listado.html');

	$producto = new DO_Producto;
	if (isset($_REQUEST['codigo'])) {
		$producto->whereAdd('codigo_categoria = ' . $_REQUEST['codigo']);
		$producto->orderBy('fecha_ingreso desc');
		$producto->find();
		while ($producto->fetch()) {
			$template->setVariable('nombre_imagen', $producto->nombre_imagen);
			$template->setVariable('caracteristicas', $producto->caracteristicas);
			$template->setVariable('precio', $producto->precio);
			$template->setVariable('nombre', $producto->nombre);

			$template->parse('listado');
		}
	} else {
		echo " ";
	}
	$template->show();
	$producto->free();
?>