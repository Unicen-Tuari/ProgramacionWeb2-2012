<?php
require_once 'config.php';
require_once 'DataObjects/Comentario.php';
require_once 'HTML/Template/Sigma.php';

if(isset($_GET["id"]))
{
	$comentario = new Comentario;
	$comentario->get($_GET["id"]);
	$comentario->delete();
}
header( 'Location: index.php?delete='.$comentario->ID) ;

?>