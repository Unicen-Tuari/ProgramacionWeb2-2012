<?php
	class Producto {
		private $codigo;
		private $nombre;
		private $nombreImagen;
		private $precio;
		private $cantidad;
		private $caracteristicas;
		private $fechaIngreso;
		private $codigoCategoria;

		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}

		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function setNombreImagen($nombreImagen) {
			$this->nombreImagen = $nombreImagen;
		}

		public function setPrecio($precio) {
			$this->precio = $precio;
		}

		public function setCantidad($cantidad) {
			$this->cantidad = $cantidad;
		}

		public function setCaracteristicas($caracteristicas) {
			$this->caracteristicas = $caracteristicas;
		}

		public function setFechaIngreso($fechaIngreso) {
			$this->fechaIngreso = $fechaIngreso;
		}

		public function setCodigoCategoria($codigoCategoria) {
			$this->codigoCategoria = $codigoCategoria;
		}

		public function getCodigo() {
			return $this->codigo;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function getNombreImagen() {
			return $this->nombreImagen;
		}

		public function getPrecio() {
			return $this->precio;
		}

		public function getCantidad() {
			return $this->cantidad;
		}

		public function getCaracteristicas() {
			return $this->caracteristicas;
		}

		public function getFechaIngreso() {
			return $this->fechaIngreso;
		}

		public function getCodigoCategoria() {
			return $this->codigoCategoria;
		}

		/***********************************************************/

		public function showProduct() {
			$nombreImagenGrande = "img/productos/grandes/" . $this->getNombreImagen();
			$nombreImagenChica = "img/productos/chicas/160/" . $this->getNombreImagen();
			$caracteristicas = "Caracteristicas: " . $this->getCaracteristicas();
			$precio = "Precio: " . $this->getPrecio();
			echo "<div class='producto'>";
			echo "<div class='imagen'><a href='$nombreImagenGrande' rel='lightbox' title='$this->nombre'><img src='$nombreImagenChica'></a></div>";
			echo "<div class='descripcion'>$this->nombre<br><br>$caracteristicas<br><br>$precio</div>";
			echo "</div>";
		}

		public function getLatestProducts($conexion) {
			$registros = $conexion->query('select * from producto order by fecha_ingreso desc limit 3');
			while ($reg = mysql_fetch_array($registros)) {
				$producto = new Producto();
				$producto->setCodigo($reg['codigo']);
				$producto->setNombre($reg['nombre']);
				$producto->setNombreImagen($reg['nombre_imagen']);
				$producto->setPrecio($reg['precio']);
				$producto->setCantidad($reg['cantidad']);
				$producto->setCaracteristicas($reg['caracteristicas']);
				$producto->setFechaIngreso($reg['fecha_ingreso']);
				$producto->setCodigoCategoria($reg['codigo_categoria']);
				$latestProducts[] = $producto;
			}
			return $latestProducts;
		}

		public function getProductsByCategoryId($conexion, $id) {
			$registros = $conexion->query('select * from producto where codigo_categoria = ' . $id);
			while ($reg = mysql_fetch_array($registros)) {
				$producto = new Producto();
				$producto->setCodigo($reg['codigo']);
				$producto->setNombre($reg['nombre']);
				$producto->setNombreImagen($reg['nombre_imagen']);
				$producto->setPrecio($reg['precio']);
				$producto->setCantidad($reg['cantidad']);
				$producto->setCaracteristicas($reg['caracteristicas']);
				$producto->setFechaIngreso($reg['fecha_ingreso']);
				$producto->setCodigoCategoria($reg['codigo_categoria']);
				$allProducts[] = $producto;
			}
			return $allProducts;
		}
	}
?>