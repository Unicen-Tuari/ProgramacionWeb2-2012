<?php
include_once 'config.php';
include_once("/usr/share/php/HTML/Template/Sigma.php");

include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Rubro.php';

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/admFormRubro.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$idRubro = $_GET["rubro"];

$rubro = new DO_Rubro();
$rubro->setid($idRubro);
$nRubros   = $rubro->find();

if ($nRubros>0) {
    $rubro->fetch();
    $tpl->setVariable(rubroNombre, $rubro->getnombre());
    $tpl->setVariable(rubroId, $rubro->getid());
    $tpl->parse('rubro_actualizar');
}

$tpl->show();

?>
