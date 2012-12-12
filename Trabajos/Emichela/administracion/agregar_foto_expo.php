<?php 
require_once '../config.php';
require_once 'HTML/Template/Sigma.php';
require_once 'funcion_minimizar.php';
session_start();

$idexpo=$_GET["id"];
if (isset ($_POST['enviar'])){
	$directorio_foto="../imagenes/exposiciones/$idexpo";
	$nombre_archivo=time().".jpg";
	$original=$directorio_foto."/".$nombre_archivo;
	$miniatura=$directorio_foto."/miniaturas/".$nombre_archivo;
	copy($_FILES['foto']['tmp_name'],$original);
	
	$archivo_temporal="../imagenes/tmp.jpg";
	copy($_FILES['foto']['tmp_name'],$archivo_temporal);//copio la imagen temporal
	generar_imagen($archivo_temporal,150,100,$miniatura);//creo el thumbnail
	unlink($archivo_temporal);//borro el archivo temporal generado
	
	header("Location:modificar_expos.php?id=$idexpo");
}


$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/agregar_foto_expo.html");
$tpl->show();


?>