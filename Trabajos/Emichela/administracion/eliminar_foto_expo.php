<?php 
session_start();

$idexpo=$_GET["idexpo"];
$archivo=$_GET["archivo"];
$directorio_foto="../imagenes/exposiciones/$idexpo";
$original=$directorio_foto."/".$archivo;
$minuatura=$directorio_foto."/miniaturas/".$archivo;
unlink($original);
unlink($minuatura);
header("Location:modificar_expos.php?id=$idexpo");
?>