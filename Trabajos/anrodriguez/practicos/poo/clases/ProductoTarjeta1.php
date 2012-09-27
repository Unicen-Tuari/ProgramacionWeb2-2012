<?php

class ProductoTarjeta1 extends ProductoIVA {    

    public function getPrecio() {
        
        return $this->getPrecio() + ($this->getIVA() + $this->getPrecio()*15/100);       
    }
   
}
?>
