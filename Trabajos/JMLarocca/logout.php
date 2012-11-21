<?php  
session_start();
session_destroy();
echo " <script lenguaje='JavaScript'>
		location.href= '/DgMweb2/index.html';
		</script>";
?>