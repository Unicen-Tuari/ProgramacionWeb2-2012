<?php
//require_once('DBmanager.inc.php');
require_once('cabecera.php');
require_once('menu.php');
?>
<div class="contenido">
<br/>
<form action="email.php" id="form" name="formulario" onsubmit="return validarConsulta()" method="post">
<label>Ingrese su Nombre:</label> <input id="nombre" name="nombre" type="text" />
<label>Ingrese su Apellido:</label> <input id="apellido" name="apellido" type="text" />
<label>Ingrese Tipo y Numero de documento:</label>
<select name="tipodni">
  <option>DNI</option>
  <option>LC</option>
  <option>LE</option>
</select><input name="dni" id="dni" type="text" />
<label>Ingrese su Email:</label><input name="email" id="email" type="text" />
<label>Ingrese su consulta:</label>
<textarea name="consulta" id="consulta" cols="90" rows="5" style="resize:none"></textarea> 
<br/><br/>
<input name="Enviar" type="submit" value="Enviar Consulta" /></form>

</div>
<?php 
require_once('piedepagina.php');
?>