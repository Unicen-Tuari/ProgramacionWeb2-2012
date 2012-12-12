<?php
require_once ('config.php');
require_once('./DataObjects/Consultas.php');
$consulta=new DO_Consultas;
$consulta->nombre = $_POST['nombre'];
$consulta->apellido = $_POST['apellido'];
$consulta->tipo_doc = $_POST['tipodni'];
$consulta->num_doc = $_POST['dni'];
$consulta->email = $_POST['email'];
$consulta->consulta = $_POST['consulta'];

$consulta->insert();

$mensajeHTML = "
<html>
	<head></head>
	<body>
		<div style='border: 4px solid #009900;padding:20px;background-color:#00AA00;color:#FFFFFF;'>
		<h1 style='font-size:32px;font-weight:700;'>
			El sr./sra.
			<b style='font-weight:900;'>
				".$_POST['nombre']." ".$_POST['apellido']."
			</b>
			realizo la siguiente consulta:
		</h1>
		<p style='font-size:16px;font-weight:400;'>".$_POST['consulta']."</p>
		<br/>
		<p style='font-size:16px;font-weight:400;'>El interesado proporciono los siguientes datos:</p>
		<p style='font-size:16px;font-weight:400;'>".$_POST['tipodni'].": ".$_POST['dni']."</p>
		<p>Mail:<a HREF='mailto:".$_POST['email']."  style='font-size:16px;font-weight:900;color:#0000AA;text-decoration:none;''>".$_POST['email']."</a> </p>
		</div>
	</body>
</html>
"; // Mensaje formateado

$mensaje = "
	El sr./sra. ".$_POST['nombre']." ".$_POST['apellido']." realizo la siguiente consulta: 
	".$_POST['consulta']."
	
	El interesado proporciono los siguientes datos:
	".$_POST['tipodni'].": ".$_POST['dni']."
	Mail: ".$_POST['email']."
	"; // Mensaje en texto plano

$para = "chuj4pr0@hotmail.com";
/* Para molestarlo a nacho un rato:*/
$para .= ",ignaciojonas@gmail.com";


$asunto = "Consulta recibida - Sistema de Gestion de Talleres";

// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales - Ejemplos de PHP.NET
//$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
//$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

mail($para, $asunto, $mensajeHTML, $cabeceras);


require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');

$error=$tpl->loadTemplateFile("/templates/email.html");

$tpl->setVariable('titulo','Consulta enviada con exito!');

$tpl->parse('Cabecera');

$tpl->setVariable('apellido',$_POST['apellido']);
$tpl->setVariable('nombre',$_POST['nombre']);

$tpl->parse('consulta');

$tpl->show();	

?>