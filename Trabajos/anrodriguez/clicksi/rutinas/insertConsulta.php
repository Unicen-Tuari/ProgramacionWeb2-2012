<?php
require_once '../config.php';
require_once 'util.php';
require_once 'enviarMail.php';
include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Consulta.php';

$par_razonsocial 	= $_POST["razonsocial"];
$par_email		 	= $_POST["email"];
$par_telefono	 	= $_POST["telefono"];
$par_localidad 		= $_POST["localidad"];
$par_motivo 		= $_POST["motivo"];
$par_comentarios 	= $_POST["comentarios"];

$consulta = new DO_Consulta();
$consulta->setrazonsocial($par_razonsocial);
$consulta->setemail($par_email);
$consulta->settelefono($par_telefono);
$consulta->setlocalidad($par_localidad);
$consulta->setmotivo($par_motivo);
$consulta->set($par_comentarios);

$idConsulta = $consulta->insert();

switch ($par_motivo) {
    case 0:
        $motivo = 'Consulta';
        break;
    case 1:
        $motivo = 'Sugerencia';
        break;
    case 2:
        $motivo = 'Reclamo';
        break;
    case 3:
        $motivo = 'Otros';
        break;
}


if (!$idConsulta) {
	redirigirPagina('', '/tupar/clicksi/errorConexion.php');
} else { 
    enviarMail($par_razonsocial, $par_email, $par_telefono, $par_localidad, $motivo, $par_comentarios);
	redirigirPagina('Su consulta ha sido registrada. En breve nos comunicaremos con usted. ¡Muchas Gracias!', '/tupar/clicksi/index.php');
}

$consulta->free();
?>