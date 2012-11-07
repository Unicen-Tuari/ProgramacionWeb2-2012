<?php
//require_once('DBmanager.inc.php');
require_once('cabecera.php');
require_once('menu.php');
?>
<div class="contenido">
<br/>
Bienvenido al Sistema de Consultas de Ordenes de Reparacion. <br/><br/>

Por Favor Ingrese el Numero de Orden y Pulse el boton Consultar para poder visualizar el Estado de su Equipo en reparacion.<br/><br/>

<form action="orden.php" onsubmit="return validarOrden()" method="post">
<label>Número de Orden:</label> <input name="nroorden" id="nroorden" type="text" /><br/>
<label>Contrase&ntilde;a:</label> <input name="contras" id="contras" type="text" /><br/>
<input name="Consultar" type="submit" value="Consultar" /></form><br/>
</div>
<?php 
require_once('piedepagina.php');
?>