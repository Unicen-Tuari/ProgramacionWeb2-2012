<?php

require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
	
$error=$tpl->loadTemplateFile("/templates/consulorden.html");

$tpl->setVariable('titulo','Consultar Orden');

$tpl->parse('Cabecera');

$tpl->show();	

?>