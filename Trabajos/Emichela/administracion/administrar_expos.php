<?php 
require_once '../config.php';
require_once '../DataObjects/Exposicion.php';
require_once 'HTML/Template/Sigma.php';
session_start();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/administrar_expos.html");

$expo= new DO_Exposicion();
$expo->find();
while ($expo->fetch()){
	$tpl->setVariable('id',$expo->idexposicion);
	$path_miniatura="/proyecto/imagenes/exposiciones/".$expo->idexposicion."/miniaturas/1.jpg";
	$tpl->setVariable('foto_portada',$path_miniatura);
	$tpl->parse('exposicion');
}
$tpl->show();
?>