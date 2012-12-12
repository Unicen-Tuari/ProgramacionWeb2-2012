<?php
require_once '../config.php';
require_once '../DataObjects/Usuario.php';

require_once 'HTML/Template/Sigma.php';

session_start();
$mensaje="";

if (isset ($_POST['enviar'])) {
	$usuario=new DO_Usuario();
	$usuario->nombre=$_POST['user'];
	$usuario->password=$_POST['pass'];
	if ($usuario->find()){
		$_SESSION['secret']="asd";
		header("Location: panel.php");		
	}
	else{
		$mensaje = "usuario o pass incorrecto";					
	}		
} 

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/index.html");
$tpl->setVariable('mensaje', $mensaje);
$tpl->parse('listado_provincias');
$tpl->show();
?>