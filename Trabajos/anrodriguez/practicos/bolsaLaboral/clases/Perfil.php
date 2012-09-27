<?php
class Perfil {

    private $id;
    private $nombre;
    
    private $cursos = array();

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
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    
    public function addCurso($curso){
        $this->cursos[] = $curso;
    }

    public function getCursos(){
        return $this->cursos;
    }

    public function listarCursos() {
        echo "<pre>";
        echo TAB."Cursos: \n";
        foreach ($this->cursos as $curso) {
            echo TAB.TAB.$curso->getId().") ".$curso->getNombre()."\n";
        }
        echo "----------------------------------------------------------------\n";
        echo '</pre>';
    }

}

?>