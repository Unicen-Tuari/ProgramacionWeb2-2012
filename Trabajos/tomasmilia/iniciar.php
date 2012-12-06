<?php

ini_set('display_errors', '0');     #No muestra los errores
session_start(); 

require_once ('config.php'); 
require_once ('DataObjects/Usuario.php'); 

$usuario = new DO_Usuario;

$usuario->nombre = $_POST['username'];
$usuario->apellido = $_POST['lastname'];
$usuario->email= $_POST['email'];
$usuario->password= $_POST['password'];

$id = $usuario->insert();
$usuario->free();

?>