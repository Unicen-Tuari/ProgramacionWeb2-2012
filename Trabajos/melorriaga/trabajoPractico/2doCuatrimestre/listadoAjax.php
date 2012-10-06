<?php
	include('inc/conexion.inc.php');
	include('inc/producto.inc.php');

	include('conexion.php');
	$producto = new Producto();

	if (isset($_REQUEST['codigo'])) {
		$productos = $producto->getProductsByCategoryId($conexion, $_REQUEST['codigo']);
		foreach ($productos as $p) {
			$p->showProduct();
		}
	}

	include('desconexion.php');
?>