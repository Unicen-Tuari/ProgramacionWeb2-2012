<?php
	ini_set('display_errors', '0');
	require_once('HTML/Template/Sigma.php');

	$template = new HTML_Template_Sigma('.');
	$error = $template->loadTemplateFile('../templates/registro.html');
	$template->show();
?>