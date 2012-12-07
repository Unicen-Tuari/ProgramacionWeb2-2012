<?php
require_once ('config.php');
require_once 'HTML/Template/Sigma.php';

session_start();

$tpl = new HTML_Template_Sigma('.');

if(isset($_SESSION[admin])){
	session_destroy();
	
	$error=$tpl->loadTemplateFile("templates/salir.html");
	
	$tpl->setVariable('titulo','Adios Administrador!');
	
	$tpl->parse('Cabecera');
	
	$tpl->show();	
} else {
	
	$error=$tpl->loadTemplateFile("templates/error.html");
	
	$tpl->setVariable('titulo','Error - Archivo Invalido');
	
	$tpl->setVariable('error','El archivo especificado es Invalido');
	$tpl->setVariable('anterior','index.php');
	$tpl->parse('Error');
	
	$tpl->parse('Cabecera');
	
	$tpl->show();	
}
?>