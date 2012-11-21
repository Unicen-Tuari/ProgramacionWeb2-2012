
<?php

function enviarMail($par_razonsocial, $par_email, $par_telefono, $par_localidad, $par_motivo, $par_comentarios) {
$header = 'From: '.$par_email."\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje  = "Este mensaje fue enviado por ".$par_razonsocial." \r\n";
$mensaje .= "Su e-mail es: ".$par_email." \r\n";
$mensaje .= "Telefono:".$par_telefono." \r\n";
$mensaje .= "Localidad ".$par_localidad." \r\n";
$mensaje .= "Motivo".$par_motivo." \r\n";
$mensaje .= "Comentarios".$par_comentarios." \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'anrodriguez.click@gmail.com';
$asunto = 'Clicksi site. Consulta';

mail($para, $asunto, utf8_decode($mensaje), $header);

}
?>

<?php
require_once '../config.php';
require_once '../rutinas/util.php';
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

if (!$idConsulta) {
	redirigirPagina('', '/tupar/clicksi/errorConexion.php');
} else { 
//    enviarMail($par_razonsocial, $par_email, $par_telefono, $par_localidad, $par_motivo, $par_comentarios);
	redirigirPagina('Su consulta ha sido registrada. En breve nos comunicaremos con usted. ¡Muchas Gracias!', '/tupar/clicksi/index.php');
}

$consulta->free();
?>