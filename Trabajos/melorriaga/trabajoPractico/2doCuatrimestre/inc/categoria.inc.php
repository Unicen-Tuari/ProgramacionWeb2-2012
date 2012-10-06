<?php
	class Categoria {
		private $codigo;
		private $categoria;

		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}

		public function setCategoria($categoria) {
			$this->categoria = $categoria;
		}

		public function getCodigo() {
			return $this->codigo;
		}

		public function getCategoria() {
			return $this->categoria;
		}

		/***********************************************************/

		public function showCategory() {
			echo "<li class='categoria'>";
			echo "<a href='listadoAjax.php?codigo=";
			echo $this->getCodigo();
			echo "'>";
			echo $this->getCategoria();
			echo "</a>";
			echo "</li>";
		}

		public function getAllCategories($conexion) {
			$registros = $conexion->query('select * from categoria');
			while ($reg = mysql_fetch_array($registros)) {
				$categoria = new Categoria();
				$categoria->setCodigo($reg['codigo']);
				$categoria->setCategoria($reg['cat']);
				$allCategories[] = $categoria;
			}
			return $allCategories;
		}
	}
?>