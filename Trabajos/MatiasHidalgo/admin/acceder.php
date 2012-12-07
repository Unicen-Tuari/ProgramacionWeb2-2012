<?php
require_once ('../config.php');
require_once('../DataObjects/Usuarios.php');

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();

if(!isset($_SESSION['admin'])){
		$usuario=new DO_Usuarios;
		$usuario->cuenta = $_POST['usuario'];
		$usuario->contras = $_POST['contrasenia'];
		$cant = $usuario->find();
		$usuario->fetch();
		
		if($cant==1 && $usuario->admin == 1){
			$error=$tpl->loadTemplateFile("../templates/admin/acceder.html");
			$_SESSION['admin']=1;
			$tpl->setVariable('titulo','Bienvenido Administrador');

			$tpl->parse('Cabecera');

			$tpl->show();	
			} else {
				$error=$tpl->loadTemplateFile("../templates/errorLogin.html");
				
				$tpl->setVariable('titulo','Error al Ingresar');
				
				$tpl->parse('Cabecera');
				
				$tpl->show();
				}
	} else {
		$error=$tpl->loadTemplateFile("../templates/admin/acceder.html");
		
		$tpl->setVariable('titulo','Bienvenido Administrador');
		
		$tpl->parse('Cabecera');
		
		$tpl->show();
	}
?>