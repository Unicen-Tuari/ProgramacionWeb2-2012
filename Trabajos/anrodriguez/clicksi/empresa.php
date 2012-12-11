<?php
include_once 'config.php';
include_once("HTML/Template/Sigma.php");

include_once 'clases/pear/dataobjects/Rubro.php';

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/empresa.html");

if (!$retOK) {
    die ('Error al cargar template');
}

session_start();

$rubro     = new DO_Rubro();
$nRubros   = $rubro->find();

if ($nRubros>0) {
	while($rubro->fetch()) {
        $tpl->setVariable(linkRubro, $rubro->getnombre());
        $tpl->setVariable(nombreRubro, $rubro->getnombre());
        $tpl->parse('rubros');
    }
}

if (isset($_SESSION['usuario']) ) {
    $tpl->setVariable(linkCerrarSesion, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="cerrarSesion.php">Cerrar Sesion ('.$_SESSION['usuario'].')</a>');
    $tpl->parse('cerrarSesion');
}

$tpl->show();

?>
