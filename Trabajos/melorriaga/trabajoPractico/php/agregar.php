<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('config.php');
	require_once('DataObjects/Producto.php');

	require_once('Image/Transform.php');

	$producto = new DO_Producto;
	
	$producto->nombre = $_REQUEST['nombre'];
	$producto->precio = $_REQUEST['precio'];
	$producto->cantidad = $_REQUEST['cantidad'];
	$producto->codigo_categoria = $_REQUEST['categoria'];
	$producto->caracteristicas = $_REQUEST['caracteristicas'];

	$producto->fecha_ingreso = date("Y-m-d H:i:s");

	$producto->nombre_imagen1 = $_SESSION['nombreImagen1'];
	$producto->nombre_imagen2 = $_SESSION['nombreImagen2'];
	$producto->nombre_imagen3 = $_SESSION['nombreImagen3'];

	$origen = '../images/productos/grandes/' . $_SESSION['nombreImagen1'];
	$destino = '../images/productos/chicas/160/' . $_SESSION['nombreImagen1'];

	$it = Image_Transform::factory();
	$it->load($origen);
	$it->scaleByLength(160);
	$it->save($destino);

	$id = $producto->insert();

	$producto->free();
?>