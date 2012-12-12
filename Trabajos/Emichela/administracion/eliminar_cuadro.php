<?php 
require_once '../config.php';
require_once '../DataObjects/Producto.php';
require_once 'HTML/Template/Sigma.php';
session_start();


$cuadro=new DO_Producto();
$cuadro->idproducto=$_GET["id"];
$cuadro->find();
$cuadro->fetch();

if (isset ($_POST['eliminar'])){	
	$cuadro->delete();
	
	$_SESSION["mensaje_exitoso"]= "CUADRO ELIMINADO CON EXITO!!";
	header('Location:exito.php');
}


$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/eliminar_cuadro.html");
$tpl->setVariable('titulo',$cuadro->titulo);
$path="../imagenes/miniaturas/$cuadro->path";
$tpl->setVariable('path_cuadro',$path);
$tpl->parse('cuadro');
$tpl->show();

?>