<?php

class Producto {
    
    protected $id;
    protected $nombre;
    protected $precio;

    public function __construct() {
        $this->id       = 0;
        $this->nombre   = 'No Asignado';
        $this->precio   = 0;
    }

    public function Producto($id, $nombre, $precio) {
        $this->id       = $id;
        $this->nombre   = $nombre;
        $this->precio   = $precio;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    public function getId(){
        return $this->id;       
    }
    
    public function getNombre(){
        return $this->nombre;       
    }

    public function getPrecio(){
        return $this->precio;       
    }
}

?>
