<?php
		require_once 'HTML/Template/Sigma.php';

		//cargo las posibles notificaciones
		$template = new HTML_Template_Sigma('.');
		$error=$template->loadTemplateFile("/templates/login.html");
		include_once 'comun.php';
		session_destroy();
		
		$template->show();
		header("location:login.php");
?>	
