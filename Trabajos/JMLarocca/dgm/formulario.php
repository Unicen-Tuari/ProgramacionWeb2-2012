<?php 

        include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
	require_once 'clases\config.inc.php';
        session_start();
        
	$mail = $_SESSION['usuario'];
        
        
        
        $mensaje = $_GET['msg'];
         
        $tpl = new HTML_Template_Sigma (".");
        $ret = $tpl->loadTemplateFile("./templates/formulario.html");
         if (!$ret)
            {
                die ('Error de carga Template');
            }  
         $tpl->setVariable(mail,$mail);
         $tpl->setVariable(mensaje,$mensaje);
         $tpl->parse('form');
         $tpl->show();
	
?>