<?php
require_once 'mensaje.php';
function errorConexionPagina() {
    mensaje('Error de conexion');
}

function redirigirPagina($txtMsg, $pagina) {
    header("Location:".$pagina);
}
?>
