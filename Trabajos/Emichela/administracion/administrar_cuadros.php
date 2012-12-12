<?php 
require_once '../config.php';
require_once '../DataObjects/Producto.php';
require_once 'HTML/Template/Sigma.php';
session_start();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/administrar_cuadros.html");

$producto= new DO_Producto();
$producto->find();
while ($producto->fetch()){
	$path_miniatura="/proyecto/imagenes/miniaturas/".$producto->path;
	$link_ampliar= "ampliar_info.php?id=".$producto->idproducto;
	
	$tpl->setVariable('foto-cuadro',$path_miniatura);
	$tpl->setVariable('id_cuadro',$producto->idproducto);
	$tpl->parse('cuadro');
}
$tpl->show();
?>