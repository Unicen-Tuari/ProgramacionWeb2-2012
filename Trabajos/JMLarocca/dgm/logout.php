<?php  
session_start();
session_destroy();
header("Location:/dgm/index.html");

/*echo " <script lenguaje='JavaScript'>
		location.href= '/dgm/index.html';
		</script>";*/
?>