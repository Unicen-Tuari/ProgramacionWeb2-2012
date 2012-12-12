<?php
require_once '../config.php';
require_once '../DataObjects/Clasificado.php';

require_once 'HTML/Template/Sigma.php';

session_start();
if ($_SESSION['secret']!="asd")
	header("Location: index.php");		

$clasificado=new DO_Clasificado();
//$clasificado->find();
$cantidad=$clasificado->count();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/panel.html");
$tpl->setVariable('cantidad', $cantidad);
$tpl->parse('clasificados');
$tpl->show();
?>