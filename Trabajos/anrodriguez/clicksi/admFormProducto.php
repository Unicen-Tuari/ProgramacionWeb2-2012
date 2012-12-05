<?php
include_once 'config.php';
include_once("/usr/share/php/HTML/Template/Sigma.php");

include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Articulo.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Rubro.php';

function cargarRubros($tpl) {
    $rubro    = new DO_Rubro();
    $nRubros = $rubro->find();
    if ($nRubros>0) {
        while ($rubro->fetch()) {
            $tpl->setVariable(productoRubroId, $rubro->getrubro());
            $tpl->setVariable(productoRubroNombre, $rubro->getnombre());
            $tpl->parse('cargar_rubros');
        }
    }    
    return;
}

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/admFormProducto.html");

if (!$retOK) {
    die ('Error al cargar template');
}

cargarRubros($tpl);

$accion     = $_GET["accion"];
$idProducto = $_GET["producto"];

$tpl->setVariable(abmAccion, $accion);

$producto = new DO_Articulo();
$rubro    = new DO_Rubro();

if ($accion=='CHANGE') {
    $tpl->setVariable(titulo, 'Modificar Producto');
    $producto->setid($idProducto);
    $nProductos = $producto->find();
    if ($nProductos>0) {
        $producto->fetch();
        
        $rubro->setid($producto->getrubro());
        $rubro->find();
        $rubro->fetch();
        
        $tpl->setVariable(productoNombre, $producto->getnombre());
        $tpl->setVariable(productoId, $producto->getid());
        $tpl->setVariable(productoPrecioVenta, $producto->getprecio_venta());
        $tpl->setVariable(productoImagenPath, $producto->getimagen_path());
        $tpl->setVariable(productoRubroId, $producto->getrubro());
        $tpl->setVariable(productoRubroNombre, $rubro->getnombre());
        $tpl->parse('producto_actualizar');
    }
}
else
    if ($accion=='ADD') {
        $tpl->setVariable(titulo, 'Agregar Producto');
        $tpl->setVariable(productoNombre, '');
        $tpl->setVariable(productoId, '');
        $tpl->setVariable(productoPrecioVenta, '');
        $tpl->setVariable(productoImagenPath, '');
        $tpl->parse('producto_actualizar');
    }
    else
        $tpl->setVariable(titulo, '¡ERROR!, No se ha determinado que acción aplicar a este producto!');
    
$tpl->show();

?>
