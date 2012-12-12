<?php 
require_once '../config.php';
require_once '../DataObjects/Producto.php';
require_once 'HTML/Template/Sigma.php';
session_start();


$cuadro=new DO_Producto();
$cuadro->idproducto=$_GET["id"];
$cuadro->find();
$cuadro->fetch();

if (isset ($_POST['modificar'])){	
	$cuadro->titulo = $_POST['titulo'];
	if ($_FILES['foto']['name']!="")
		$cuadro->path = $_FILES['foto']['name'];
	$cuadro->descripcion = $_POST['descripcion'];
	$cuadro->update();
	if ($_FILES['foto']['name']!="")
		copy($_FILES['foto']['tmp_name'],"../imagenes/$cuadro->path");//copio la imagen temporal
		
  $_SESSION["mensaje_exitoso"]= "CUADRO MODIFICADO CON EXITO!!";
  header('Location:exito.php');
}



$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/modificar_cuadro.html");
$tpl->setVariable('titulo',$cuadro->titulo);
$path="../imagenes/miniaturas/$cuadro->path";
$tpl->setVariable('path-imagen',$path);
$tpl->setVariable('descripcion',$cuadro->descripcion);
$tpl->parse('cuadro');
$tpl->show();

?>