<?php
	class Cliente {
		protected $nombre;
		protected $nroCliente;

		private $listaCajas;

		/*------------------------------------------------------------------------------------*/

		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function setNroCliente($nroCliente) {
			$this->nroCliente = $nroCliente;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function getNroCliente() {
			return $this->nroCliente;
		}

		/*------------------------------------------------------------------------------------*/

		public function __construct($nombre, $nroCliente) {
			$this->nombre = $nombre;
			$this->nroCliente = $nroCliente;
			$this->listaCajas = array();
		}

		/*------------------------------------------------------------------------------------*/

		public function agregarCaja($caja) {									//le paso un objeto de tipo Caja
			$aux = $caja->getNroCaja();
			if (!isset($this->listaCajas[$aux])) {
				$this->listaCajas[$aux] = $caja;
			}
		}

		public function eliminarCaja($nroCaja) {								//le paso el numero de caja (nroCaja)
			if (isset($this->listaCajas[$nroCaja])) {
				unset($this->listaCajas[$nroCaja]);
			}
		}

		/*------------------------------------------------------------------------------------*/

		public function mostrarCliente() {
			echo "Nombre: " . $this->getNombre() . "<br>";
			echo "Nro de Cliente: " . $this->getNroCliente() . "<br><br>";
		}

		/*------------------------------------------------------------------------------------*/

		public function listarCajas() {
			foreach ($this->listaCajas as $indice) {
				$indice->mostrarCaja();
			}
		}

	}
?>