<?php

function enviarMail($par_razonsocial, $par_email, $par_telefono, $par_localidad, $par_motivo, $par_comentarios) {
$header = 'From: '.$par_email."\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje  = "Este mensaje fue enviado por ".$par_razonsocial." \r\n";
$mensaje .= "Su e-mail es: ".$par_email." \r\n";
$mensaje .= "Telefono: ".$par_telefono." \r\n";
$mensaje .= "Localidad: ".$par_localidad." \r\n";
$mensaje .= "Motivo: ".$par_motivo." \r\n";
$mensaje .= "Comentarios: ".$par_comentarios." \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());
  header("Location:".$pagina);
$para = 'anrodriguez.click@gmail.com';
$asunto = 'Clicksi site.'.$par_motivo;

mail($para, $asunto, utf8_decode($mensaje), $header);

}
?>
