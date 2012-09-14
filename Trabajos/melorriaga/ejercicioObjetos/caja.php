<?php
	class Caja {
		protected $nroCaja;
		protected $monto ;
		protected $estado;													//A o C (abierta o cerrada)

		/*------------------------------------------------------------------------------------*/

		public function setNroCaja($nroCaja) {
			$this->nroCaja = $nroCaja;
		}

		public function setMonto($monto) {
			$this->monto = $monto;
		}

		public function setEstado($estado) {
			$this->estado = $estado;
		}

		public function getNroCaja() {
			return $this->nroCaja;
		}

		public function getMonto() {
			return $this->monto;
		}

		public function getEstado() {
			return $this->estado;
		}

		/*------------------------------------------------------------------------------------*/

		public function __construct($nroCaja, $estado) {
			$this->nroCaja = $nroCaja;
			$this->monto = 0;
			$this->estado = $estado;
		}

		/*------------------------------------------------------------------------------------*/

		public function depositar($cantidad) {
			if (($cantidad > 0) && ($this->estado === 'A')) {
				$this->monto += $cantidad;
			}
		}

		public function extraer($cantidad) {
			if (($cantidad > 0) && ($cantidad <= $this->monto) && ($this->estado === 'A')) {
				$this->monto -= $cantidad;
			}
		}

		/*------------------------------------------------------------------------------------*/

		public function mostrarCaja() {
			echo "Nro de Caja: " . $this->getNroCaja() . "<br>";
			echo "Monto: " . $this->getMonto() . "<br>";
			echo "Estado (Abierta o Cerrada): " . $this->getEstado() . "<br><br>";
		}
	}
?>