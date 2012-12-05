<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('config.php');
	
	/*require_once('DataObjects/Consulta.php');
	$consulta = new DO_Consulta;
	$consulta->nombre = $_REQUEST['nombre'];
	$consulta->mail = $_REQUEST['mail'];
	$consulta->con = $_REQUEST['con'];
	$id = $consulta->insert();
	$consulta->free();*/

	/*$to      = 'melorriaga@alumnos.exa.unicen.edu.ar';
	$subject = 'Fake sendmail test';
	$message = 'If we can read this, it means that our fake Sendmail setup works!';
	$headers = 'From: melorriaga@alumnos.exa.unicen.edu.ar' . "\r\n" .
	    'Reply-To: melorriaga@alumnos.exa.unicen.edu.ar' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	 
	if(mail($to, $subject, $message, $headers)) {
	    echo 'Email sent successfully!';
	} else {
	    die('Failure: Email was not sent!');
	}*/

	$to = 'melorriaga@alumnos.exa.unicen.edu.ar';
	$subject = 'Consulta de ' . $_REQUEST['nombre'] . " (" . $_REQUEST['mail'] . ")";
	$message = $_REQUEST['con'];
	$headers = 'From: ' . $_REQUEST['mail'] . "\r\n" .
	    'Reply-To: melorriaga@alumnos.exa.unicen.edu.ar' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	 
	mail($to, $subject, $message, $headers);

?>