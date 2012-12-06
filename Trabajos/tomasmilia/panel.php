<?php 
ini_set('display_errors', '0');     #No muestra los errores
session_start();  ?>

<?php include("head.php"); ?>
<?php include("menu.php"); ?>
<?php include("body.php"); ?>
<div>
	<p>En esta seccion podras subir un producto para vender</p>



<p>Insertar Imagen</p>

<form id="signupform" name="form" autocomplete="off" action="insertimag.php" method="post" enctype="multipart/form-data">
 
<input type="file" name="file"  /><br>
Ingrese el numero de la marca:
<input type='text' name='marca'/><br> 
Ingres el precio del auto:
<input type='text' name='precio'/><br> 
Ingres el precio del mensaje:
<input type='text' name='mensaje'/><br> 
 
<input type="submit" name="button" id="button" value="Subir">
 
</form>


</div>

<?php include("footer.php"); ?>