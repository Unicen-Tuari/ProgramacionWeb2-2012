<?php
require_once 'config.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Rubro.php';

function html_rubros() {

    $rubro = new DO_Rubro;
	
	$nRubros =  $rubro->find();
    
    $tbl_rubros = '<ul class=menurubros>';
    while($rubro->fetch()) {
		$tbl_rubros.= ' <li><a href="';
		$tbl_rubros.= "http://localhost/tupar/clicksi/productos.php?rubro=".$rubro->getnombre().'">';
		$tbl_rubros.= $rubro->getnombre();
		$tbl_rubros.= '</a> </li>';
    }

	$tbl_rubros.= '</ul>';

    $rubro->free();
	return $tbl_rubros;
}

// --------------------------------------------

function html_admRubros() {

    $rubro = new DO_Rubro;
	
	$nRubros =  $rubro->find();
	$tbl_rubros = '<ul class=menurubros>';	

    while($rubro->fetch()){
		$tbl_rubros.= ' <li><a href="';
		$tbl_rubros.= "http://localhost/tupar/clicksi/admFormRubro.php?rubro=".$rubro->getid().'">';
		$tbl_rubros.= $rubro->getnombre();
		$tbl_rubros.= '</a> </li>';
			} 
	$tbl_rubros.= '</ul>';

	$rubro->free();

	return $tbl_rubros;
}

?>