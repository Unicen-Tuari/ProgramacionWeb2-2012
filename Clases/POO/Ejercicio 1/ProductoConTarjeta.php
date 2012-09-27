<?php
class ProductoConTarjeta extends ProductoConIva
{
private $interes = 15;
 
function get_precio()
{
	return (parent::get_precio() + (parent::get_precio() * $this->interes)/100);
}

}
?>