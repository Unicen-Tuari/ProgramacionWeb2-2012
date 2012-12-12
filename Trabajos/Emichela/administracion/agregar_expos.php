<?php 
require_once '../config.php';
require_once '../DataObjects/Exposicion.php';
require_once 'HTML/Template/Sigma.php';
require_once "funcion_minimizar.php";
session_start();
$mensaje="";

if (isset ($_POST['enviar'])){	
	$expo = new DO_Exposicion();
	$expo->titulo = $_POST['titulo'];
	
	$expo->Comentarios = $_POST['comentario'];
	$idexpo = $expo->insert();
	mkdir("../imagenes/exposiciones/$idexpo", 0700);
	$nombre_archivo="1.jpg";
	copy($_FILES['foto']['tmp_name'],"../imagenes/exposiciones/$idexpo/$nombre_archivo");//copio la imagen temporal
	mkdir("../imagenes/exposiciones/$idexpo/miniaturas", 0700);
	$archivo_temporal="../imagenes/tmp.jpg";
	copy($_FILES['foto']['tmp_name'],$archivo_temporal);//copio la imagen temporal
	generar_imagen($archivo_temporal,150,100,"../imagenes/exposiciones/$idexpo/miniaturas/$nombre_archivo");//creo el thumbnail
	unlink($archivo_temporal);//borro el archivo temporal generado
	
	
	$_SESSION["mensaje_exitoso"]= "EXPOSICION CARGADA CON EXITO!!";	
	header('Location:exito.php');
}


$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/agregar_expos.html");
$tpl->show();



?>		