<?php
	session_start(); 	
	if (isset($_SESSION['Usuario'])) {
		$template->touchBlock('menu_logout');
		$template->setVariable('usuario', $_SESSION["Usuario"]);
		$template->touchBlock('submenu_login');
	} else {
		$template->touchBlock('menu_login');	
	}
?>	