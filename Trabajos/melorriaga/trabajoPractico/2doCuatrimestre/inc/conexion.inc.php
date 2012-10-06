<?php
	class Conexion {
		private $conexion;

		public function connect($server, $username, $password, $database) {
			$aux = mysql_connect($server, $username, $password) or die ('ERROR (mysql_connect)');
			mysql_select_db($database, $aux) or die ('ERROR (mysql_select_db)');
			$this->conexion = $aux;
		}

		public function query($sql) {
			$registros = mysql_query($sql, $this->conexion) or die ('ERROR (mysql_query)');
			return $registros;
		}

		public function disconnect() {
			mysql_close($this->conexion) or die ('ERROR (mysql_close)');
		}
	}
?>