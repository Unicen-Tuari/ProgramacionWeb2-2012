<?php
	Class Persona {
		private $nombre;
		private $apellido;
		private $dni;
		private $estadoLaboral;			// e (empleado) o d (desempleado)
		public $perfil;

		public function __construct($nombre, $apellido, $dni) {
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->dni = $dni;
			$this->estadoLaboral = 'd';
			$this->perfil = null;
		}

		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function setApellido($apellido) {
			$this->apellido = $apellido;
		}

		public function setDni($dni) {
			$this->dni = $dni;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function getApellido() {
			return $this->apellido;
		}

		public function getDni() {
			return $this->dni;
		}

		public function getPerfil() {
			$this->perfil->mostrarPerfil();
		}
		public function mostrarPersona(){
			echo "nombre: " . $this->nombre . "<br>";
			echo "apellido: " . $this->apellido . "<br>";
			echo "dni: " . $this->dni . "<br>";
			echo "estado laboral: " . $this->estadoLaboral . "<br>";
			$this->getPerfil();
		}
		public function emplear(){
			$this->estadoLaboral = "e";
		}
	}
?>