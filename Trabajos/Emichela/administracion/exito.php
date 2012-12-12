<?php 
require_once '../config.php';
require_once 'HTML/Template/Sigma.php';
session_start();


$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/exito.html");
$mensaje = $_SESSION["mensaje_exitoso"];
$tpl->setVariable('mensaje_exito',$mensaje);

$tpl->parse('cuadro');
$tpl->show();


?>
		