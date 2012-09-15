<?php

include_once('./clases/cliente.php');
include_once('./clases/cajadeahorro.php');

class Banco{	
	
	private $id;
	private $nombre;
	private $direccion;
	private $clientes;
	private $cuentas;
	private $fondos;
	private $cant_cajas;
	private $cant_clientes;
	
	public function __construct(){
		$this->id=0;
		$this->nombre="";
		$this->direccion="asdasdas21 132";
		$this->clientes="";
		$this->cuentas="";
		$this->fondos=0;	
		$this->cant_cajas=0;
		$this->cant_clientes=0;
	}	
	public function Banco($id,$nombre,$direccion,$fondos){
		$this->id=$id;
		$this->nombre=$nombre;
		$this->direccion=$direccion;
		$this->clientes="";
		$this->cuentas="";
		$this->fondos=$fondos;		
		$this->cant_cajas=0;
		$this->cant_clientes=0;
	}	
	public function crear_caja($dni){
		$this->cant_cajas=$this->cant_cajas+1;
		$caja = new cajaDeAhorro($this->cant_cajas);
		$this->cuentas[$this->cant_cajas]=$caja;
		$this->clientes[$dni]->agregar_cuenta($caja);		
		return $caja;
	}
	public function crear_cliente($dni,$nombre,$direccion){		
		$cliente = new Cliente($dni,$nombre,$direccion);
		$this->cant_clientes++;
		$this->clientes[$dni]=$cliente;
		return $cliente;
	}	
	public function get_caja($id){	
		print_r($this->cuentas);
		return $this->cuentas[$id];
	}
	public function listar_cuentas_cliente($dni){
		$this->clientes[$dni]->listar_cuentas();
	}
}
?>