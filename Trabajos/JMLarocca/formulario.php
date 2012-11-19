<?php 

        include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
	require_once 'clases\config.inc.php';
        $tpl = new HTML_Template_Sigma (".");
        $ret = $tpl->loadTemplateFile("./templates/formulario.html");
         if (!$ret)
            {
                die ('Error de carga Template');
            }  
            
         $tpl->show();
	
?>