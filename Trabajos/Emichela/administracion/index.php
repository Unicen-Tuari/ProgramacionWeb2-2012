<?php 
require_once '../config.php';
require_once '../DataObjects/usuario.php';
require_once 'HTML/Template/Sigma.php';
session_start();
$mens_er="";
if (isset ($_POST['enviar'])){	
	$usuario= New DO_Usuario();
	$usuario->nombre=$_POST['usuario'];
	$usuario->password=$_POST['password'];
	
	if ($usuario->find()){
		$_SESSION["mensaje_exitoso"]="";
		header('Location:agregar_cuadro.php');		
	}else{
		$mens_er= "Los datos estan erroneos";		
	}
}


$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/index.html");
$tpl->setVariable('mens_er',$mens_er);
$tpl->parse('mensaje_error');
$tpl->show();
?>