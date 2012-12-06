<?php
require_once '../config.php';
require_once '../mensaje.php';
require_once '../rutinas/util.php';
include_once '../clases/pear/dataobjects/Rubro.php';


$par_idRubro        = $_POST["id"];
$par_nombreRubro    = $_POST["nombre"];

$rubro = new DO_Rubro();
$rubro->setid($par_idRubro);
$rubro->setnombre($par_nombreRubro);

$ret = $rubro->update();
$rubro->free();

if (!$ret) {
    $direccion=  mensaje('Rubro no actualizado', 'admRubros.php', 'Volver', 'La actualizacion del rubro no fue confirmada', '', '');
} else { 
    $direccion=  mensaje('Actualizacion correcta!', 'admRubros.php', 'Volver', 'El rubro fue modificado', '', '');
}
header("Location: $direccion");

?>