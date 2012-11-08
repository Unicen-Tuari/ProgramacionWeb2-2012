<?php
	Class Perfil {
		public $cantidadCursos;
		public $listaCursos;

		public function __construct() {
			$this->cantidadCursos = 0;
			$this->listaCursos = array();
		}

		public function agregarCurso($cursoNuevo) {
			$this->cantidadCursos++;
			$this->listaCursos[] = $cursoNuevo;
		}

		public function mostrarPerfil() {
			echo 'Cantidad de Cursos: ' . $this->cantidadCursos . "<br>";
			echo 'Cursos:' . "<br>";
			foreach ($this->listaCursos as $actual) {
				echo $actual . "<br>";
			}
		}

	}
?>