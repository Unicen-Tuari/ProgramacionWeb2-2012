<?php
require_once ('config.php');


require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
	
$error=$tpl->loadTemplateFile("/templates/index.html");

$tpl->setVariable('titulo','Inicio');

$tpl->parse('Cabecera');

$tpl->show();	

?>