<?php 
require_once '../config.php';
require_once '../DataObjects/Producto.php';
require_once 'HTML/Template/Sigma.php';
require_once "funcion_minimizar.php";
session_start();
$mensaje="";

if (isset ($_POST['enviar'])){	
	$producto = new DO_Producto();
	$producto->titulo = $_POST['titulo'];
	$producto->path = $_FILES['foto']['name'];
	$producto->descripcion = $_POST['descripcion'];
	$producto->insert();

	$archivo_temporal="imagenes/tmp.jpg";
	copy($_FILES['foto']['tmp_name'],$archivo_temporal);//copio la imagen temporal
	generar_imagen($archivo_temporal,150,100,"../imagenes/miniaturas/$producto->path");//creo el thumbnail
	unlink($archivo_temporal);//borro el archivo temporal generado
	
	copy($_FILES['foto']['tmp_name'],"../imagenes/$producto->path");//copio la imagen temporal
		$_SESSION["mensaje_exitoso"]= "CUADRO CARGADO CON EXITO!!";
		header('Location:exito.php');
}


$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/agregar_cuadro.html");
$tpl->show();


?>
