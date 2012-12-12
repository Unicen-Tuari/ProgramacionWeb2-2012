<?php 
require_once '../config.php';
require_once 'HTML/Template/Sigma.php';
require_once '../DataObjects/Exposicion.php';
session_start();
$idexpo=$_GET["id"];
$expo = new DO_Exposicion();
$expo->idexposicion=$idexpo;
$expo->find();
$expo->fetch();
$expo->delete();
//borrar carpetas
header("Location:administrar_expos.php");



?>

	
		