<?php 
		include_once 'config.php';
		include_once 'DataObjects/Usuario.php';
		require_once 'HTML/Template/Sigma.php';

		//incluyo sigma
		$template = new HTML_Template_Sigma('.');
		$error=$template->loadTemplateFile("/templates/login.html");
		include_once 'comun.php';	
		
if(!$_POST){ 
		$template->show();
} 
else
{	
		include_once 'comun.php';

		session_start();
		//DB_DataObject::debugLevel(5);
		$usuario_post = ($_POST['usuario']);
		$password_post = ($_POST['password']);

		$usuario = new usuario;
		$usuario->whereAdd("Usuario = '$usuario_post'");
		$usuario->whereAdd("Password = '$password_post'");
		$usuario->find();
		$encontrado = false;

		while ($usuario->fetch() && !$encontrado) {

			if ( $usuario->Usuario == $usuario_post && $usuario->Password == $password_post ){
				$_SESSION["Usuario"] = $usuario->Usuario;
				$_SESSION["Nombre"] = $usuario->Nombre;
				$_SESSION["UsuarioID"] = $usuario->ID;
				$encontrado = true;
				break;
			}
		}

		if ($encontrado) {
			$template->setVariable('claseNotificacion', "success");
			$template->setVariable('mensajeNotificacion', "Usted se ha logeado Correctamente!");
			$template->setVariable('descripcionNotificacion', "");
			header("location:Index.php");
		} else {
			$template->setVariable('claseNotificacion', "error");
			$template->setVariable('mensajeNotificacion', "Error en el Login!");
			$template->setVariable('descripcionNotificacion', "");	
		}
		$template->show();



		

}
?>