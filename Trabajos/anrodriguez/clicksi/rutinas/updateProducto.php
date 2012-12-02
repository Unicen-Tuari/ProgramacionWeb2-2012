<?php
require_once '../config.php';
require_once '../rutinas/util.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Articulo.php';

$par_abmAccion=$_POST["abmAccion"];

$par_idProducto=$_POST["id"];
$par_nombreProducto=$_POST["nombre"];
$par_precioVenta=$_POST["precioVenta"];

$par_imagenPath=$_FILES['nombreArchivoImagen']['tmp_name'];
$par_destinoImagenPath=ereg_replace(" ", "", htmlspecialchars(trim(PATH_IMAGENES.basename( $_FILES['nombreArchivoImagen']['name']))));

$par_productoRubroId=$_POST["productoRubroId"];

$producto = new DO_Articulo();
$producto->setid($par_idProducto);
$producto->setnombre($par_nombreProducto);
$producto->setprecio_venta($par_precioVenta);
$producto->setrubro($par_productoRubroId);
$producto->setimagen_path($_FILES['nombreArchivoImagen']['name']);

if (move_uploaded_file($par_imagenPath, $par_destinoImagenPath)) {
    print("Archivo subido correctamente");
} else {
    print('Imposible cargar archivo...');
}

if ($par_abmAccion=='CHANGE') {
    $ret = $producto->update();
}
else
    if ($par_abmAccion=='ADD') {    
        $ret = $producto->insert();
    }
    else
        redirigirPagina('Error en actualizar Producto. No se ha especificado la acción a ejecutar', '/tupar/clicksi/admProductos.php');
    
if (!$ret) {
    if ($ret<>0)
        redirigirPagina('Error en actualizar Producto', '/tupar/clicksi/admProductos.php');
    else
        redirigirPagina('', '/tupar/clicksi/admProductos.php');
} else { 
        redirigirPagina('Actualización correcta!','/tupar/clicksi/admProductos.php');
}

$producto->free();

?> 

