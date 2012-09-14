<?php
class ProductoConIva extends Producto
{
protected $iva = 21;


function get_precio()
{
	return parent::get_precio() + $this->get_iva();
}

function get_iva()
{
 return (parent::get_precio() * $this->iva)/100;
}

}
?>