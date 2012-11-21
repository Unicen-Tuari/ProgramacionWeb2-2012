<?php 
require_once 'config.php';
require_once 'DataObjects/Ciudad.php';
require_once 'DataObjects/Provincia.php';
require_once 'DataObjects/Categoria.php';
require_once 'DataObjects/Clasificado.php';

require_once 'includes/common.php';
require_once 'includes/funciones.php';

require_once 'HTML/Template/Sigma.php';

//logica ubicacion
$ubicacion = "";
if (isset($_GET["ubicacion"]))
	$ubicacion=$_GET["ubicacion"];
$provincia_y_municipio = provincia_y_municipio($ubicacion);
$ubicacion = ubicacion_para_mostrar($ubicacion,$provincia_y_municipio);
//fin logica ubicacion
	
$categoria="";
$subcategoria="";

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/head.html");
$tpl->setVariable('title', "Anuncios clasificados gratis en $ubicacion");
$tpl->setVariable('description', "");
$tpl->parse('encabezados');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/header.html");
$tpl->setVariable('titulo', "Anuncios clasificados gratis en $ubicacion");
$tpl->setVariable('ubicacion', $ubicacion);
$tpl->setVariable('categoria', "");
$tpl->setVariable('subcategoria', "");
$tpl->parse('header');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/index.html");
//listar todas las provincias
$prov = new DO_Provincia();
$prov->find();
while ($prov->fetch()){
	if ($ubicacion == capitalizar(utf8_encode($prov->provincia_nombre))){
		$tpl->setVariable('nombre_provincia', utf8_encode($prov->provincia_nombre));
		$tpl->parse('listado_provincias_current');
	}else{
		$url_amigable="index.php?ubicacion=".url_amigable(utf8_encode($prov->provincia_nombre));
		$tpl->setVariable('nombre_provincia', utf8_encode($prov->provincia_nombre));
		$tpl->setVariable('link_provincia', $url_amigable);
		$tpl->parse('listado_provincias');
	}
}
//listar todas las categorias y subcategorias
$cat=new DO_Categoria();
$cat->idpadre=0;//las categorias tiene como padre a 0
$cat->find();
while ($cat->fetch()){
	$tpl->setVariable('nombre_categoria', utf8_encode($cat->nombre));
	$url_amigable="categorias.php?categoria=".url_amigable($cat->nombre."&amp;ubicacion=".$ubicacion);
	$tpl->setVariable('link_categoria', $url_amigable);
	$cantidad_clasificados=0;
	$subcat=new DO_Categoria();
	$subcat->idpadre=$cat->idcategoria;
	$subcat->find();
	while ($subcat->fetch()){
		$tpl->setVariable('nombre_subcategoria', utf8_encode($subcat->nombre));
		$url_amigable="categorias.php?categoria=".url_amigable($cat->nombre."&amp;subcategoria=".$subcat->nombre."&amp;ubicacion=".$ubicacion);
		$tpl->setVariable('link_subcategoria', $url_amigable);
		$tpl->parse('subcategorias');
		
		//esto se tiene que poder mejorar, ahora traigo los de todos los municipios
		//print_r($provincia_y_municipio);
		$clasificado=new DO_Clasificado();
		$clasificado->idcategoria=$subcat->idcategoria;
		/* falta el filtro de provincia y municipio
		
		if (isset($provincia_y_municipio["provincia"]->nombre)){
			echo "tiene provincia";
			if (isset($provincia_y_municipio["municipio"]->nombre)){
				echo "tiene municipio";
				$clasificado->idciudad=$provincia_y_municipio["municipio"]->id;
				echo $provincia_y_municipio["municipio"]->id;
			} else {
				$ciudad=new DO_Ciudad();
				$ciudad->provincia_id=$provincia_y_municipio["provincia"]->id;
				$ciudad->find();
				$aux_cantidad=0;
				while ($ciudad->fetch()){
					$clasificado->idciudad=$ciudad->id;
					$aux_cantidad+=$clasificado->count();
				}
			}				
		}
		*/
		$cantidad_clasificados+=$clasificado->count();
	}
	$tpl->setVariable('cantidad', $cantidad_clasificados);
	$tpl->parse('categorias');
	$subcat->free();
}
$cat->free();
//fin listar todas las categorias y subcategorias

$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();
?>