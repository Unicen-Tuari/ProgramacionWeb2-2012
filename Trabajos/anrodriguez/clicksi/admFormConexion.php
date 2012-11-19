<?php
include_once 'config.php';
include_once("/usr/share/php/HTML/Template/Sigma.php");

include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Rubro.php';

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/admFormConexion.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$rubro     = new DO_Rubro();
$nRubros   = $rubro->find();

if ($nRubros>0) {
	while($rubro->fetch()) {
        $tpl->setVariable(linkRubro, $rubro->getnombre());
        $tpl->setVariable(nombreRubro, $rubro->getnombre());
        $tpl->parse('rubros');
    }
}

$tpl->show();

?>