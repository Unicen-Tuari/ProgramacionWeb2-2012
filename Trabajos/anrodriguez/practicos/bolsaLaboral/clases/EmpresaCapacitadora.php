<?php
include_once 'Empresa.php';
include_once 'Curso.php';

class EmpresaCapacitadora extends Empresa {
    private $alumnos = array();
    
    public function __construct($nombre, $id) {
        parent::__construct($nombre, $id);
    }
    
    public function addAlumno($alumno) {
        $this->alumnos[] = $alumno;
    }
    
    public function listarAlumnos() {
        echo "<pre>";
        echo "Empresa: ".$this->getNombre()." (Alumnos) \n";
        
        foreach ($this->alumnos as $alumno) {
            echo "<pre>";
            echo TAB.$alumno->getNroLegajo().' - '.$alumno->getNombre()."\n";
            $alumno->listarPerfiles();
        }
        echo '</pre>';
    }
}
?>