<?php

ini_set('display_errors', '0');     #No muestra los errores
session_start(); 

 //unset($_SESSION['logueado']);
session_unset($_SESSION['logueado']);
 header("location:prueba.php");


?>