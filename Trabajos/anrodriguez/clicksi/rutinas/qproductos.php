<?php
require_once 'config.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Rubro.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Articulo.php';

function html_productos($nameRubro) {

    $rubro       = new DO_Rubro;
    $articulo    = new DO_Articulo;
    
    $rubro->setnombre($nameRubro);
    $rubro->find();
    $rubro->fetch();
        
    $articulo->rubro = $rubro->getid();
	$nArticulos     = $articulo->find();
    
    $tbl='<h5>'."No existen productos en la categoría seleccionada...".'</h5>';

	if ($nArticulos>0) {
		$tbl = '<table class="tablaproductos">';
		$tbl.= '<tr><th>'.'DESCRIPCION'.'</th> ';
		$tbl.= '<th>'.'M.'.'</th> ';
		$tbl.= '<th>'.'PRECIO VENTA'.'</th>';
		$tbl.= '<th>'.'FOTOGRAFIA'.'</th>';
		$tbl.= '</tr>';

	while($articulo->fetch()) {
			$tbl.= ' <tr>';
			$tbl.= '<td><h2>'.$articulo->nombre.'</h2></td> ';
			$tbl.= '<td><h2>'.MONEDA2.'</h2></td>';
			$tbl.= '<td><h3>'.$articulo->getprecio_venta().'</h3></td> ';
			$imgsrc=PATH_IMAGENES.$articulo->getimagen_path();
			$imgalt=$articulo->getimagen_path();
			$imagen='<img alt="'.$imgalt.'" src="'.$imgsrc.'">';			
			$tbl.= '<td><h3>'.$imagen.'</h3></td> ';
			$tbl.= '</tr>';
		}
		$tbl.= '</table>';
	}	
	$articulo->free();
 
	return $tbl;

}

function html_admProductos() {

	require_once 'config.php';
	require_once './rutinas/consultas.php';
	require_once './clases/Mysqldb.php';
	require_once './clases/DbManager.php';
    require_once './clases/Browser.php';

    $articulo    = new DO_Articulo;
    $articulo->find();
    
	$tbl='<h5>'."No existen productos en la categoría seleccionada...".'</h5>';
	$tbl = '<ul class=menurubros>';
	while($articulo->fetch()) {
		$tbl.= ' <li><a href="';
		$tbl.= "http://localhost/tupar/clicksi/admFormProducto.php?producto=".$articulo->getid().'">';
		$tbl.= $articulo->getnombre();
		$tbl.= '</a> </li>';
	} 
	$tbl.= '</ul>';
	
	$articulo->free();
 
	return $tbl;
}

?>