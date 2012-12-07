<?php

require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
	
$error=$tpl->loadTemplateFile("/templates/contacto.html");

$tpl->setVariable('titulo','Enviar una Consulta');

$tpl->parse('Cabecera');

$tpl->show();	

?>