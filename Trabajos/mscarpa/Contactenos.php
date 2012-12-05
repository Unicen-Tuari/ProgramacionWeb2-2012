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

	$to      = 'mauro.scarp@gmail.com';
	$subject = 'Consulta de Tandil Inmobiliario';
	$message = $_POST['mensaje']; 
	$headers = 'From: mauro.scarp@gmail.com' . "\r\n" .
	    'Reply-To: mauro.scarp@gmail.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	 
	if(mail($to, $subject, $message, $headers)) {
		$template->setVariable('mensajeNotificacion', "Su consulta se envio correctamente!");
	} else {
		$template->setVariable('mensajeNotificacion', "Error al enviar su consulta!");
	    die('Failure: Email was not sent!');
	}

	$template->parse("notificacion");
	$template->show();

}
?>
