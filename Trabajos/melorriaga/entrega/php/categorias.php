<?php
	ini_set('display_errors', '0');
	require_once 'config.php';
	require('DataObjects/Categoria.php');
	$categoria = new DO_Categoria;
	$categoria->find();
	echo "<ul>";
	while ($categoria->fetch()) {
		showCategory($categoria);
	}
	echo "</ul>";
	$categoria->free();

	function showCategory($categoria) {
		echo "<li class='categoria'>";
		echo "<a href='php/listado.php?codigo=";
		echo $categoria->codigo;
		echo "'>";
		echo $categoria->cat;
		echo "</a>";
		echo "</li>";
	}
?>