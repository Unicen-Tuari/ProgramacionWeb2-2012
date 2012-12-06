<?php
include_once 'config.php';
include_once("HTML/Template/Sigma.php");

include_once 'clases/pear/dataobjects/Articulo.php';

$cantidadFilas = CANT_FILAS_PAGINADO_ADM;

$nombreBuscar = NULL;
if ($_REQUEST["nombreBuscar"]!=""){
    $nombreBuscar = $_REQUEST["nombreBuscar"];
}

$pag_pagina = $_GET["pagina"];
if (!$pag_pagina) {
    $pag_inicio = 0;
    $pag_pagina = 1;
}
else {
    $pag_inicio = ($pag_pagina - 1) * $cantidadFilas;
} 


$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/admProductos.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$articulo   = new DO_Articulo();
$where      = '';
if ($nombreBuscar!=NULL) {
    $where = "nombre like '%$nombreBuscar%'";
}
$articulo->whereAdd("$where");
$nArticulos   = $articulo->find();
// - Busqueda
$tpl->setVariable(nombreBuscar, $nombreBuscar);
// - Paginado
$pag_totalPaginas = ceil($nArticulos / $cantidadFilas);
$tpl->setVariable(pag_CantFilas, $nArticulos);
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

$articulo->limit($pag_inicio, $cantidadFilas);
$nArticulos   = $articulo->find();
// Fin paginado

if ($nArticulos>0) {
	while($articulo->fetch()) {
        $tpl->setVariable(productoNombre, $articulo->getnombre());
        $tpl->setVariable(productoId, $articulo->getid());
        $tpl->parse('productos_administracion');
    }
}

$tpl->show();

?>
