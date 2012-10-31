<?php
require_once 'config.php';
require_once 'DataObjects/Comentario.php';
require_once 'HTML/Template/Sigma.php';

$comentario = new Comentario;
$comentario->Nombre = $_POST["Nombre"];
$comentario->Comentario = $_POST["Comentario"];
$comentario->Fecha = $_POST["Fecha"];
$id = $comentario->insert();

header( 'Location: index.php?id='.$id ) ;

?>