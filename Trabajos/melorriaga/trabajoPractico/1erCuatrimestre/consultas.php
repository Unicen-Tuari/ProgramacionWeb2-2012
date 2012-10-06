<?php
	session_start();
?>

<html>
<head>

<title>Consultas - Venta de Productos Electronicos</title>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/encabezado.css" rel="stylesheet" type="text/css" />
<link href="css/consultas.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="funciones.js"></script>

</head>
<body>

<?php
	include('encabezado.inc.php');
?>

<div id="cuerpo">

    <form onSubmit="validarConsulta()" action="tabla.php" method="post" name="formulario" id="formulario">
    Ingrese su nombre: <input class="campoConsulta" type="text" name="nombre" id="nombre" /><br />
    Ingrese su e-mail: <input class="campoConsulta" type="text" name="mail" id="mail" /><br /><br />
    Ingrese su consulta: <br />
    <textarea name="consulta" id="consulta"></textarea><br /><br />
    <input id="botonConsulta" name="botonConsulta" type="submit" value="Enviar Consulta" />
    </form>

</div>

</body>
</html>