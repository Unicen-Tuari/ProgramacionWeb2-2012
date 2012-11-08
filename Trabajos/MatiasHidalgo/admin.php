<?php
//require_once('DBmanager.inc.php');
require_once('cabecera.php');
require_once('menu.php');
?>
<div class="contenido">
<form action="acceder.php" method="post">
<br/>
<label>Administrador:</label> <input id="usuario" name="usuario" type="text"><br/>
<label>Contrase&ntilde;a:</label> <input id="contrasenia" name="contrasenia" type="text"><br/>
<input name="Ingresar" type="submit" value="Ingresar">
<br/>
</form>
</div>
<?php 
require_once('piedepagina.php');
?>