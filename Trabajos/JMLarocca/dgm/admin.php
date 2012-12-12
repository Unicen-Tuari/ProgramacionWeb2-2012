<?php       
include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
require_once 'clases\config.inc.php';
include_once 'clases\pear\dataobjects\Productos.php';

define("PATHIMAGENES", "./imagenes/");


var_dump($_FILES);

session_start();
$mail = $_SESSION['usuario'];
        
 $id_producto   = $_REQUEST["id"];
 $accion        = $_REQUEST["accion"];
 $marca         = $_REQUEST["marca"];
 $modelo        = $_REQUEST["modelo"];
 $pathimagen    = $_REQUEST["pathimagen"];

$tpl = new HTML_Template_Sigma (".");
$ret = $tpl->loadTemplateFile("./templates/admin.html");
if (!$ret) {
    die ('Error de carga Template');
}  
if($mail == "dgmadmin@gmail.com"){
    $tpl->setVariable(likadministrador,"'modifproducto.php'> Administrador");    
}

$producto = new DO_Productos();
$producto->setid_producto($id_producto);
$producto->find();
$producto->fetch();

$tpl->setVariable(id,$id_producto);
$tpl->setVariable(modelo,$producto->getmodelo());
$tpl->setVariable(marca,$producto->getmarca());
$tpl->setVariable(imagenfotoalt,PATHIMAGENES.$producto->getpath());
$tpl->setVariable(imagenfotosrc,PATHIMAGENES.$producto->getpath());
$tpl->setVariable(pathimagen,$producto->getpath());
$tpl->parse('tablaadmin');
$tpl->show();

 if($accion=="GUARDAR") {  
     $producto->marca   = $marca;
     $producto->modelo  = $modelo;
     $producto->path    = $pathimagen;
     
     $pathimage     = $_FILES['imagen']['tmp_name'];
     $pathdestino   = PATHIMAGENES.basename($_FILES['imagen']['name']);
     
     if ($pathimage!=""){
         $producto->setpath($_FILES['imagen']['name']);
         move_uploaded_file($pathimage, $pathdestino);
     }
     $producto->update();
     header("Location:/dgm/modifproducto.php");
 }
 
 

 
 /*
 
 if($accion=="GUARDAR") {
			$par_imagenPath=$_FILES['pathimagen']['tmp_name'];
			$par_destinoImagenPath=PATHIMAGENES.basename( $_FILES['pathimagen']['name']);

			$producto = new DO_Productos();
			$producto->setmarca($_REQUEST["marca"]);
			$producto->setmodelo($_REQUEST["modelo"]);
			
			if ($par_imagenPath!="") {
				$producto->setpath($_FILES['pathimagen']['name']);
			}
			$producto->update();
			header("Location:/dgm/modifproducto.php");
		}
       $producto = new DO_Productos();
       $producto->setid_producto($id_producto);
       $producto->find();
       
   
       if ($producto->fetch())
       {
         if($accion=="GUARDAR")
         {     
          $producto->setmarca($_REQUEST["marca"]);
          $producto->setmodelo($_REQUEST["modelo"]);
         
          $pathimage=$_FILES['pathimagen']['tmp_name'];
          $pathdestino=PATHIMAGENES.basename( $_FILES['pathimagen']['name']);
          $producto->update();
		  
		  
          if ($pathimage!=""){   
                $producto->setpath($_FILES['pathimagen']['name']);
			  if  (!move_uploaded_file($pathimage, $pathdestino ))
			{
             header("Location:/dgm/modifproducto.php");
             return;
            }  
            
          header("Location:/dgm/modifproducto.php");
          
         }
        else{
            $tpl = new HTML_Template_Sigma (".");
            $ret = $tpl->loadTemplateFile("./templates/admin.html");
            if (!$ret)
                {
                    die ('Error de carga Template');
                }  
            if($mail == "dgmadmin@gmail.com"){
                    $tpl->setVariable(likadministrador,"<li><br><br></li><li><a href='admin.php'> Administrador </a></li>");    
                    }
         $tpl->setVariable(modelo,$producto->getmodelo());
         $tpl->setVariable(marca,$producto->getmarca());
         $tpl->setVariable(imagenfotoalt,"./imagenes/".$producto->getpath());
         $tpl->setVariable(imagenfotosrc,"./imagenes/".$producto->getpath());
         $tpl->setVariable(pathimagen,$producto->getpath());
         $tpl->parse('tablaadmin');
         $tpl->show();
       }
	  }
	 }*/
?>