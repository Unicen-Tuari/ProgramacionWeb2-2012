<?php
	session_start();
?>

<html>
<head>
<title>Tabla - Venta de Productos Electronicos</title>

<script src="css/lightbox/js/jquery-1.7.2.min.js"></script>
<script src="css/lightbox/js/lightbox.js"></script>
<link href="css/lightbox/css/lightbox.css" rel="stylesheet" />

<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/encabezado.css" rel="stylesheet" type="text/css" />
<link href="css/tabla.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="funciones.js"></script>

</head>
<body>

<?php
	include('encabezado.inc.php');
?>

<table>
<thead>
<th>Nombre</th>
<th>E-Mail</th>
<th>Consulta</th>
</thead>
<tr>
    <?php
        $nombre = $_REQUEST['nombre'];
        echo "<td>$nombre</td>";
        $mai = $_REQUEST['mail'];
        echo "<td>$mai</td>";
        $con = $_REQUEST['consulta'];
        echo "<td>$con</td>";
		$server = 'localhost';
		$username = 'tp';
		$pass = '123456';
		$database = 'tp';
		$conexion = new conexion();
		$conexion->conectar($server, $username, $pass, $database);
		$manager = new manager();
		$consulta = new consulta();
		$consulta->setNombre($nombre);
		$consulta->setMail($mai);
		$consulta->setCon($con);
		$manager->addQuery($conexion, $consulta);
		$conexion->desconectar();
    ?>
</tr>
</table>
<div id="cuerpo">
Sus datos se ingresaran en nuestra base de datos
</div>
</body>
</html>