<?php 
	include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
	require_once 'clases\config.inc.php';
	
        include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\Ordenestrabajo.php';
        include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\Cliente.php';
        include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\Productos.php';
	$tpl = new HTML_Template_Sigma (".");
        $ret = $tpl->loadTemplateFile("./templates/principal.html");
        
        if (!$ret)
        {
            die ('Error de carga Template');
        }    
        session_start();
	$mail = $_SESSION['usuario'];
           
	if(!isset($_SESSION['usuariovalido']))
            echo " <script lenguaje='JavaScript'>
		location.href= '/DgMweb2/index.html';
		</script>";
       
	if (isset($_GET['ordenamiento']))
			$ordenamiento= $_GET['ordenamiento'];
	if (isset($_POST['ordenamiento']))
		$ordenamiento= $_POST['ordenamiento'];
     
        
        $cliente = new DO_Cliente();
        $cliente->setmail($mail);
        $cliente->find();
        $clie = $cliente->fetch();
        if ($clie)
        {
            $ordenTrabajo = new DO_Ordenestrabajo();
            $ordenTrabajo->setid_cliente($cliente->getid_cliente());
            
            // ACA VA LO QUE ESTA ABAJOOO lo del ordenamiento!!!!
           
            $tpl->setVariable(nombrecliente, $cliente->getnombre());
            $tpl->setVariable(apellidocliente, $cliente->getapellido());
            $tpl->parse('tituloprincipal');
          
            $cantOrden = $ordenTrabajo->find();
           
           if ($cantOrden)
           {
            while($ordenTrabajo->fetch())
                {    
                     $producto = new DO_Productos();
                     $producto->setid_producto($ordenTrabajo->getid_producto());
                     $producto->find();
                     $producto->fetch();
                     $tpl->setVariable(nro_orden, $ordenTrabajo->getnro_orden());
                     $tpl->setVariable(marca, $producto->getmarca());
                     $tpl->setVariable(modelo, $producto->getmodelo());
                     $tpl->setVariable(fechaingreso, $ordenTrabajo->getfecha_ingreso());
                     $tpl->setVariable(fechaegreso, $ordenTrabajo->getfecha_egreso());
                     $tpl->setVariable(tarea, $ordenTrabajo->gettarea());
                     $tpl->parse('tablaprincipal');
                 }
           }           
         }
   $tpl->show();
   
   
   // COMENTARIO
   //$ordenTrabajo->joinAdd($cliente);
            //$ordenTrabajo->joinAdd($producto); 
          
            //$lala = $ordenTrabajo->find();
            //echo $lala;
            /*switch ($ordenamiento) {
                         case 0:$ordenTrabajo->orderBy('nro_order ASC');  
                             break;
                         case 1:$ordenTrabajo->orderBy('marca ASC'); 
                             break;
                         case 2:$ordenTrabajo->orderBy('modelo ASC'); 
                             break;
                         case 3:$ordenTrabajo->orderBy('fecha_ingreso ASC'); 
                             break;
                         case 4:$ordenTrabajo->orderBy('fecha_egreso ASC');
                             break;
                         case 5:$ordenTrabajo->orderBy('tarea ASC'); 
                             break;
                                }     */
?>
  