<?php

class ProductoTarjeta extends ProductoIVA {    

    public function getPrecio() {
        return parent::getPrecio()+(parent::getPrecio()*10/100);       
    }
   
}

?>
