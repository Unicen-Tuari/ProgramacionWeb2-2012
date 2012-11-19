<?php
require_once '../config.php';
require_once '../rutinas/util.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Articulo.php';


$par_idProducto=$_POST["id"];
$par_nombreProducto=$_POST["nombre"];

$producto = new DO_Articulo();
$producto->setid($par_idProducto);
$producto->setnombre($par_nombreProducto);

$ret = $producto->update();

if (!$ret) {
	redirigirPagina('', '/tupar/clicksi/admProductos.php');
} else { 
	redirigirPagina('Actualización correcta!','/tupar/clicksi/admProductos.php');
}

$producto->free();
?>