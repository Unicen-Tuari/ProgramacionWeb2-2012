<?php
	include('inc/conexion.inc.php');
	include('inc/categoria.inc.php');

	include('conexion.php');
	$categoria = new Categoria();
	$categorias = $categoria->getAllCategories($conexion);
	foreach ($categorias as $c) {
		$c->showCategory();
	}
?>