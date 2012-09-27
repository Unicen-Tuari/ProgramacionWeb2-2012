<?php

class Persona {
    private $nombre;
    private $nroDocumento;
    
    public function __construct($nombre, $dni) {
        $this->nombre       = $nombre;
        $this->nroDocumento = $dni;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDni($dni) {
        $this->nroDocumento = $dni;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getDni() {
        return $this->nroDocumento;
    }
}

?>
