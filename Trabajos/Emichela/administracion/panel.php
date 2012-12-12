<?php 
require_once '../config.php';
require_once 'HTML/Template/Sigma.php';
session_start();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/head.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/superior.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/barramenu.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();


?>

		
		