<?php
	Class EmpTextil {
		private $nombre;

		public function __construct($nombre) {
			$this->nombre = $nombre;
		}

		public function definirPerfil($persona, $curso){
			$persona->perfil->agregarCurso($curso);
		}

		public function emplearPersona($persona){
			$persona->emplear();
		}

		public function consultarPorNombre($nombre, $global) {
			foreach ($global as $actual) {
				if ($actual->getNombre() == $nombre) {
					$actual->mostrarPersona();
				}
			}
		}
	}
?>