<?php
	class categoria {
		private $codigo;
		private $cat;
		
		public function getCodigo() {
			return $this->codigo;
		}
		
		public function getCat() {
			return $this->cat;
		}
		
		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}
		
		public function setCat($cat) {
			$this->cat = $cat;
		}
	}
?>