<?php

ini_set('display_errors', '0');     #No muestra los errores
session_start(); 

require_once ('config.php'); 
require_once ('DataObjects/Usuario.php'); 

$usuario = new DO_Usuario;
$usuario->find();
$logueado = false;

while($usuario->fetch()){

	if ($usuario->email == $_POST['email'] && $usuario->password == $_POST['password'] )
		{

			$_SESSION['logueado'] = true;
			$logueado = true;
			
		}


}

if ($logueado == false){

	header('location: login.php');
}else{

	header('location: panel.php');
}



?>