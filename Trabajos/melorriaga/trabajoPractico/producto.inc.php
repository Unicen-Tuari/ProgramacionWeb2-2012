<?php
	class producto {
		private $codigo;
		private $nombreImagen;
		private $nombre;
		private $caracteristicas;
		private $precio;
		private $cantidad;
		private $fechaIngreso;
		private $codigoCaracteristica;
		
		public function getCodigo() {
			return $this->codigo;
		}
		
		public function getNombreImagen() {
			return $this->nombreImagen;
		}
		
		public function getNombre() {
			return $this->nombre;
		}
		
		public function getCaracteristicas() {
			return $this->caracteristicas;
		}
		
		public function getPrecio() {
			return $this->precio;
		}
		
		public function getCantidad() {
			return $this->cantidad;
		}
		
		public function getFechaIngreso() {
			return $this->fechaIngreso;
		}
		
		public function getCodigoCategoria() {
			return $this->codigoCaracteristica;
		}
		
		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}
		
		public function setNombreImagen($nombreImagen) {
			$this->nombreImagen = $nombreImagen;
		}
		
		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}
		
		public function setCaracteristicas($caracteristicas) {
			$this->caracteristicas = $caracteristicas;
		}
		
		public function setPrecio($precio) {
			$this->precio = $precio;
		}
		
		public function setCantidad($cantidad) {
			$this->cantidad = $cantidad;
		}
		
		public function setFechaIngreso($fechaIngreso) {
			$this->fechaIngreso = $fechaIngreso;
		}
		
		public function setCodigoCategoria($codigoCategoria) {
			$this->codigoCaracteristica = $codigoCategoria;
		}
		
		public function mostrarProducto() {
			$nombreImagenGrande = "imagenes/productos/grandes/" . $this->getNombreImagen();
			$nombreImagenChica = "imagenes/productos/chicas/" . $this->getNombreImagen();
			$caracteristicas = "Caracteristicas: " . $this->getCaracteristicas();
			$precio = "Precio: " . $this->getPrecio();
			echo "<div class=\"producto\">";
			echo "<div class=\"imagen\"><a href=\"$nombreImagenGrande\" rel=\"lightbox\" title=\"$this->nombre\"><img src=\"$nombreImagenChica\"></a></div>";
			echo "<div class=\"descripcion\">$this->nombre<br><br>$caracteristicas<br><br>$precio</div>";
			echo "</div>";
		}
	}
?>