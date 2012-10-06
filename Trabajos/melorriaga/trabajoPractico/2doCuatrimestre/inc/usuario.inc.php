<?php
	class Usuario {
		private $codigo;
		private $usuario;
		private $password;

		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}

		public function setUsuario($usuario) {
			$this->usuario = $usuario;
		}

		public function setPassword($password) {
			$this->password = $password;
		}

		public function getCodigo() {
			return $this->codigo;
		}

		public function getUsuario() {
			return $this->usuario;
		}

		public function getPassword() {
			return $this->password;
		}

		/***********************************************************/

		public function getAllUsers($conexion) {
			$registros = $conexion->query('select * from usuario');
			while ($reg = mysql_fetch_array($registros)) {
				$usuario = new Usuario();
				$usuario->setCodigo($reg['codigo']);
				$usuario->setUsuario($reg['usu']);
				$usuario->setPassword($reg['password']);
				$allUsers[] = $usuario;
			}
			return $allUsers;
		}
		
		public function addUser($conexion) {
			$usuario = $this->getUsuario();
			$password = $this->getPassword();
			$conexion->query('insert into usuario (usu, password) values ("' . $usuario . '", "' . $password . '")');
		}
	}
?>