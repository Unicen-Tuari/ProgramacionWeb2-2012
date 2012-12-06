<?php	
		require_once 'HTML/Template/Sigma.php';
		include_once 'config.php';
		include_once 'DataObjects/Usuario.php';

		//incluyo sigma
		$template = new HTML_Template_Sigma('.');
		$error=$template->loadTemplateFile("/templates/registrarse.html");
		include_once 'comun.php';

if(!$_POST){ 
	
		$template->show();
} 
else
{
		$nombre = ($_POST['nombre']);
		$apellido = ($_POST['apellido']);
		$dni = ($_POST['dni']);
		$fecha_nacimiento = ($_POST['fecha']);
		$direccion = ($_POST['direccion']);
		$localidad = ($_POST['localidad']);	
		$user = ($_POST['usuario']);	
		$password = ($_POST['password']);
		
		$usuario = new usuario;
		$usuario->Nombre = $nombre;
		$usuario->Apellido = $apellido;
		$usuario->DNI = $dni;
		$usuario->FechaNac = $fecha_nacimiento;
		$usuario->Localidad = $localidad;
		$usuario->Direccion = $direccion;
		$usuario->Usuario = $user;
		$usuario->Password = $password;
		$id = $usuario->Insert();

		if($id > 0){
			$template->setVariable('mensajeNotificacion', "Se Registro correctamente!");	
		}
		else{
			$template->setVariable('mensajeNotificacion', "Error en el Registro!");		
		}
		$template->parse("notificacion");
		$template->show();

	}
 ?>
