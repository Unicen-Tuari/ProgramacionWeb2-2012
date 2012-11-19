<?php
	session_start();
	ini_set('display_errors', '0');
	require_once('HTML/Template/Sigma.php');

	$template = new HTML_Template_Sigma('.');
	$error = $template->loadTemplateFile('templates/indexTop.html');
	$template->show();

	if (isset($_SESSION['login'])) {
		$template = new HTML_Template_Sigma('.');
		$error = $template->loadTemplateFile('templates/logout.html');
		$template->show();
	} else {
		$template = new HTML_Template_Sigma('.');
		$error = $template->loadTemplateFile('templates/login.html');
		$template->show();
	}

	$template = new HTML_Template_Sigma('.');
	$error = $template->loadTemplateFile('templates/indexBottom.html');
	$template->show();
?>