<?php 

$mail='mauro.scarp@gmail.com'; 

$Nombre = $_POST['nombre']; 
$Apellido = $_POST['apellido']; 
$Mensaje = $_POST['mensaje']; 

$alert = 'El mail se envio correctamente!';

$message = " 
nombre:".$Nombre." 
apellido:".$Apellido." 
mensaje:".$Mensaje.""; 


if (mail($mail,"Consulta de Tandil Inmobiliario",$message))
Header ("Location: $index.php?var=$alert" ); 

?> 