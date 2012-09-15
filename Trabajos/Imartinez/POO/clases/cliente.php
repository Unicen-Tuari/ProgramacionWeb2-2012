<?php
class Cliente{	
	
	private $nombre;
	private $direccion;
	private $dni;
	private $cuentas;
	
	public function __construct(){
		$this->nombre="";
		$this->direccion="";
		$this->dni="";
		$this->cuentas="";		
	}	
	public function Cliente($dni,$nombre,$direccion){
		$this->nombre=$nombre;
		$this->direccion=$direccion;
		$this->dni=$dni;
		$this->cuentas="";	
	}	
	public function agregar_cuenta($cuenta){
		$this->cuentas[]=$cuenta;		
	}
	public function listar_cuentas(){
		foreach ($this->cuentas as $cuenta){
			$cuenta->mostrar();			
		}
	}
}
?>