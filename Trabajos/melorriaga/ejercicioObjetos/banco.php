<?php
	class Banco {
		protected $nombre;
		protected $direccion;
		protected $telefono;

		private $cajas = array();
		private $clientes = array();

		/*------------------------------------------------------------------------------------*/

		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function setDireccion($direccion) {
			$this->direccion = $direccion;
		}

		public function setTelefono($telefono) {
			$this->telefono = $telefono;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function getDireccion() {
			return $this->direccion;
		}

		public function getTelefono() {
			return $this->telefono;
		}

		/*------------------------------------------------------------------------------------*/

		public function getCaja($nroCaja) {
			return $this->cajas[$nroCaja];
		}

		public function getCliente($nroCliente) {
			return $this->clientes[$nroCliente];
		}

		/*------------------------------------------------------------------------------------*/

		public function __construct($nombre, $direccion, $telefono) {
			$this->nombre = $nombre;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
		}

		/*------------------------------------------------------------------------------------*/

		public function crearCaja($nroCaja, $estado) {
			if (!isset($this->cajas[$nroCaja])) {
				$this->cajas[$nroCaja] = new Caja($nroCaja, $estado);
			}
			return $this->cajas[$nroCaja];
		}

		public function eliminarCaja($nroCaja) {
			if (isset($this->cajas[$nroCaja])) {
				unset($this->cajas[$nroCaja]);
			}
		}

		public function listarCajas() {
			foreach ($this->cajas as $indice) {
				$indice->mostrarCaja();
			}
		}

		/*------------------------------------------------------------------------------------*/

		public function crearCliente($nombre, $nroCliente) {
			if (!isset($this->clientes[$nroCliente])) {
				$this->clientes[$nroCliente] = new Cliente($nombre, $nroCliente);
			}
			return $this->clientes[$nroCliente];
		}

		public function eliminarCliente($nroCliente) {
			if (isset($this->clientes[$nroCliente])) {
				unset($this->clientes[$nroCliente]);
			}
		}

		public function listarClientes() {
			foreach ($this->clientes as $indice) {
				$indice->mostrarCliente();
			}
		}

	}
?>