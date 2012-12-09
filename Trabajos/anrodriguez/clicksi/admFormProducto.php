<?php
include_once 'config.php';
include_once("HTML/Template/Sigma.php");

include_once 'clases/pear/dataobjects/Articulo.php';
include_once 'clases/pear/dataobjects/Rubro.php';

function cargarRubros(&$tpl, $rubroActual) {
    $rubro    = new DO_Rubro();
    $nRubros = $rubro->find();
    if ($nRubros>0) {
        while ($rubro->fetch()) {
            $tpl->setVariable(productoRubroId, $rubro->getid());
            $tpl->setVariable(productoRubroNombre, $rubro->getnombre());
            if($rubroActual==$rubro->getid()) {
                $tpl->setVariable(selectRubro, 'selected="selected"');
            }
            $tpl->parse('cargar_rubros');
        }
    }    
    return;
}

// Main ------------------------------------------------------------------------

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/admFormProducto.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$accion     = $_GET["accion"];
$idProducto = $_GET["producto"];

$producto = new DO_Articulo();
$rubro    = new DO_Rubro();

$tpl->setVariable(abmAccion, $accion);
if ($accion=='CHANGE')
    $tpl->setVariable(titulo, 'Modificar Producto');
else
    $tpl->setVariable(titulo, 'Suprimir Producto');

if ($accion=='CHANGE'||$accion=='DEL') {
    $producto->setid($idProducto);
    $nProductos = $producto->find();
    if ($nProductos>0) {
        $producto->fetch();
        
        $rubro->setid($producto->getrubro());
        $rubro->find();
        $rubro->fetch();

        cargarRubros($tpl, $rubro->id);
        
        $tpl->setVariable(productoNombre, $producto->getnombre());
        $tpl->setVariable(productoId, $producto->getid());
        $tpl->setVariable(productoPrecioVenta, $producto->getprecio_venta());
        $imagen = $producto->getimagen_path();
        $tpl->setVariable(productoImagenPath, $imagen);
        if (trim($imagen=='')) { 
            $tpl->setVariable(articuloImgSrc, "./imagenes/productos/imagenNoDisponible.jpg".$imagen);
        }
        else {
            $tpl->setVariable(articuloImgSrc, "./imagenes/productos/".$imagen);
        }
        $tpl->setVariable(productoRubroId, $producto->getrubro());
        $tpl->setVariable(productoRubroNombre, $rubro->getnombre());
        $tpl->parse('producto_actualizar');
    }
}
else
    if ($accion=='ADD') {
        cargarRubros($tpl, 0);
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