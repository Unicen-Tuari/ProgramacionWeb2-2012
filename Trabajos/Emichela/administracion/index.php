<?php 
require_once 'config.php';
$user="eve";
$pasw="123";
$mens_er="";
if (isset ($_POST['enviar'])){	
	if (($_POST['usuario'] == $user)&&($_POST['password'] == $pasw)){
		header('Location:panel.php');		
	}else{
		$mens_er= "Los datos estan erroneos";		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title> DIGITAL Art </title>
<link href="../style/estilo.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	 <div id="container">
		<?php include("../include/superior.php")?>
		
		<div id= "barramenu">
	
		
		</div>
		<div id="contenido">
		<div>
			<h3>Ingreso a panel administrativo del sitio</h3>
				<form action="" method="post"> 
				<p><label>Nombre Usuario:<input type="text" name="usuario"/> </label></p>
						<p><label> Pasword: <input type="password" name="password"/> </label></p>
						<div> <?php echo $mens_er?></div>
						<p><label><input type="submit" name="enviar" value="enviar "/> </label></p>
				 </form>
		</div> 
		<a href="../index.php">VOLVER AL SITIO WEB </a>
		</div> 
		<div id="footer">
		</div>
	</div>
	
</body>
</html>