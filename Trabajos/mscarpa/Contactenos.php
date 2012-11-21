<?php 
	require_once 'HTML/Template/Sigma.php';

	//incluyo sigma
	$template = new HTML_Template_Sigma('.');
	$error=$template->loadTemplateFile("/templates/contactenos.html");
	include_once 'comun.php';

if(!$_POST){ 
	
		$template->show();
} 
else
{

	$mail='mauro.scarp@gmail.com'; 
	$Nombre = $_POST['nombre']; 
	$Apellido = $_POST['apellido']; 
	$Mensaje = $_POST['mensaje']; 
 
	echo $Nombre;
	echo $Apellido;
	echo $Mensaje;


	$message = "nombre:".$Nombre."apellido:".$Apellido."mensaje:".$Mensaje.""; 


	if (mail($mail,"Consulta de Tandil Inmobiliario",$message)){
		$template->setVariable('claseNotificacion', "success");
		$template->setVariable('mensajeNotificacion', "Su consulta se envio correctamente!");
		$template->setVariable('descripcionNotificacion', "");				
	}
	else{
		$template->setVariable('claseNotificacion', "error");
		$template->setVariable('mensajeNotificacion', "Error al enviar su consulta!");
		$template->setVariable('descripcionNotificacion', "");	
	}
	$template->parse("notificacion");
	$template->show();
}
?>
