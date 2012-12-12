<?php 
	include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
	require_once 'clases\config.inc.php';
	
        include_once 'clases\pear\dataobjects\Ordenestrabajo.php';
        include_once 'clases\pear\dataobjects\Cliente.php';
        include_once 'clases\pear\dataobjects\Productos.php';
       
         
	$tpl = new HTML_Template_Sigma (".");
        $ret = $tpl->loadTemplateFile("./templates/principal.html");
        
        if (!$ret) {
            die ('Error de carga Template');
        }    
        session_start();
	$mail = $_SESSION['usuario'];
      
	if(!isset($_SESSION['usuariovalido']))
        {header("Location:/dgm/index.html");
            return;
        }
            /*echo " <script lenguaje='JavaScript'>
		location.href= '/dgm/index.html';
		</script>";*/

        if (isset($_GET['ordenamiento']))
            $ordenamiento= $_REQUEST['ordenamiento'];
       
         if($mail == "dgmadmin@gmail.com") {
             $tpl->setVariable(likadministrador,"'modifproducto.php'> Administrador");    
             header("Location:/dgm/modifproducto.php?ordenamiento=$ordenamiento");
         }
		
	$nro_cliente=0;
	$cliente = new DO_Cliente();
	$cliente->setmail($mail);
	$cliente->find();
	$clie = $cliente->fetch();
	if ($clie) {
            $nro_cliente = $cliente->getid_cliente();
	}
	
	$o = new DO_Ordenestrabajo;
	$p = new DO_Productos;
	$c = new DO_Cliente;
	$o->id_cliente = $nro_cliente;
	$o->joinAdd($p,'LEFT');
        
        switch ($ordenamiento) {
            case 0:$o->orderBy('nro_orden ASC');  
                break;
            case 1:$o->orderBy('marca ASC'); 
                break;
            case 2:$o->orderBy('modelo ASC'); 
                break;
            case 3:$o->orderBy('fecha_ingreso ASC'); 
                break;
            case 4:$o->orderBy('fecha_egreso ASC');
                break;
            case 5:$o->orderBy('tarea ASC'); 
                break;
        }   
        
	$o->find();
	while ($o->fetch()) {	
	  $tpl->setVariable(nro_orden, $o->nro_orden);
	  $tpl->setVariable(marca, $o->marca);
	  $tpl->setVariable(modelo, $o->modelo);  
	  $tpl->setVariable(fechaingreso, $o->fecha_ingreso);
	  $tpl->setVariable(fechaegreso, $o->fecha_egreso);
	  $tpl->setVariable(tarea, $o->tarea);
	  $tpl->parse('tablaprincipal');
	}
    
        $tpl->show();
?>