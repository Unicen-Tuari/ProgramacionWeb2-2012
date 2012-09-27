<?php
class CajaDeAhorro{	
	
	private $id;
	private $saldo;
	
	public function __construct(){
		$this->id=0;
		$this->saldo=0;		
	}	
	public function CajaDeAhorro($id){
		$this->id=$id;
		$this->saldo=0;	
	}	
	public function depositar($monto){
		$this->saldo+=$monto;		
	}
	public function extraer($monto){
		if ($monto <= $this->saldo)
			$this->saldo-=$monto;
		else
			echo ("no tiene suficiente saldo");
	}
	public function saldo_actual(){
		return $this->saldo;
	}	
	public function mostrar(){
		echo "</br>";
		echo "Id de la cuenta: ".$this->id."</br>";
	}
}
?>