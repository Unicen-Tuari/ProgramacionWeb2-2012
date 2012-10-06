<?php
	include('inc/conexion.inc.php');
	include('inc/producto.inc.php');

	include('conexion.php');
	$producto = new Producto();
	$productos = $producto->getLatestProducts($conexion);
	foreach ($productos as $p) {
		$p->showProduct();
	}
	include('desconexion.php');
?>