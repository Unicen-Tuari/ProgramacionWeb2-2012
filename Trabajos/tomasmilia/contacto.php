<?php
 ini_set('display_errors', '0');     #No muestra los errores
 session_start();  ?>

<?php include("head.php"); ?>
<?php include("menu.php"); ?>
<?php include("body.php"); ?>

<p align="center">Por medio de esta seccion podra contactarse con los administradores del sitio</p>
<script type="text/javascript" src='vconsulta.js'></script>
<div id="formulario">

	<form action='consultas.php' method='POST' onsubmit='return validar(this)'>
<label>Nombre:</label>
<input class="texto" name="username" type="text" size="20" />
<label>Apellido:</label>
<input class="texto" name="lastname" type="text" size="20" />
<label>E-mail:</label>
<input class="texto" name="email" type="text" size="20" />
<label>Mensaje</label>
<textarea name="mensaje" cols="40" rows="8" id="mensaje" class='texto'>
</textarea>
<br/>
<input id="botonenviar" name="insert" type="submit" value="Enviar" class="enviar"/> 
	</FORM>

</div>


<?php include("footer.php"); ?>