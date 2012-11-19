<?php
include_once 'config.php';
include_once("/usr/share/php/HTML/Template/Sigma.php");

include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Articulo.php';

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/admProductos.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$articulo     = new DO_Articulo();
$nArticulos   = $articulo->find();

if ($nArticulos>0) {
	while($articulo->fetch()) {
        $tpl->setVariable(productoNombre, $articulo->getnombre());
        $tpl->setVariable(productoId, $articulo->getid());
        $tpl->parse('productos_administracion');
    }
}

$tpl->show();

?>
