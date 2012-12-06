<?php include("head.php"); ?>
 <?php include("menu.php"); ?>
<?php include("body.php"); ?>


<div id="registrousuario">
<form>
<label for="user">Nombre:</label>
<input class="texto" name="username " type="text" size="20" />
<label for="user">Apellido:</label>
<input class="texto" name="lastname " type="text" size="20" />
<label for="pass">E-mail:</label>
<input class="texto" name="email " type="text" size="20" />
<label for="pass">Clave:</label>
<input class="texto" name="password" type="password" size="20" />

 

<br /> 
<input class="botonenviar" name="insert" type="submit" value="Enviar" class="enviar"/> 
</form> 
</div>

<?php include("footer.php"); ?>