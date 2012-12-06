<?php 
ini_set('display_errors', '0');     #No muestra los errores
session_start();  ?>

<?php include("head.php"); ?>
<?php include("menu.php"); ?>
<?php include("body.php"); ?>



<div id="Ingresar">
<p align="center">Ingresa tus datos para ingresar</p>

<form action='ingresar.php' method='POST' >
<label>Email:</label>
<input class="texto" name="email" type="text" size="20" />
<label>Clave:</label>
<input class="texto" name="password" type="password" size="20" />
<br/>
<input class="botonenviar" name="insert" type="submit" value="Enviar" class="enviar"/> 
</form> 


</div>

<div id="Registrarse">

<p align="center">Eres nuveo?. Que esperas para registrarte</p>

<form action='iniciar.php' method='POST' onSubmit="return validacion(this);">
<label>Nombre:</label>
<input class="texto" name="username" type="text" size="20" />
<label>Apellido:</label>
<input class="texto" name="lastname" type="text" size="20" />
<label>Email:</label>
<input class="texto" name="email" type="text" size="20" />
<label>Clave:</label>
<input class="texto" name="password" type="password" size="20" />
<br/>
<input class="botonenviar" name="insert" type="submit" value="Enviar" class="enviar"/> 
</form> 

</div>


<?php include("footer.php"); ?>



