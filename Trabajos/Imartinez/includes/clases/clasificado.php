<?php
class Clasificado{
	private $id;
	private $id_ciudad;
	private $titulo;
	private $detalle;
	private $id_categoria;
	private $contacto;
	private $fecha;
	private $precio;
	private $telefono;
	private $moneda;
	private $estado;
	//private $foto1;
	//private $foto2;
	//private $foto3;

	private $nombre_categoria;//tenga el objeto categoria
	private $nombre_municipio;

	public function set_id($id){
		$this->id=$id;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_id_ciudad($id_ciudad){
		$this->id_ciudad=$id_ciudad;
	}
	public function get_id_ciudad(){
		return $this->id_ciudad;
	}
	public function set_titulo($titulo){
		$this->titulo=$titulo;
	}
	public function get_titulo(){
		return $this->titulo;
	}
	public function set_detalle($detalle){
		$this->detalle=$detalle;
	}
	public function get_detalle(){
		return $this->detalle;
	}
	public function set_id_categoria($idcategoria){
		$this->id_categoria=$idcategoria;
	}
	public function get_id_categoria(){
		return $this->id_categoria;
	}
	public function set_contacto($contacto){
		$this->contacto=$contacto;
	}
	public function get_contacto(){
		return $this->contacto;
	}
	public function set_fecha($fecha){
		$this->fecha=$fecha;
	}
	public function get_fecha(){
		return $this->fecha;
	}
	public function set_precio($precio){	
		$this->precio=$precio;
	}
	public function get_precio(){
		return $this->precio;
	}
	public function set_telefono($telefono){
		$this->telefono=$telefono;
	}
	public function get_telefono(){
		return $this->telefono;
	}
	public function set_moneda($moneda){
		$this->moneda=$moneda;
	}
	public function get_moneda(){
		return $this->moneda;
	}
	public function set_estado($estado){
		$this->estado=$estado;
	}
	public function get_estado(){
		return $this->estado;
	}
	//esto no esta en la base de datos lo uso para comodidad
	public function set_nombre_categoria($nombre_categoria){
		$this->nombre_categoria=$nombre_categoria;
	}
	public function get_nombre_categoria(){
		return $this->nombre_categoria;
	}
	public function set_nombre_municipio($nombre_municipio){
		$this->nombre_municipio=$nombre_municipio;
	}
	public function get_nombre_municipio(){
		return $this->nombre_municipio;
	}
};
?>