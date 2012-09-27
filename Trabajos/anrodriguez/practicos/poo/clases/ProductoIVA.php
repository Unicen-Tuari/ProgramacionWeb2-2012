<?php

class ProductoIVA extends Producto {    
    
    public function getPrecio(){
        return $this->precio+$this->getIVA();       
    }  

    protected function getIVA(){
        return $this->precio*21/100;       
    }  
}

?>
