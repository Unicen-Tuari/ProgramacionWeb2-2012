<?php 
	require_once 'HTML/Template/Sigma.php';

	//incluyo sigma
	$template = new HTML_Template_Sigma('.');
	$error=$template->loadTemplateFile("/templates/contactenos.html");
	include_once 'comun.php';
	$template->show();
?>
