<?php
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
				$renglon["provincia_nombre"]=utf8_encode($renglon["provincia_nombre"]);//arreglar esto de utf8encode
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
				$renglon["ciudad_nombre"]=utf8_encode(capitalizar($renglon["ciudad_nombre"]));//arreglar esto de utf8encode
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
				$renglon["nombre"]=utf8_encode($renglon["nombre"]);//arreglar esto de utf8encode
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
				$renglon["nombre"]=utf8_encode($renglon["nombre"]);//arreglar esto de utf8encode
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
				$renglon["nombre"]=utf8_encode($renglon["nombre"]);//arreglar esto de utf8encode
				$categoria->set_nombre($renglon["nombre"]);
				$categoria->set_padre($renglon["idpadre"]);
				$result2 = $manager->query('SELECT * FROM categoria WHERE idpadre='.$categoria->get_id());
				$cantidad_resultados = mysql_num_rows($result2);
				while ($renglon2 = mysql_fetch_assoc($result2)) {
					$subcategoria = new Categoria;
					$subcategoria->set_id($renglon2["idcategoria"]);
					$renglon2["nombre"]=utf8_encode($renglon2["nombre"]);//arreglar esto de utf8encode
					$subcategoria->set_nombre($renglon2["nombre"]);
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
			$renglon["nombre"]=utf8_encode($renglon["nombre"]);//arreglar esto de utf8encode
			$categoria->set_nombre($renglon["nombre"]);
			$categoria->set_padre($renglon["idpadre"]);
			$arr[]=$categoria;//agrege el padre a los resultados
			$result = $manager->query('SELECT * FROM categoria WHERE idpadre="'.$id_padre.'" ORDER BY nombre');
			$cantidad_resultados = mysql_num_rows($result);
			if ($cantidad_resultados>0){
				while ($renglon = mysql_fetch_assoc($result)) {
					$categoria = new Categoria;
					$categoria->set_id($renglon["idcategoria"]);
					$renglon["nombre"]=utf8_encode($renglon["nombre"]);//arreglar esto de utf8encode
					$categoria->set_nombre($renglon["nombre"]);
					$categoria->set_padre($renglon["idpadre"]);
					$arr[]=$categoria;
				}
			}
		}
		return $arr;
	}
	public function cantidad_clasificados($manager,$nombre_categoria,$ubicacion){
		$nombre_categoria=utf8_decode($nombre_categoria);
		$result = $manager->query('SELECT * FROM categoria WHERE nombre="'.$nombre_categoria.'"');
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			$categoria = new Categoria;
			$categoria->set_id($renglon["idcategoria"]);
			$renglon["nombre"]=utf8_encode($renglon["nombre"]);//arreglar esto de utf8encode
			$categoria->set_nombre($renglon["nombre"]);
			$categoria->set_padre($renglon["idpadre"]);
				
			$filtro_ubicacion="";
			if ($ubicacion["municipio"]!=""){
				//si filtro por municipio
				$filtro_ubicacion = 'AND idciudad='.$ubicacion["municipio"]->get_id();
			} else {
				if ($ubicacion["provincia"]!=""){
					// si filtro por provincia
					$filtro_ubicacion = 'AND idciudad
					IN (
					SELECT id
					FROM ciudad
					WHERE provincia_id='.$ubicacion["provincia"]->get_id().'
					)';
				}
			}
			if (!$categoria->get_padre()){
				//si es una categoria padre pregunto por la suma de todas sus subcategorias
				$result2 = $manager->query('
						SELECT count(1) FROM clasificado
						WHERE idcategoria IN (
						SELECT idcategoria
						FROM categoria
						WHERE idpadre='.$categoria->get_id().'
				)
						'.$filtro_ubicacion.'
						');
			} else { //si no es padre pregunto directamente la cantidad
				$result2 = $manager->query('
						SELECT count(1) FROM clasificado
						WHERE idcategoria='.$categoria->get_id().'
						'.$filtro_ubicacion
				);
			}
			return mysql_result($result2,0);
		}
	}
	public function listar_clasificados($manager, $categoria, $ubicacion){
		//tengo que filtrar por ubicacion, debo considerar si es argentina, una provincia o un minicipio
		if(is_numeric($categoria)) {
			$result = $manager->query('SELECT * FROM categoria WHERE idcategoria='.$categoria);
		} else {
			$result = $manager->query('SELECT * FROM categoria WHERE nombre="'.$categoria.'"');
		}
		$filtro_ubicacion="";
		if ($ubicacion["municipio"]!=""){
			//si filtro por municipio
			$filtro_ubicacion = 'AND idciudad='.$ubicacion["municipio"]->get_id();
		} else {
			if ($ubicacion["provincia"]!=""){
				// si filtro por provincia
				$filtro_ubicacion = 'AND idciudad
				IN (
				SELECT id
				FROM ciudad
				WHERE provincia_id='.$ubicacion["provincia"]->get_id().'
				)';
			}
		}

		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			if ($renglon["idpadre"]==NULL){
				$result = $manager->query('
						SELECT * FROM clasificado cla
						INNER JOIN categoria cat
						ON cat.idcategoria=cla.idcategoria
						WHERE cat.idpadre="'.$renglon["idcategoria"].'"
						'.$filtro_ubicacion.'
						LIMIT 50
						');
			} else { //si seleccione una categoria que tiene hijos
				$result = $manager->query('
						SELECT * FROM clasificado cla
						INNER JOIN categoria cat
						ON cat.idcategoria=cla.idcategoria
						WHERE cat.nombre="'.$categoria.'"
						'.$filtro_ubicacion.'
						LIMIT 50
						');
			}
			$cantidad_resultados = mysql_num_rows($result);
			if ($cantidad_resultados>0){
				while ($renglon = mysql_fetch_assoc($result)) {
					$clasificado = new Clasificado;
					$clasificado->set_id($renglon["idclasificado"]);
					if ($renglon["moneda"]=="pesos")
						$clasificado->set_moneda("$");
					else
						$clasificado->set_moneda('U$S');
					$clasificado->set_id_ciudad($renglon["idciudad"]);
					$clasificado->set_titulo($renglon["titulo"]);
					$clasificado->set_detalle($renglon["detalle"]);
					$clasificado->set_id_categoria($renglon["idcategoria"]);
					$clasificado->set_contacto($renglon["contacto"]);
					$clasificado->set_fecha($renglon["fecha"]);
					$clasificado->set_precio($renglon["precio"]);
					$clasificado->set_telefono($renglon["telefono"]);
					$nombre_categoria = utf8_encode($renglon["nombre"]);
					$clasificado->set_nombre_categoria($nombre_categoria);
					$nombre_municipio = $manager->municipio($manager,$renglon["idciudad"])->get_nombre();
					$clasificado->set_nombre_municipio($nombre_municipio);
					$arr[]=$clasificado;
				}
			}
		}
		return $arr;
	}
	public function proximo_id_clasificado($manager){
		$result = $manager->query('SELECT LAST_INSERT_ID(idclasificado) +1 AS proximo FROM clasificado ORDER BY idclasificado DESC LIMIT 1');
		$renglon = mysql_fetch_assoc($result);
		return $renglon["proximo"];
	}	
	public function clasificado($manager,$id){
		$result = $manager->query('SELECT * FROM clasificado WHERE idclasificado='.$id);
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			$clasificado = new Clasificado;
			$clasificado->set_id($renglon["idclasificado"]);
			$clasificado->set_moneda($renglon["moneda"]);
			$clasificado->set_id_ciudad($renglon["idciudad"]);
			$clasificado->set_titulo($renglon["titulo"]);
			$clasificado->set_detalle($renglon["detalle"]);
			$clasificado->set_precio($renglon["precio"]);
			$clasificado->set_telefono($renglon["telefono"]);
			$clasificado->set_id_categoria($renglon["idcategoria"]);
			$clasificado->set_contacto($renglon["contacto"]);
			$clasificado->set_fecha($renglon["fecha"]);
		}
		return $clasificado;
	}
	//retorna el objeto municipio, se le puede pasar el id o el nombre del municipio
	public function municipio($manager,$municipio){
		if(is_numeric($municipio)) {
			$result = $manager->query('SELECT * FROM ciudad WHERE id='.$municipio);
		} else {
			$result = $manager->query('SELECT * FROM ciudad WHERE ciudad_nombre="'.$municipio.'"');
		}
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			$municipio = new Municipio;
			$municipio->set_id($renglon["id"]);
			$municipio->set_nombre(utf8_encode(capitalizar($renglon["ciudad_nombre"])));
			$municipio->set_cp($renglon["cp"]);
			$municipio->set_id_padre($renglon["provincia_id"]);
		}
		return $municipio;
	}
	//retorna el objeto provincia, se le puede pasar el id o el nombre de la provincia
	public function provincia($manager,$provincia){
		if(is_numeric($provincia)) {
			$result = $manager->query('SELECT * FROM provincia WHERE id='.$provincia);
		} else {
			$result = $manager->query('SELECT * FROM provincia WHERE provincia_nombre="'.$provincia.'"');
		}
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			$provincia = new Provincia();
			$provincia->set_id($renglon["id"]);
			$provincia->set_nombre(utf8_encode(capitalizar($renglon["provincia_nombre"])));
		}
		return $provincia;
	}
	public function provincia_y_municipio($manager,$ubicacion){
		$arr=array(
				"provincia"=>"",
				"municipio"=>""
		);
		//si no defini una ubicacion
		if (($ubicacion != "") and ($ubicacion != "argentina")){
			$ubicacion=utf8_decode($ubicacion);//solucionar estos parches
			//si tengo una ubicacion que es una provincia
			$result = $manager->query('SELECT id FROM provincia WHERE provincia_nombre="'.$ubicacion.'"');
			$cantidad_resultados = mysql_num_rows($result);
			if ($cantidad_resultados>0){
				$arr["provincia"] = $manager->provincia($manager,$ubicacion);
			} else {
				//si tengo un municipio
				$result = $manager->query('SELECT id FROM ciudad WHERE ciudad_nombre="'.$ubicacion.'"');
				$cantidad_resultados = mysql_num_rows($result);
				if ($cantidad_resultados>0){
					$municipio = $manager->municipio($manager,$ubicacion);
					$arr["municipio"]=$municipio;
					$arr["provincia"]=$manager->provincia($manager,$municipio->get_id_padre());
				}
			}

		}
		return $arr;
	}
	public function categoria($manager,$categoria){
		if(is_numeric($categoria)) {
			$result = $manager->query('SELECT * FROM categoria WHERE idcategoria='.$categoria);
		} else {
			$result = $manager->query('SELECT * FROM categoria WHERE nombre="'.$categoria.'"');
		}
		$cantidad_resultados = mysql_num_rows($result);
		if ($cantidad_resultados>0){
			$renglon = mysql_fetch_assoc($result);
			$categoria = new Categoria;
			$categoria->set_id($renglon["idcategoria"]);
			$renglon["nombre"]=utf8_encode($renglon["nombre"]);//arreglar esto de utf8encode
			$categoria->set_nombre($renglon["nombre"]);
			$categoria->set_padre($renglon["idpadre"]);
		}
		return $categoria;
	}
	public function agregar_clasificado($manager,$clasificado){
		$manager->query('INSERT INTO clasificado (idciudad, moneda, titulo, detalle, idcategoria, contacto, precio, telefono)
				VALUES ('.
				'"'.$clasificado->get_id_ciudad().'",'.
				'"'.$clasificado->get_moneda().'",'.
				'"'.$clasificado->get_titulo().'",'.
				'"'.$clasificado->get_detalle().'",'.
				'"'.$clasificado->get_id_categoria().'",'.
				'"'.$clasificado->get_contacto().'",'.
				'"'.$clasificado->get_precio().'",'.
				'"'.$clasificado->get_telefono().'"'.
				')');
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
}
?>