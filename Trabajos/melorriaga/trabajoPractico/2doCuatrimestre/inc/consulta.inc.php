<?php
	class Consulta {
		private $codigo;
		private $nombre;
		private $mail;
		private $consulta;

		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}

		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function setMail($mail) {
			$this->mail = $mail;
		}

		public function setConsulta($consulta) {
			$this->consulta = $consulta;
		}

		public function getCodigo() {
			return $this->codigo;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function getMail() {
			return $this->mail;
		}

		public function getConsulta() {
			return $this->consulta;	
		}

		/***********************************************************/

		public function addQuery($conexion) {
			$nombre = $this->getNombre();
			$mail = $this->getMail();
			$consulta = $this->getConsulta();
			$conexion->query('insert into consulta (nombre, mail, con) values ("' . $nombre . '", "' . $mail . '", "' . $consulta . '")');
		}
	}
?>