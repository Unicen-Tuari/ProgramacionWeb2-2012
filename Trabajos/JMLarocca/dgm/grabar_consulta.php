<?php
        
	
        include_once '.\clases\pear\dataobjects\Clieconsulta.php';
	include_once './clases/config.inc.php';
	
	$e_mail=$_POST["e_mail"];
	$motivo=$_POST["motivo"];
	$comentario=$_POST["comentario"];

        
        
        
        
        $cons = new DO_Clieconsulta(); 
	
	$cons->setemail($e_mail);
	$cons->setmotivo($motivo);
	$cons->setcomentario($comentario);
        echo $e_mail;
        echo $motivo;
        echo $comentario;
	$cons->insert();
        
        
        //mando a mi cuenta, despues va la del usuario final
        if (mail('yukihirociel@gmail.com',$motivo ,$comentario))
             header("Location:/dgm/formulario.php?msg=Su_Consulta_ha_sido_enviada_Correctamente");
        else
             header("Location:/dgm/formulario.php?msg=Error_Intente_Nuevamente");
?>	