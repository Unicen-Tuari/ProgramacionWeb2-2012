<?php
	class consulta {
		private $codigo;
		private $nombre;
		private $mai;
		private $con;
		
		public function getCodigo() {
			return $this->codigo;
		}
		
		public function getNombre() {
			return $this->nombre;
		}
		
		public function getMail() {
			return $this->mai;
		}
		
		public function getCon() {
			return $this->con;
		}
		
		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}
		
		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}
		
		public function setMail($mai) {
			$this->mai = $mai;
		}
		
		public function setCon($con) {
			$this->con = $con;
		}
	}
?>