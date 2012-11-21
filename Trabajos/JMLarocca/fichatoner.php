<?php 

        include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
	require_once 'clases\config.inc.php';
        
	include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\ordenestrabajo.php';
        include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\productos.php';
        include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\Cliente.php';
	
        session_start();
	$orden = $_GET['orden'];
        $usuario = $_SESSION['usuario'];
	//$ordenamiento= $_GET['ordenamiento'];	
	
        $ordentrabajo = new DO_Ordenestrabajo;
        $producto = new DO_Productos;
        $cliente = new DO_Cliente;

        $ordentrabajo->setnro_orden($orden);
        $ordentrabajo->find();
        $ordentrabajo->fetch();
        
        $producto->setid_producto($ordentrabajo->getid_producto());
        $producto->find();
        $producto->fetch();        
        $cliente->setid_cliente($ordentrabajo->getid_cliente());
        $cliente->find();
        $cliente->fetch();
        
        $tpl = new HTML_Template_Sigma (".");
        $ret = $tpl->loadTemplateFile("./templates/fichatoner.html");
         if (!$ret)
            {
                die ('Error de carga Template');
            }  
        $tpl->setVariable(nro_orden, $ordentrabajo->getnro_orden());
        $tpl->setVariable(marca, $producto->getmarca());
        $tpl->setVariable(modelo, $producto->getmodelo());
        $tpl->setVariable(nombre, $cliente->getnombre());
        $tpl->setVariable(apellido, $cliente->getapellido());
        $tpl->setVariable(fechaingreso, $ordentrabajo->getfecha_ingreso());
        $tpl->setVariable(fechaegreso, $ordentrabajo->getfecha_egreso());
        $tpl->setVariable(tarea, $ordentrabajo->gettarea());
        $tpl->parse('ficha');
        
   $tpl->show();
	?>

		
