<?php
include_once 'config.php';
include_once("HTML/Template/Sigma.php");

include_once 'clases/pear/dataobjects/Rubro.php';
include_once 'clases/pear/dataobjects/Articulo.php';
$cantidadFilas = CANT_FILAS_PAGINADO;

$nombreBuscar = NULL;
if ($_REQUEST["nombreBuscar"]!=""){
    $nombreBuscar = $_REQUEST["nombreBuscar"];
}

$par_rubro = $_GET["rubro"];
$pag_pagina = $_GET["pagina"];
if (!$pag_pagina) {
    $pag_inicio = 0;
    $pag_pagina = 1;
}
else {
    $pag_inicio = ($pag_pagina - 1) * $cantidadFilas;
} 

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/productos.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$rubro     = new DO_Rubro();
$articulo  = new DO_Articulo();

$tpl->setVariable(rubroNombre, $par_rubro);
$rubro->setnombre($par_rubro);

// - Cargar Catálogo de artículos-----------------------------------------------

$rubro->find();
$rubro->fetch();
$articulo->rubro = $rubro->getid(); 
$where      = '';
if ($nombreBuscar!=NULL) {
    $where = "nombre like '%$nombreBuscar%'";
    $tpl->setVariable(rubroNombre, $nombreBuscar);
}
 else { if ($par_rubro=="")
            $tpl->setVariable(rubroNombre, 'Listado Completo');
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

$articulo->limit($pag_inicio, CANT_FILAS_PAGINADO);
$nArticulos      = $articulo->find();
// Fin paginado

if ($nArticulos) {
	while($articulo->fetch()) {
        $tpl->setVariable(articuloNombre, $articulo->getnombre());
        $tpl->setVariable(articuloMoneda, MONEDA2);
        $tpl->setVariable(articuloPrecioVenta, $articulo->getprecio_venta());
        $imagen = $articulo->getimagen_path();
        if (trim($imagen=='')) { 
            $tpl->setVariable(articuloImgSrc, "./imagenes/productos/imagenNoDisponible.jpg".$articulo->getimagen_path());
        }
        else {
            $tpl->setVariable(articuloImgSrc, "./imagenes/productos/".$articulo->getimagen_path());
        }
        $tpl->setVariable(articuloImgalt, $articulo->getimagen_path());
        $tpl->parse('producto');
    }
}

// - Cargar Indice--------------------------------------------------------------
$rubro     = new DO_Rubro();
$nRubros   = $rubro->find();

if ($nRubros) {
	while($rubro->fetch()) {
        $tpl->setVariable(linkRubro, $rubro->getnombre());
        $tpl->setVariable(nombreRubro, $rubro->getnombre());
        $tpl->parse('rubros');
    }
}

$tpl->show();
