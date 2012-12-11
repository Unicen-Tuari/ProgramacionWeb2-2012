<?php 
/*
require_once 'DataObjects/Ciudad.php';
require_once 'DataObjects/Provincia.php';
require_once 'DataObjects/Categoria.php';

function provincia_y_municipio($ubicacion){
	$arr=array(
			"provincia"=>"",
			"municipio"=>""
	);
	//si no defini una ubicacion
	if (($ubicacion != "") and ($ubicacion != "argentina")){
		//$ubicacion=utf8_decode($ubicacion);//solucionar estos parches
		
		//si tengo una ubicacion que es una provincia
		$prov = new DO_Provincia();
		$prov->provincia_nombre=$ubicacion;	
		if ($prov->find())
			$prov->fetch();
			$arr["provincia"]=$prov;
		
		//si tengo una ciudad
		$ciud = new DO_Ciudad();
		$ciud->ciudad_nombre=$ubicacion;
		if ($ciud->find()){
			$ciud->fetch();
			$arr["municipio"]=$ciud;
			$prov->id=$ciud->provincia_id;
			$prov->fetch();
			$arr["provincia"]=$prov;
			}
			
	}
	return $arr;
} 

function ubicacion_para_mostrar($ubicacion,$provincia_y_municipio){	
	if ($provincia_y_municipio["municipio"]!="")
		$ubicacion = $provincia_y_municipio["municipio"]->ciudad_nombre;
	else
		if ($provincia_y_municipio["provincia"]!="")
		$ubicacion = $provincia_y_municipio["provincia"]->provincia_nombre;
	else
		$ubicacion = "Argentina";
	$ubicacion=utf8_encode(ucwords(strtolower($ubicacion)));
	return $ubicacion;
}

function cantidad_clasificados($nombre_categoria,$ubicacion){
	
	return 1;
	/*
	$cat=new DO_Categoria;
	$cat->nombre=$nombre_categoria;
	$cat->find();
	$cat->fetch();
	
	if ($ubicacion["municipio"]!=""){
			//si filtro por municipio
			$ciudad=new DO_Ciudad();
			$ciudad->ciudad_nombre=$ubicacion["municipio"];
			$ciudad->find();
			
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
		*/
/*
}
	
function categorias_relacionadas($categoria_para_mostrar){
	$arr=array();
	$categoria=new DO_Categoria();
	if(is_numeric($categoria)) {
		$categoria->idcategoria=$categoria_para_mostrar;
	} else {
		$categoria->nombre=$categoria_para_mostrar;
	}
	$categoria->find();
	$categoria->fetch();
	if ($categoria->idpadre==0)
		$id_categoria_padre=$categoria->idcategoria;
	else{
		$id_categoria_padre=$categoria->idpadre;
	}
	$categoria_padre=new DO_Categoria();
	$categoria_padre->idcategoria=$id_categoria_padre;
	$categoria_padre->find();
	$categoria_padre->fetch();	
	$arr[]=$categoria_padre;//agrege el padre a los resultados
	$subcategoria=new DO_Categoria();
	$subcategoria->idpadre=$categoria_padre->idcategoria;
	$subcategoria->find();
	while ($subcategoria->fetch()){
		//echo $subcategoria->nombre;//porque no anda esto?
		$arr[]=$subcategoria;//agrego las subcategorias
		//$arr[]=$subcategoria->nombre;//agrego las subcategorias
	}
	return $arr;
}
*/
?>