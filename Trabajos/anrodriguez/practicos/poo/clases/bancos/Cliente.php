<?php

class Cliente {
    
    protected $id;
    protected $nombre;
    
    protected $cuentas = array();

    public function __construct($id, $nombre) {
        $this->id       = $id;
        $this->nombre   = $nombre;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getId(){
        return $this->id;       
    }
    
    public function getNombre(){
        return $this->nombre;       
    }
    
    public function agregarCuenta($cuenta) {
        $this->cuentas[] = $cuenta;
    }

    public function listarCuentas() {
        foreach ($this->cuentas as $cuenta) {
            $cuenta->mostrar();
        }
    }
   
   public function mostrar() {
        echo "Cliente   : ".$this->nombre."\n";
        echo "Id        : ".$this->id."\n";
        echo "--------------------------------------------------------\n";    
    }    
    
}

?>
