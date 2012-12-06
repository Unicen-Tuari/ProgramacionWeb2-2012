<?php 
ini_set('display_errors', '0');     #No muestra los errores

session_start();  ?>

		
<div id="menu">

	
<ul>  
	<li><a href="prueba.php" >Home</a></li>  
	<li><a href="informacion.php" >Como Comprar o Vender</a></li>  
	<li><a href="contacto.php" >Contacto</a></li>  
	

	<?php if(!isset($_SESSION['logueado'])) { ?>
	<li><a href="login.php" >Ingresar|Registrarse</a></li>
	
	<?php } ?>

	<?php if(isset($_SESSION['logueado'])) { ?>
		
	<li><a href="panel.php">Panel de Usuarios</a></li> 
	<li><a href="unsession.php">Cerrar Sesion</a></li> 

	<?php } ?>

	
		
	

	

	
</ul> 		