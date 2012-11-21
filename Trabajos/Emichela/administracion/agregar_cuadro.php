<?php 
require_once 'config.php';
require_once '../DataObjects/Producto.php';
require_once 'HTML/Template/Sigma.php';

$mensaje="";

if (isset ($_POST['enviar'])){	
	$producto = new DO_Producto();
	$producto->titulo = $_POST['titulo'];
	$producto->path = $_POST['foto'];
	$producto->descripcion = $_POST['descripcion'];
	
generar_archivos_imagenes($_FILES['foto']['tmp_name']);
			

	
	copy($_FILES['foto']['tmp_name'],"../imagenes/$producto->id");//copio la imagen temporal
	(($_POST['usuario'] == $user)&&($_POST['password'] == $pasw));
		header('Location:panel.php');		

}

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
$error = $tpl->loadTemplateFile("/templates/agregar_cuadro.html");
$tpl->show();

//(descripcion, imagen y titulo)
//falta agregar producto

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();


?>
