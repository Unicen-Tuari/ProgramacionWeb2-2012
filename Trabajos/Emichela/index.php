<?php 
require_once 'config.php';
require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/contenido_index.html");
$tpl->show();
?>
		