<?php
require_once '../config.php';
require_once '../mensaje.php';
//require_once '../rutinas/util.php';
include_once '../clases/pear/dataobjects/Rubro.php';


$par_idRubro        = $_POST["id"];
$par_nombreRubro    = $_POST["nombre"];

$rubro = new DO_Rubro();
$rubro->setid($par_idRubro);
$rubro->setnombre($par_nombreRubro);

$ret = $rubro->update();

if (!$ret) {
	mensaje('','','', '/tupar/clicksi/admRubros.php','Volver');
} else { 
	mensaje('Actualización correcta!','','','/tupar/clicksi/admRubros.php','Volver');
}

$rubro->free();
?>