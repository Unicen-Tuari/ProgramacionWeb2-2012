<?php
include_once 'config.php';
require_once './rutinas/util.php';	

session_start();

if (!isset($_SESSION['usuario']) ) {
    redirigirPagina('','admFormConexion.php');
}    
else { 
    redirigirPagina('','administracion.php');
}
?>
