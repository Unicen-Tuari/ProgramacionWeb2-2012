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