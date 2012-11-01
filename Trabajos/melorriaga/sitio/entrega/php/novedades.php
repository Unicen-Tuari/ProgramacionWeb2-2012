<?php
	ini_set('display_errors', '0');
	require_once 'config.php';
	require('DataObjects/Producto.php');
	$producto = new DO_Producto;
	$producto->orderBy('fecha_ingreso desc');
	$producto->limit(3);
	$producto->find();
	while ($producto->fetch()) {
		showProduct($producto);
	}
	$producto->free();

	function showProduct($producto) {
		$nombreImagenGrande = "images/productos/grandes/" . $producto->nombre_imagen;
		$nombreImagenChica = "images/productos/chicas/160/" . $producto->nombre_imagen;
		$caracteristicas = "Caracteristicas: " . $producto->caracteristicas;
		$precio = "Precio: " . $producto->precio;
		$nombre = $producto->nombre;
		echo "<div class='producto'>";
			echo "<div class='imagen'><a href='$nombreImagenGrande'><img src='$nombreImagenChica'></a></div>";
			echo "<div class='descripcion'>$nombre<br>$caracteristicas<br>$precio</div>";
		echo "</div>";
	}
?>