<?php
	class usuario {
		private $codigo;
		private $usu;
		private $password;
		
		public function getCodigo() {
			return $this->codigo;
		}
		
		public function getUsu() {
			return $this->usu;
		}
		
		public function getPassword() {
			return $this->password;
		}
		
		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}
		
		public function setUsu($usu) {
			$this->usu = $usu;
		}
		
		public function setPassword($password) {
			$this->password = $password;
		}
	}
?>