<?php 
require_once 'config.php';
require_once 'DataObjects/Producto.php';
require_once 'HTML/Template/Sigma.php';

$id=$_GET["id"];

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/head.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/superior.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/barramenu.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/ampliar_info.html");
$producto = new DO_Producto();
$producto->idproducto=$id;
$producto->find();
$producto->fetch();
$ubicacion="imagenes/$producto->path";
$tpl->setVariable('foto_grande',$ubicacion);
$tpl->setVariable('descripcion',$producto->descripcion);
$tpl->parse('ampliar_info');

$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();

?>


