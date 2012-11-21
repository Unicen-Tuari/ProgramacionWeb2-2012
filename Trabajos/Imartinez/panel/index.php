<?php
//datos login
$user = "yastay";
$pass = "yastay";
//fin datos login

require_once("../includes/conexion.php");
session_start();
$mensaje="";

if (isset ($_POST['enviar'])) {
	if (($_POST['user'] == $user) && ($_POST['pass'] == $pass)){
		$_SESSION['secret']="asd";
		header("Location: panel.php");
	}
	else{
		$mensaje = "usuario o pass incorrecto";					
	}		
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Panel Administrativo de Yastay clasificados</title>
</head>

<body>
	<h1>Panel Administrativo de Yastay clasificados</h1>
    <div>
    	<form method="post" action="">
    		<p>Usuario: <input name="user" value=""/></p> 
    		<p>Password: <input name="pass" type="password" value=""/></p> 
    		<div class="alert"><?php echo $mensaje?></div>
    		<input type="submit" value="Ingresar al panel" name="enviar"/>
    	</form>        
    </div>
</body>
</html>
