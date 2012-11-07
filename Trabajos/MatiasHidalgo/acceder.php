<?php



require_once('cabecera.php');
require_once('menu.php');
?>
<div class="contenido">
Error en la conexion con el Servidor <br/>
No se pudo conectar a la base de datos con el usuario <?php echo($_POST['usuario']); ?><br/>
</div>
<?php 
require_once('piedepagina.php');
?>