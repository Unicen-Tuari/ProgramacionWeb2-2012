<?php
include "Producto.php";
include "ProductoConIva.php";
include "ProductoConTarjeta.php";

$producto = new Producto();
$productoConIva = new ProductoConIva();
$productoConTarjeta = new ProductoConTarjeta();
$precio = 10;


$producto->set_nombre("TV LED");
$productoConIva->set_nombre("TV LED + IVA");
$productoConTarjeta->set_nombre("TV LED + IVA + Interes");

$producto->set_precio($precio);
$productoConIva->set_precio($precio);
$productoConTarjeta->set_precio($precio);

echo "Precio:" . $producto->get_precio() . "</br>";
echo "Precio c/IVA:" . $productoConIva->get_precio() . "</br>";
echo "Precio c/Tarjeta:" . $productoConTarjeta->get_precio() . "</br>";



?>