<?php 
require_once 'config.php';
require_once 'DataObjects/exposicion.php';
require_once 'HTML/Template/Sigma.php';


$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/exposicion.html");
$expo = new DO_Exposicion();
$expo->find(); //encuentro todoo aca
while ($expo->fetch()){
	$id_exposicion=$expo->idexposicion;
	$link_exposicion="mostrar_fotos_exposicion.php?id=$id_exposicion";
	$tpl->setVariable('link_exposicion',$link_exposicion);
	$titulo=$expo->titulo;
	$tpl->setVariable('titulo_exposicion',$titulo);
	$foto_portada="imagenes/exposiciones/$id_exposicion/miniaturas/1.jpg";
	$tpl->setVariable('foto_portada',$foto_portada);
	$tpl->parse('exposiciones');//el begin y end de template en exposicion
}
$tpl->show();

?>
