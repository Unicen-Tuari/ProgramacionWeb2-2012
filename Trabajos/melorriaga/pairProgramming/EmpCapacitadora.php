<?php
	Class EmpCapacitadora {
		private $nombre;
		private $listaPersonasCapacitadas;		// tiene el dni de las personas que capacitó

		public function __construct($nombre) {
			$this->nombre = $nombre;
			$this->listaPersonasCapacitadas = array();
		}

		public function capacitar($persona, $curso){
			$this->listaPersonasCapacitadas[] = $persona->getDni();
			$persona->perfil->agregarCurso($curso);
		}
		public function listar($global){
			foreach ($this->listaPersonasCapacitadas as $actual) {
				foreach ($global as $persona) {
					if($actual == $persona->getDni()){
						$persona->mostrarPersona();
					}
				}
			}
		}
	}
?>