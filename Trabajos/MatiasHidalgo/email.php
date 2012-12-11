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

$mensaje = "
	<h1>El sr./sra. <b>".$_POST['nombre']." ".$_POST['apellido']."</b> realizo la siguiente consulta: </h1>
	<p>".$_POST['consulta']."</p>
	<br/>
	<p>El interesado proporciono los siguientes datos:</p>
	<p>".$_POST['tipodni'].": ".$_POST['dni']."</p>
	<a HREF='mailto:".$_POST['email']."'>".$_POST['email']."</a>
	";

$enviado = false;
if(mail('chuj4pr0@hotmail.com', 'Consulta - SGT', $mensaje))
	$enviado = true;

require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');

$error=$tpl->loadTemplateFile("/templates/email.html");

$tpl->setVariable('titulo','Consulta enviada con exito!');

$tpl->parse('Cabecera');

$tpl->setVariable('apellido',$enviado.' '.$_POST['apellido']);
$tpl->setVariable('nombre',$_POST['nombre']);

$tpl->parse('consulta');

$tpl->show();	

?>