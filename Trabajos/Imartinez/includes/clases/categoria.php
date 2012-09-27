<?php
class Categoria{
	private $id;
	private $nombre;
	private $idpadre;

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
	public function set_padre($idpadre){
		$this->idpadre=$idpadre;
	}
	public function get_padre(){
		return $this->idpadre;
	}
};
?>