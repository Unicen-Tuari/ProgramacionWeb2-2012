<?php
class Producto
{
private $nombre;
protected $precio;

function Producto()
{
}

function get_precio()
{
	return $this->precio;
}

function get_nombre()
{
	return $this->nombre;
}

function set_precio($precio)
{
	$this->precio = $precio;
}

function set_nombre($nombre)
{
	$this->nombre = $nombre;
}

}
?>