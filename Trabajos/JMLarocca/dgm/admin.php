<?php       
include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
require_once 'clases\config.inc.php';
include_once 'clases\pear\dataobjects\Productos.php';

define("PATHIMAGENES", "./imagenes/");

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

?>