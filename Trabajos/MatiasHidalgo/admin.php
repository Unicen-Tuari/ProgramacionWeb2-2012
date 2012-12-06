<?php

require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
	
$error=$tpl->loadTemplateFile("/templates/admin.html");

$tpl->setVariable('titulo','Conectarse como Administrador');

$tpl->parse('Cabecera');

$tpl->show();	

?>