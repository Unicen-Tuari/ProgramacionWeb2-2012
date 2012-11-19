<?php
	require_once './rutinas/util.php';
    session_start();
    session_destroy();
    redirigirPagina('','index.php');
?>