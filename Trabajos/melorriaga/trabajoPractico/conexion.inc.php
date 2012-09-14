<?php
	class conexion {
		private $conexion;
		
		public function conectar($server, $username, $password, $database) {
			$aux = mysql_connect($server, $username, $password) or die ('Problemas en la conexion a la base de datos');
			mysql_select_db($database, $aux) or die ('Problemas en la seleccion de la base de datos');
			$this->conexion = $aux;
		}
		
		public function consulta($sql) {
			$registros = mysql_query($sql, $this->conexion) or die ('Problemas en la consulta a la base de datos');
			return $registros;
		}
		
		public function desconectar() {
			mysql_close($this->conexion) or die ('Problemas en el cierre de la base de datos');
		}
	}	
?>