<?php
class Cliente{	
	private $id;
	private $nombre;
	private $apellido;
	private $email;
	
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
	public function set_apellido($apellido){
		$this->apellido=$apellido;
	}
	public function get_apellido(){
		return $this->apellido;
	}
	public function set_email($email){
		$this->email=$email;
	}
	public function get_email(){
		return $this->email;
	}
};
	
class Exposicion{
		private $id;
		private $titulo;
		private $fotoportada;
		
	public function set_id($id){
		$this->id=$id;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_titulo($titulo){
		$this->titulo=$titulo;
	}
	public function get_titulo(){
		return $this->titulo;
	}
	public function set_fotoportada($fotoportada){
		$this->fotoportada=$fotoportada;
	}
	public function get_fotoportada(){
		return $this->fotoportada;}
};

class Producto{
	private $idproducto;
	private $cantidad;
	private $precio;
	private $descripcion;
	private $path;
	
	public function set_idproducto($idproducto){
		$this->idproducto=$idproducto;
	}
	public function get_idproducto(){
		return $this->idproducto;
	}
 	public function set_cantidad($cantidad){
		$this->cantidad=$cantidad;
	}
	public function get_cantidad(){
		return $this->cantidad;
	}
	public function set_precio($precio){
		$this->precio=$precio;
	}
	public function get_precio(){
		return $this->precio;
	}
	public function set_descripcion($descripcion){
		$this->descripcion=$descripcion;
	}
	public function get_descripcion(){
		return $this->descripcion;
	}
	public function set_path($path){
		$this->path=$path;
	}
	public function get_path(){
		return $this->path;
	}
};
class Consulta{	
	private $id;
	private $id_cliente;
	private $consulta;
	
 	public function set_id($id){
		$this->id=$id;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_id_cliente($id_cliente){
		$this->id_cliente=$id_cliente;
	}
	public function get_id_cliente(){
		return $this->id_cliente;
	}
	public function set_consulta($consulta){
		$this->consulta=$consulta;
	}
	public function get_consulta(){
		return $this->consulta;
	}

};


class Mannagerdb{
	private $link;
	private $result;
	
	public function conectarse(){
		$mysql_host = "localhost";
		$mysql_database = "artedigital";
		$mysql_user = "root";
		$mysql_password = "";
		$this->link = mysql_connect($mysql_host, $mysql_user, $mysql_password);
		mysql_select_db($mysql_database, $this->link);
	}
	public function query($query){
		$this->result = mysql_query($query);
		return $this->result;
	}
	public function liberar_resultados(){
		mysql_free_result($this->result);
	}
	public function cerrar_conexion(){
		mysql_close($this->link);
	}
	public function listado_exposiciones_descendientes(){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$result = $manager->query('SELECT * FROM exposicion ORDER BY idexposicion DESC');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
		while ($renglon = mysql_fetch_assoc($result)) {
				$exposicion = new Exposicion;
				$exposicion->set_id($renglon["idexposicion"]);
				$exposicion->set_titulo($renglon["titulo"]);
				$exposicion->set_fotoportada($renglon["fotoportada"]);
				$arr[]=$exposicion;
			}
		}
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
		return $arr;
	}
	public function listado_productos($id){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$result = $manager->query('
		SELECT * 
		FROM producto p
		INNER JOIN renglonexposicion r on p.idproducto = r.idproducto
		WHERE r.idexposicion = "'.$id.'"
		');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			while ($renglon = mysql_fetch_assoc($result)) {
				$producto = new Producto;
				$producto->set_idproducto($renglon["idproducto"]);
				$producto->set_cantidad($renglon["cantidad"]);
				$producto->set_precio($renglon["precio"]);	
				$producto->set_descripcion($renglon["descripcion"]);		
				$producto->set_path($renglon["path"]);					
				$arr[]=$producto;
			}
		}
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
		return $arr;
	}
public function listado_completo_productos(){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$result = $manager->query('
		SELECT * 
		FROM producto		
		');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			while ($renglon = mysql_fetch_assoc($result)) {
				$producto = new Producto;
				$producto->set_idproducto($renglon["idproducto"]);
				$producto->set_cantidad($renglon["cantidad"]);
				$producto->set_precio($renglon["precio"]);	
				$producto->set_descripcion($renglon["descripcion"]);		
				$producto->set_path($renglon["path"]);					
				$arr[]=$producto;
			}
		}
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
		return $arr;
	}
	public function ampliar_producto($id){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$result = $manager->query('
		SELECT * 
		FROM producto
		WHERE idproducto='.$id);
		$aux = mysql_fetch_assoc($result);
		$producto = new Producto;
		$producto->set_idproducto($aux["idproducto"]);
		$producto->set_cantidad($aux["cantidad"]);
		$producto->set_precio($aux["precio"]);
		$producto->set_descripcion($aux["descripcion"]);
		$producto->set_path($aux["path"]);
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
		return $producto;
	}
	public function nuevo_comentario($arr){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$cliente = new Cliente();
		$cliente->set_nombre($arr["nombre"]);
		$cliente->set_apellido($arr["apellido"]);
		$cliente->set_email($arr["email"]);
		$result = $manager->query('SELECT idcliente FROM cliente WHERE email="'.$cliente->get_email().'"');		
		if ($aux = mysql_fetch_assoc($result)){
			$cliente->set_id($aux["idcliente"]);
		}
		else{
			$manager->query('INSERT INTO cliente (nombre, apellido, email)
							VALUES ('.
							'"'.$cliente->get_nombre().'",'.
							'"'.$cliente->get_apellido().'",'.
							'"'.$cliente->get_email().'"'.
							')');
			$result = $manager->query('SELECT idcliente FROM cliente WHERE email="'.$cliente->get_email().'"');
			$aux = mysql_fetch_assoc($result);
			$cliente->set_id($aux["idcliente"]);
		}
		$consulta = new Consulta();
		$consulta->set_id_cliente($cliente->get_id());
		$consulta->set_consulta($arr["comentario"]);
		$manager->query('INSERT INTO consulta (idcliente, descripcion)
							VALUES ('.
							'"'.$consulta->get_id_cliente().'",'.
							'"'.$consulta->get_consulta().'"'.
							')');
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}	
}
?>