<?php
function errorConexionPagina() {
    mensaje('Error de conexion');
}

function redirigirPagina($txtMsg, $pagina) {
    header("Location:".$pagina);
}

function mensaje($texto, $pagina, $textoLink='', $par1='', $par2='',$par3=''){
    $direccion="../mensaje.php?titulo=$texto&pagina=$pagina&textoPagina=$textoLink&texto1=$par1&texto2=$par2&texto3=$par3";
    return $direccion;
}
?>
