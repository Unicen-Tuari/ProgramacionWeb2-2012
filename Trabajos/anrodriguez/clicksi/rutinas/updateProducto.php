<?php
require_once '../config.php';
require_once '../mensaje.php';
require_once '../rutinas/util.php';
include_once '../clases/pear/dataobjects/Articulo.php';

$par_abmAccion=$_REQUEST["abmAccion"];
$par_idProducto=$_REQUEST["id"];
$par_nombreProducto=$_REQUEST["nombre"];
$par_precioVenta=$_REQUEST["precioVenta"];
$par_productoRubroId=$_REQUEST["rubro"];

$par_imagenPath         = $_FILES['nombreArchivoImagen']['tmp_name'];
$par_destinoImagenPath  = PATH_IMAGENES.basename($_FILES['nombreArchivoImagen']['name']);

$producto = new DO_Articulo();
$producto->setnombre($par_nombreProducto);
$producto->setprecio_venta($par_precioVenta);
$producto->setrubro($par_productoRubroId);

if ($par_imagenPath!="") {
    $producto->setimagen_path($_FILES['nombreArchivoImagen']['name']);
}

if (($par_abmAccion=='ADD'||$par_abmAccion=='CHANGE')&&$par_imagenPath!="") {
    if (!move_uploaded_file($par_imagenPath, $par_destinoImagenPath)) {
            $direccion=  mensaje('Imposible cargar archivo', 'admProductos.php', 'Volver', 'El siguiente archivo no fue cargado al servidor', $par_imagenPath, '');
            header("Location: $direccion");
            return;
    }
}

if ($par_abmAccion=='DEL') {
    $producto->setid($par_idProducto);
    $ret = $producto->delete();
} else
    if ($par_abmAccion=='CHANGE') {
        $producto->setid($par_idProducto);
        $ret = $producto->update();
    }
    else
        if ($par_abmAccion=='ADD') {    
            $ret = $producto->insert();
        }
        else {
            $direccion=  mensaje('Producto no actualizado', 'admProductos.php', 'Volver', 'No se especifico la accion a ejecutar', '', '');
            header("Location: $direccion");
            return;
        }

if (!$ret) {
    if ($ret<>0) {
            $direccion=  mensaje('Producto no actualizado', 'admProductos.php', 'Volver', 'Imposible agregar o modificar producto', 'Codigo: '.$ret, '');
        }
    else {
        $direccion=  mensaje('Producto no actualizado', 'admProductos.php', 'Volver', '', '', '');
        }
} else {
        if($par_abmAccion=='DEL') {
            $direccion=  mensaje('Actualizacion correcta!', 'admProductos.php', 'Volver', 'El siguiente producto fue eliminado', trim($par_nombreProducto), '');            
        } else
            if($par_abmAccion=='CHANGE') {
                $direccion=  mensaje('Actualizacion correcta!', 'admProductos.php', 'Volver', 'El siguiente producto fue modificado', trim($par_nombreProducto), '');
            } else {
                $direccion=  mensaje('Actualizacion correcta!', 'admProductos.php', 'Volver', 'El siguiente producto fue agregado', trim($par_nombreProducto), '');
            }       
}

$producto->free();

header("Location: $direccion");

?> 

