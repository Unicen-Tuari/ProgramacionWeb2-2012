<?php 
require_once 'config.php';
require_once 'DataObjects/Producto.php';
require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/contenido_cuadros.html");

$producto= new DO_Producto();
$producto->find();
while ($producto->fetch()){
	$path_miniatura="/proyecto/imagenes/miniaturas/".$producto->path;
	$path="/proyecto/imagenes/".$producto->path;
	$link_ampliar= "ampliar_info.php?id=".$producto->idproducto;
	$tpl->setVariable('link_cuadro',$link_ampliar);
	$tpl->setVariable('foto-cuadro',$path_miniatura);
	$tpl->setVariable('foto-cuadro-grande',$path);
	$tpl->parse('cuadro');
}
$tpl->show();

?>
