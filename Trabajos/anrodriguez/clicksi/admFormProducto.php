<?php
include_once 'config.php';
include_once("/usr/share/php/HTML/Template/Sigma.php");

include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Articulo.php';

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/admFormProducto.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$idProducto = $_GET["producto"];

$producto = new DO_Articulo();
$producto->setid($idProducto);
$nProductos = $producto->find();

if ($nProductos>0) {
    $producto->fetch();
    $tpl->setVariable(productoNombre, $producto->getnombre());
    $tpl->setVariable(productoId, $producto->getid());
    $tpl->setVariable(productoPrecioVenta, $producto->getprecio_venta());
    $tpl->setVariable(productoImagenPath, $producto->getimagen_path());
    $tpl->parse('producto_actualizar');
}

$tpl->show();

?>
