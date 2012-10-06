<?php
	session_start();
?>

<html>
<head>

<title>Novedades - Venta de Productos Electronicos</title>

<script src="css/lightbox/js/jquery-1.7.2.min.js"></script>
<script src="css/lightbox/js/lightbox.js"></script>
<link href="css/lightbox/css/lightbox.css" rel="stylesheet" />

<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/encabezado.css" rel="stylesheet" type="text/css" />
<link href="css/novedades.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="funciones.js"></script>

</head>
<body>

<?php
	include('encabezado.inc.php');
	
	function dibujarSeparador($categoria) {
		echo '<div class="separador">' . $categoria . '</div>';
	}
?>

<div id="cuerpo">

<?php
	$manager = new manager();
	$server = 'localhost';
	$username = 'tp';
	$pass = '123456';
	$database = 'tp';
	$conexion = new conexion();
	$conexion->conectar($server, $username, $pass, $database);
	$productos = $manager->getLatestProducts($conexion);
	foreach ($productos as $pro) {
		$pro->mostrarProducto();
	}
	$conexion->desconectar();
?>

</div>

</body>
</html>