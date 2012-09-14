<?php
	session_start();
?>

<html>
<head>

<title>Altas - Venta de Productos Electronicos</title>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/encabezado.css" rel="stylesheet" type="text/css" />
<link href="css/altas.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="funciones.js"></script>

</head>
<body>

<?php
	include('encabezado.inc.php');
?>

<div id="cuerpo">
	Ingrese un nuevo producto: <br /><br />
    <form action="agregarProducto.php" onSubmit="#" method="post">
    Ingrese el nombre del producto: <input type="text" class="campoTxt" /><br />
    Ingrese el precio del producto: <input type="text" class="campoTxt" /><br />
    Ingrese la cantidad de productos: <input type="text" class="campoTxt" /><br />
    Ingrese la fecha de ingreso del producto: <input type="text" class="campoTxt" /><br />
    Ingrese la categoria del producto: <input type="text" class="campoTxt" /><br /><br />
    Ingrese las caracteristicas del producto: <br />
    <textarea>
    </textarea><br /><br />
    Ingrese la imagen del producto: <br /><br />
    <input type="file" /><br /><br />
    <input type="submit" value="Ingresar producto" id="boton" />
    </form>
</div>

</body>
</html>