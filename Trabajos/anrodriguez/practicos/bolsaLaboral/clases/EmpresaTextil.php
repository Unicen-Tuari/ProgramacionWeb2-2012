<?php
include_once 'Empresa.php';
include_once 'Curso.php';

class EmpresaTextil extends Empresa {

    
    public function __construct($nombre, $id) {
        parent::__construct($nombre, $id);
    }
}
?>