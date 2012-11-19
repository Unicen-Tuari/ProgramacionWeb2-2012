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

$rubro     = new DO_Rubro();
$articulo  = new DO_Articulo();

$tpl->setVariable(rubroNombre, $par_rubro);
$rubro->setnombre($par_rubro);

// - Cargar Catálogo de artículos-----------------------------------------------

$rubro->find();
$rubro->fetch();
$articulo->rubro = $rubro->getid(); 
$nArticulos      = $articulo->find();

if ($nArticulos) {
	while($articulo->fetch()) {
        $tpl->setVariable(articuloNombre, $articulo->getnombre());
        $tpl->setVariable(articuloMoneda, MONEDA2);
        $tpl->setVariable(articuloPrecioVenta, $articulo->getprecio_venta());
        $tpl->setVariable(articuloImgSrc, "./imagenes/productos/".$articulo->getimagen_path());
        $tpl->setVariable(articuloImgalt, $articulo->getimagen_path());
        $tpl->parse('producto');
    }
}

// - Cargar Indice--------------------------------------------------------------
$rubro     = new DO_Rubro();
$nRubros   = $rubro->find();

if ($nRubros) {
	while($rubro->fetch()) {
        $tpl->setVariable(linkRubro, $rubro->getnombre());
        $tpl->setVariable(nombreRubro, $rubro->getnombre());
        $tpl->parse('rubros');
    }
}

$tpl->show();
