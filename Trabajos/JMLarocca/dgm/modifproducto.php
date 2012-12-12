<?php

include_once 'C:\xampp\php\PEAR\HTML\Template\Sigma.php';
require_once 'clases\config.inc.php';
include_once 'clases\pear\dataobjects\Productos.php';

$cantidadFilas = 17 ;

if (isset($_GET['ordenamiento']))
    $ordenamiento= $_REQUEST['ordenamiento'];

$pag_pagina = $_REQUEST["pagina"];
if (!$pag_pagina) {
    $pag_inicio = 0;
    $pag_pagina = 1;
} else {
    $pag_inicio = ($pag_pagina - 1) * $cantidadFilas;
}


$tpl = new HTML_Template_Sigma(".");
$ret = $tpl->loadTemplateFile("./templates/modifproducto.html");

if (!$ret) {
    die('Error de carga Template');
}
session_start();
$mail = $_SESSION['usuario'];

if (!isset($_SESSION['usuariovalido']))
   {header("Location:/dgm/index.html");
            return;
        }
    /* echo " <script lenguaje='JavaScript'>
		location.href= '/dgm/index.html';
		</script>";*/

if ($mail == "dgmadmin@gmail.com") {
    $tpl->setVariable(likadministrador, "'modifproducto.php'> Administrador");
}

// - Paginado
$producto       = new DO_Productos();
$cantProductos  = $producto->find();

$pag_totalPaginas = ceil($cantProductos / $cantidadFilas);
$tpl->setVariable(pag_CantFilas, $cantProductos);
$tpl->setVariable(pag_CantFilasPagina, $cantidadFilas);
$tpl->setVariable(pag_actual, $pag_pagina);
$tpl->setVariable(pag_paginaUltima, $pag_totalPaginas);
if ($pag_pagina<$pag_totalPaginas)
    $tpl->setVariable(pag_paginaSiguiente, $pag_pagina+1);
else
    $tpl->setVariable(pag_paginaSiguiente, $pag_pagina);

if ($pag_pagina>0)
    $tpl->setVariable(pag_paginaAnterior, $pag_pagina-1);
else
    $tpl->setVariable(pag_paginaAnterior, 0);

$tpl->setVariable(pag_CantPaginas, $pag_totalPaginas);

$producto->limit($pag_inicio, $cantidadFilas);
// Fin paginado


switch ($ordenamiento) {
    case 1:
        $producto->orderBy('marca ASC'); 
        break;
    case 2:
        $producto->orderBy('modelo ASC'); 
        break;
    default :
        $producto->orderBy('id_producto ASC'); 
        break;
}   

$producto->find();
$tpl->parse('paginado');

while ($producto->fetch()) {
    $tpl->setVariable(nro_producto, $producto->getid_producto());
    $tpl->setVariable(marca, $producto->getmarca());
    $tpl->setVariable(modelo, $producto->getmodelo());
    $tpl->parse('tablaadmin');
}

$tpl->show();
?>
  