<?php
class Provincia{	
	private $id;
	private $nombre;

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
};

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

class Clasificado{
	private $id;
	private $id_ciudad;
	private $titulo;
	private $detalle;
	private $id_categoria;
	private $contacto;
	private $fecha;

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
};

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

class Mannagerdb{
	private $link;
	private $result;
	
	public function conectarse(){
		$mysql_host = "localhost";
		$mysql_database = "yastay";
		$mysql_user = "root";
		$mysql_password = "root";
		$this->link = mysql_connect($mysql_host, $mysql_user, $mysql_password);
		mysql_select_db($mysql_database, $this->link);
		//mysql_query ("SET NAMES 'utf8'");
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
	public function todas_las_provincias($manager){
		$result = $manager->query('SELECT * FROM provincia ORDER BY provincia_nombre');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
		while ($renglon = mysql_fetch_assoc($result)) {
				$provincia = new Provincia;
				$provincia->set_id($renglon["id"]);
				$provincia->set_nombre($renglon["provincia_nombre"]);		
				$arr[]=$provincia;
			}
		}
		return $arr;
	}
	public function todos_los_municipios($manager,$id_provincia){
		$result = $manager->query('SELECT * FROM ciudad WHERE provincia_id='.$id_provincia.' ORDER BY ciudad_nombre');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			while ($renglon = mysql_fetch_assoc($result)) {
				$municipio = new Municipio;
				$municipio->set_id($renglon["id"]);
				$municipio->set_nombre($renglon["ciudad_nombre"]);
				$municipio->set_id_padre($renglon["provincia_id"]);
				$municipio->set_cp($renglon["cp"]);
				$arr[]=$municipio;
			}
		}
		return $arr;
	}
	public function todas_las_categorias($manager){
		$result = $manager->query('SELECT * FROM categoria WHERE ISNULL(idpadre)');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			while ($renglon = mysql_fetch_assoc($result)) {
				$categoria = new Categoria;
				$categoria->set_id($renglon["idcategoria"]);
				$categoria->set_nombre($renglon["nombre"]);
				$categoria->set_padre($renglon["idpadre"]);
				$arr[]=$categoria;				
			}
		}
		return $arr;
	}
	public function todas_las_subcategorias($manager,$id_padre){
		$result = $manager->query('SELECT * FROM categoria WHERE idpadre='.$id_padre.' ORDER BY nombre');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			while ($renglon = mysql_fetch_assoc($result)) {
				$categoria = new Categoria;
				$categoria->set_id($renglon["idcategoria"]);
				$categoria->set_nombre($renglon["nombre"]);
				$categoria->set_padre($renglon["idpadre"]);
				$arr[]=$categoria;
			}
		}
		return $arr;
	}
	public function todas_las_categorias_y_subcategorias($manager){
		$result = $manager->query('SELECT * FROM categoria WHERE ISNULL(idpadre)');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			while ($renglon = mysql_fetch_assoc($result)) {
				$categoria = new Categoria;
				$categoria->set_id($renglon["idcategoria"]);
				$categoria->set_nombre(utf8_encode($renglon["nombre"]));//arreglar esto de utf8encode
				$categoria->set_padre($renglon["idpadre"]);	
				$result2 = $manager->query('SELECT * FROM categoria WHERE idpadre='.$categoria->get_id());
				$cantidad_resultados = mysql_num_rows($result2);
				while ($renglon2 = mysql_fetch_assoc($result2)) {
					$subcategoria = new Categoria;
					$subcategoria->set_id($renglon2["idcategoria"]);
					$subcategoria->set_nombre(utf8_encode($renglon2["nombre"]));//arreglar esto de utf8encode
					$subcategoria->set_padre($renglon2["idpadre"]);	
					$arr[$categoria->get_nombre()][]=$subcategoria;
				}
			}
		}
		return $arr;
	}	
	public function categorias_relacionadas($manager,$categoria){
		$result = $manager->query('SELECT * FROM categoria WHERE nombre="'.$categoria.'"');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			if ($renglon["idpadre"]==NULL){
				$id_padre=$renglon["idcategoria"];				
			} else {
				$id_padre=$renglon["idpadre"];
				$result = $manager->query('SELECT * FROM categoria WHERE idcategoria="'.$id_padre.'"');
				$cantidad_resultados = mysql_num_rows($result);
				if ($cantidad_resultados>0){
					$renglon = mysql_fetch_assoc($result);
				}	
			}		
			$categoria = new Categoria;
			$categoria->set_id($renglon["idcategoria"]);
			$categoria->set_nombre($renglon["nombre"]);
			$categoria->set_padre($renglon["idpadre"]);
			$arr[]=$categoria;//agrege el padre a los resultados
			$result = $manager->query('SELECT * FROM categoria WHERE idpadre="'.$id_padre.'"');
			$cantidad_resultados = mysql_num_rows($result);
			if ($cantidad_resultados>0){
				while ($renglon = mysql_fetch_assoc($result)) {
					$categoria = new Categoria;
					$categoria->set_id($renglon["idcategoria"]);
					$categoria->set_nombre($renglon["nombre"]);
					$categoria->set_padre($renglon["idpadre"]);
					$arr[]=$categoria;
				}
			}
		}
		return $arr;
	}
	public function cantidad_clasificados($manager,$ubicacion){
		//tengo que filtrar por ubicacion, debo considerar si es argentina, una provincia o un minicipio
		$result = $manager->query('SELECT * FROM categoria WHERE ISNULL(idpadre)');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			while ($renglon = mysql_fetch_assoc($result)) {
				$categoria = new Categoria;
				$categoria->set_id($renglon["idcategoria"]);
				$categoria->set_nombre($renglon["nombre"]);
				$categoria->set_padre($renglon["idpadre"]);	
				$result2 = $manager->query('
				SELECT count(1) FROM clasificado
				WHERE idcategoria IN (
					SELECT idcategoria 
        			FROM categoria
        			WHERE idpadre = '.$categoria->get_id().'        
				)'				
				);
				$arr[$categoria->get_nombre()]=mysql_result($result2,0);	
			}
		}
		return $arr;
	}
	public function listar_clasificados($manager, $categoria, $ubicacion){
		//tengo que filtrar por ubicacion, debo considerar si es argentina, una provincia o un minicipio
		$result = $manager->query('SELECT * FROM categoria WHERE nombre="'.$categoria.'"');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			if ($renglon["idpadre"]==NULL){	
				$result = $manager->query('
					SELECT * FROM clasificado cla
					INNER JOIN categoria cat
					ON cat.idcategoria=cla.idcategoria
					WHERE cat.idpadre="'.$renglon["idcategoria"].'"					
					LIMIT 10
					');		
			} else { //si seleccione una categoria que tiene hijos
				$result = $manager->query('
					SELECT * FROM clasificado cla
					INNER JOIN categoria cat
					ON cat.idcategoria=cla.idcategoria
					WHERE cat.nombre="'.$categoria.'"
					LIMIT 10
				');			
			}
			$cantidad_resultados = mysql_num_rows($result);
			if ($cantidad_resultados>0){
				while ($renglon = mysql_fetch_assoc($result)) {
					$clasificado = new Clasificado;
					$clasificado->set_id($renglon["idclasificado"]);
					//$clasificado->set_id_ciudad($renglon["idciudad"]);
					$clasificado->set_titulo($renglon["titulo"]);
					$clasificado->set_detalle($renglon["detalle"]);
					//$clasificado->set_id_categoria($renglon["idcategoria"]);
					//$clasificado->set_contacto($renglon["contacto"]);
					$clasificado->set_fecha($renglon["fecha"]);
					$arr[]=$clasificado;
				}
			}
		}
		return $arr;		
	}
	public function clasificado($manager,$id){
		$result = $manager->query('SELECT * FROM clasificado WHERE idclasificado='.$id);
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			$clasificado = new Clasificado;
			$clasificado->set_id($renglon["idclasificado"]);
			$clasificado->set_id_ciudad($renglon["idciudad"]);
			$clasificado->set_titulo($renglon["titulo"]);
			$clasificado->set_detalle($renglon["detalle"]);
			$clasificado->set_id_categoria($renglon["idcategoria"]);
			$clasificado->set_contacto($renglon["contacto"]);
			$clasificado->set_fecha($renglon["fecha"]);		
		}
		return $clasificado;
	}
	public function cargar_consulta($arr){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$cliente = new Cliente();
		$cliente->set_nombre($arr["nombre"]);
		$cliente->set_email($arr["email"]);
		$cliente->set_dni($arr["dni"]);
		$cliente->set_direccion($arr["direccion"]);
		$result = $manager->query('SELECT idcliente FROM cliente WHERE email="'.$cliente->get_email().'"');		
		if ($aux = mysql_fetch_assoc($result)){
			$cliente->set_id($aux["idcliente"]);
		}
		else{
			$manager->query('INSERT INTO cliente (nombre, email, dni, direccion)
							VALUES ('.
							'"'.$cliente->get_nombre().'",'.
							'"'.$cliente->get_email().'",'.
							'"'.$cliente->get_dni().'",'.
							'"'.$cliente->get_direccion().'"'.
							')');
			$result = $manager->query('SELECT idcliente FROM cliente WHERE email="'.$cliente->get_email().'"');
			$aux = mysql_fetch_assoc($result);	
			$cliente->set_id($aux["idcliente"]);
		}
		$consulta = new Consulta();
		$consulta->set_id_cliente($cliente->get_id());
		$consulta->set_detalle($arr["consulta"]);
		$consulta->set_asunto("Consulta desde www.estudioargeri.com.ar");
		$manager->query('INSERT INTO consulta (idcliente, detalle, asunto)
							VALUES ('.
							'"'.$consulta->get_id_cliente().'",'.
							'"'.$consulta->get_detalle().'",'.
							'"'.$consulta->get_asunto().'"'.
							')');
		$manager->liberar_resultados();//me tira warning si el cliente ya existe pero lo carga igual
		$manager->cerrar_conexion();
	}
	public function validar_login($user, $pass){
		$valido=false;
		$manager = new Mannagerdb;
		$manager->conectarse();
		$result = $manager->query('SELECT nombre, password FROM administrador');
		$aux = mysql_fetch_assoc($result);
		$administrador = new Administrador;
		$administrador->set_nombre($aux["nombre"]);
		$administrador->set_password($aux["password"]);
		if (($user==$administrador->get_nombre()) && ($pass==$administrador->get_password())){
			$valido=true;
			}		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
		return $valido;
	}
	public function cargar_novedad($novedad){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('INSERT INTO novedad (titulo, detalle)
							VALUES ('.
							'"'.$novedad->get_titulo().'",'.
							'"'.$novedad->get_detalle().'"'.
							')');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function modificar_novedad($novedad){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('UPDATE novedad SET 
			titulo = "'.$novedad->get_titulo().'",
			detalle = "'.$novedad->get_detalle().'"
			WHERE idnovedad="'.$novedad->get_id().'"
							');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}	
	public function eliminar_novedad($novedad){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('DELETE FROM novedad WHERE idnovedad="'.$novedad->get_id().'"');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function agregar_abogado($abogado){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('INSERT INTO abogado (nombre, email, detalle)
							VALUES ('.
							'"'.$abogado->get_nombre().'",'.
							'"'.$abogado->get_email().'",'.
							'"'.$abogado->get_detalle().'"'.
							')');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function modificar_abogado($abogado){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('UPDATE abogado SET 
			nombre = "'.$abogado->get_nombre().'",
			email = "'.$abogado->get_email().'",
			detalle = "'.$abogado->get_detalle().'"
			WHERE idabogado="'.$abogado->get_id().'"
							');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function eliminar_abogado($abogado){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('DELETE FROM abogado WHERE idabogado="'.$abogado->get_id().'"');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function agregar_link($link){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('INSERT INTO link (titulo, descripcion, link)
							VALUES ('.
							'"'.$link->get_titulo().'",'.
							'"'.$link->get_descripcion().'",'.
							'"'.$link->get_link().'"'.
							')');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function modificar_link($link){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('UPDATE link SET 
			titulo = "'.$link->get_titulo().'",
			descripcion = "'.$link->get_descripcion().'",
			link = "'.$link->get_link().'"
			WHERE idlink="'.$link->get_id().'"
							');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function eliminar_link($link){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('DELETE FROM link WHERE idlink="'.$link->get_id().'"');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}
	public function actualizar_datos_postales($datos){
		$manager = new Mannagerdb;
		$manager->conectarse();
		$manager->query('UPDATE administrador SET 
			telefono = "'.$datos->get_telefono().'",
			direccion =	"'.$datos->get_direccion().'",
			email = "'.$datos->get_email().'"
							');		
		$manager->liberar_resultados();
		$manager->cerrar_conexion();
	}	
}
?>