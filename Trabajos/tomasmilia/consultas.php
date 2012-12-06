<?php

ini_set('display_errors', '0');     #No muestra los errores


require_once ('config.php'); 
require_once ('DataObjects/Consultas.php'); 

$consulta = new DO_Consultas;

//echo "hola";


$consulta->nombre = $_POST['username'];
$consulta->apellido = $_POST['lastname'];
$consulta->email= $_POST['email'];
$consulta->mensaje= $_POST['mensaje'];

$id = $consulta->insert();
$consulta->free();

?>