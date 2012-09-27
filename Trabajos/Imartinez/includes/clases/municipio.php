<?php
class Municipio{
	private $id;
	private $nombre;
	private $cp;
	private $id_padre;

	public function set_id($id){
		$this->id=$id;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_nombre($nombre){
		$this->nombre=$nombre;
	}
	public function get_nombre(){
		return $this->nombre;
	}
	public function set_cp($cp){
		$this->cp=$cp;
	}
	public function get_cp(){
		return $this->cp;
	}
	public function set_id_padre($id){
		$this->id_padre=$id;
	}
	public function get_id_padre(){
		return $this->id_padre;
	}
};
?>