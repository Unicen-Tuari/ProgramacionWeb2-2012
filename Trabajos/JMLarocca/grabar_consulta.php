<?php
	
        include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\Clieconsulta.php';
	include_once './clases/config.inc.php';
	$nombre=$_POST["nombre"];
	$e_mail=$_POST["e_mail"];
	$telefono=$_POST["telefono"];
	$motivo=$_POST["motivo"];
	$comentario=$_POST["comentario"];
        
        
        $cons = new DO_Clieconsulta(); 
	$cons->setnombreusu($nombre);
	$cons->setemail($e_mail);
	$cons->settelefono($telefono);
	$cons->setmotivo($motivo);
	$cons->setcomentario($comentario);
		
	$cons->insert();
        
	echo " <script lenguaje='JavaScript'>
	alert('Formulario Enviado Correctamente');location.href= '/DgM/formulario.php';
	</script>";
?>	