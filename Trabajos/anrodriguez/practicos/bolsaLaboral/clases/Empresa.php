<?php
class Empresa {
    private $nombre;
    private $id;
    
    private $perfiles = array();
    
    public function __construct($nombre, $id) {
        $this->nombre       = $nombre;
        $this->id = $id;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getId() {
        return $this->id;
    }
    
    public function addPerfil($perfil) {
        $this->perfiles[] = $perfil;
    }
    
    public function getPerfiles() {
        return $this->perfiles;
    }

    public function listarPerfiles() {
        echo '<pre>';
        echo "Empresa: ".$this->getNombre()."\n\n";
       
        foreach ($this->perfiles as $perfil) {
            echo ESPACIO.ESPACIO.'Perfil: ('.$perfil->getId().") ".$perfil->getNombre()."\n";
            $perfil->listarCursos();
        }
        echo '</pre>';
    }

}
?>
