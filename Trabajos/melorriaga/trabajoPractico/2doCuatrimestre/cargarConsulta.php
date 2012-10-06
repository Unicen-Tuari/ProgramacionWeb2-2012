<?php
	include('inc/conexion.inc.php');
	include('inc/consulta.inc.php');

	include('conexion.php');

	$consulta = new Consulta();
	$consulta->setNombre($_REQUEST['nombre']);
	$consulta->setMail($_REQUEST['mail']);
	$consulta->setConsulta($_REQUEST['consulta']);
	$consulta->addQuery($conexion);

	include('desconexion.php');

	echo "<div id='texto'>";
	echo 'Su consulta ha sido enviada correctamente!';
	echo "</div>";
?>