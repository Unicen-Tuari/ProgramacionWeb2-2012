<?php
function errorConexionPagina() {
    header("Location:tupar/clicksi/errorConexion.php");

    //echo "	<script languaje='JavaScript'>
	//		location.href='/tupar/clicksi/errorConexion.php';
	//		</script>";
}

function redirigirPagina($txtMsg, $pagina) {
    header("Location:".$pagina);

/*    echo "<script languaje='JavaScript'>";
	if ($txtMsg<>'')
		echo "alert('$txtMsg');";
	echo "location.href='$pagina'</script>";*/
}
?>
