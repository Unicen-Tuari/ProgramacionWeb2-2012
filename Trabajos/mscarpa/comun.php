<?php
	session_start(); 	
	if (isset($_SESSION['Usuario'])) {
		$template->touchBlock('menu_logout');
	} else {
		$template->touchBlock('menu_login');	
	}
?>	