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

	$producto->fecha_ingreso = date("Y-m-d");

	$producto->nombre_imagen = $_SESSION['nombreImagen'];

	$origen = '../images/productos/grandes/' . $_SESSION['nombreImagen'];
	$destino = '../images/productos/chicas/160/' . $_SESSION['nombreImagen'];
	//copy($origen, $destino);

	$it = Image_Transform::factory();
	$it->load($origen);
	$it->scaleByLength(160);
	$it->save($destino);

	$id = $producto->insert();

	$producto->free();
?>