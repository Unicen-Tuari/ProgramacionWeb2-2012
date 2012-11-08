<?php
include_once 'config.php';
include_once("/usr/share/php/HTML/Template/Sigma.php");

include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Rubro.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Articulo.php';

$par_rubro = $_GET["rubro"];

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/productos.html");

if (!$retOK) {
    die ('Error al cargar template');
}
$tpl->setVariable(nombreRubro, $par_rubro);

$articulo     = new DO_Articulo();
$nArticulos   = $articulo->find();

if ($nArticulos>0) {
	while($articulo->fetch()) {
        $tpl->setVariable(nombreArticulo, $articulo->getnombre());
        $tpl->parse('producto');
    }
}

$tpl->show();
