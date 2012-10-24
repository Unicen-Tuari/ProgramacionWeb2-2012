<?php
require_once 'config.php';
require_once './rutinas/consultas.php';
require_once './clases/Mysqldb.php';
require_once './clases/DbManager.php';

include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Rubro.php';

function html_rubros() {


    $rubro = new DO_Rubro;

//	$db 	= new Mysqldb(SERVER, USER, PASSWORD, BASEDATOS);
//	$dmMgr	= new DbManager($db);
	
	$nRubros =  $rubro->find();    //$dmMgr->getAllRubros(); // Array de rubros
    
    $tbl_rubros = '<ul class=menurubros>';
    
    while($rubro->fetch()) {
		$tbl_rubros.= ' <li><a href="';
		$tbl_rubros.= "http://localhost/tupar/clicksi/productos.php?rubro=".$rubro->getnombre().'">';
		$tbl_rubros.= $rubro->getnombre();
		$tbl_rubros.= '</a> </li>';
    }
    /*
	foreach($rsRubros as $rubro){
		$tbl_rubros.= ' <li><a href="';
		$tbl_rubros.= "http://localhost/tupar/clicksi/productos.php?rubro=".$rubro->getNombre().'">';
		$tbl_rubros.= $rubro->getNombre(); as $rubro
		$tbl_rubros.= '</a> </li>';
	} */
	$tbl_rubros.= '</ul>';
			
	//$db->closedb();

    $rubro->free();
	return $tbl_rubros;
}

// --------------------------------------------

function html_admRubros() {

/*	require_once 'config.php';
	require_once './rutinas/consultas.php';
	require_once './clases/Mysqldb.php';
	require_once './clases/DbManager.php';
*/	
//	$db = new mysqldb(SERVER, USER, PASSWORD, BASEDATOS);
//	$dmMgr	= new DbManager($db);

    $rubro = new DO_Rubro;
	
	$nRubros =  $rubro->find();    //$dmMgr->getAllRubros(); // Array de rubros
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