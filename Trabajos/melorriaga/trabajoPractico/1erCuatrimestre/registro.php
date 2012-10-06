<?php
	session_start();
?>

<html>
<head>

<title>Registro - Venta de Productos Electronicos</title>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/encabezado.css" rel="stylesheet" type="text/css" />
<link href="css/registro.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="funciones.js"></script>

</head>
<body>

<?php
	include('encabezado.inc.php');
?>

<div id="cuerpo">

	Ingrese sus datos para registrarse en el sitio: <br /><br />
    <form action="agregarUsuario.php" onSubmit="validarRegistro()" method="post">
    Ingrese un nombre de usuario: <input type="text" class="campoTxt" id="newUser" name="newUser" /><br />
    Ingrese una contrase&ntilde;a: <input type="password" class="campoTxt" id="newPass" name="newPass" /><br /><br />
    <input type="submit" value="Finalizar registro" id="botonRegistro" name="botonRegistro" />
    </form>
    
</div>

</body>
</html>