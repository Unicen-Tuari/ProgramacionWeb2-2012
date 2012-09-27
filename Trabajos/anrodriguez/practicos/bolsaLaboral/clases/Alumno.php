<?php

class Alumno extends Persona {
    private $nroLegajo;
    private $perfiles = array();
    
    public function __construct($persona) {
        parent::__construct($persona->getNombre(), $persona->getDni());
        $this->nroLegajo = $persona->getDni();
    }

    public function getDni() {
        parent::getDni();
    }
    
    public function getNombre() {
        return parent::getNombre();
    }
    
    public function getNroLegajo() {
        return $this->nroLegajo;
    }
    
    public function getPerfiles() {
        return $this->perfiles;
    }
    
    public function addPerfil($perfil, $estado) {
        $this->perfiles[$perfil->getId()]['perfil'] = $perfil;
        $this->perfiles[$perfil->getId()]['estado'] = $estado;
    }
    
    public function listarPerfiles() {
        foreach ($this->perfiles as $perfil) {
            echo '<pre>';
            echo TAB.TAB.TAB.$perfil['perfil']->getNombre().' ('.$perfil['estado'].")\n";
            echo '</pre>';            
        }
    }
}

?>
