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

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/head.html");
$tpl->setVariable('title', "Anuncios clasificados gratis en $ubicacion");
$tpl->setVariable('description', "");
$tpl->parse('encabezados');
$tpl->show();

$categoria="";
$subcategoria="";
if (isset($_GET["categoria"]))
	$categoria=$_GET["categoria"];
if (isset($_GET["subcategoria"]))
	$subcategoria = $_GET["subcategoria"];

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/header.html");
$tpl->setVariable('titulo', "Anuncios clasificados gratis en $ubicacion");
$tpl->setVariable('ubicacion', $ubicacion);
$tpl->setVariable('categoria', $categoria);
$tpl->setVariable('subcategoria', $subcategoria);
$tpl->parse('header');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/navegacion.html");
if ($provincia_y_municipio["provincia"]!=""){
	$provincia=$provincia_y_municipio["provincia"]->provincia_nombre;
	$link_provincia="index.php?ubicacion=".url_amigable($provincia);
	$tpl->setVariable('provincia', capitalizar($provincia));
	$tpl->setVariable('link_provincia', $link_provincia);
	$tpl->parse('navegacion_provincia');
}
if ($provincia_y_municipio["municipio"]!=""){
	$ciudad=$provincia_y_municipio["municipio"]->ciudad_nombre;
	$link_ciudad="index.php?ubicacion=".url_amigable($ciudad);
	$tpl->setVariable('ciudad', capitalizar($ciudad));
	$tpl->setVariable('link_ciudad', $link_ciudad);
	$tpl->parse('navegacion_ciudad');
}
$link_categoria="categorias.php?categoria=".url_amigable($categoria."&amp;ubicacion=".$ubicacion);
$tpl->setVariable('link_categoria', $link_categoria);
$tpl->setVariable('categoria', $categoria);
$tpl->setVariable('ubicacion', $ubicacion);
$tpl->parse('navegacion_categoria');

if ($subcategoria!=""){
	$link_subcategoria="categorias.php?categoria=".url_amigable($categoria."&amp;subcategoria=".$subcategoria."&amp;ubicacion=".$ubicacion);
	$tpl->setVariable('link_subcategoria', $link_subcategoria);
	$tpl->setVariable('subcategoria', $subcategoria);
	$tpl->setVariable('ubicacion', $ubicacion);
	$tpl->parse('navegacion_subcategoria');
}

$tpl->parse('navegacion');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/categorias.html");
if ($subcategoria==""){
	$tpl->setVariable('nombre_categoria', capitalizar($categoria));
	$tpl->parse('categorias_relacionadas_current');
} else {
	$link_categoria="categorias.php?".url_amigable("categoria=".$categoria."&amp;ubicacion=".$ubicacion);
	$tpl->setVariable('link_categoria', $link_categoria);
	$tpl->setVariable('nombre_categoria_comun', capitalizar($categoria));
	$tpl->parse('categorias_relacionadas_comun');
}
//termine el primero

$categoria_aux=new DO_Categoria();
$categora_aux->nombre=$categoria;
$categoria_aux->find();
$categoria_aux->fetch();
$subcategoria_aux=new DO_Categoria();
$subcategoria_aux->idpadre=$categoria_aux->idcategoria;
$subcategoria_aux->find();
while ($subcategoria_aux->fetch()){
	//por cada subcategoria
	if (normalizar($subcategoria_aux->nombre)==$subcategoria){
		$tpl->setVariable('nombre_categoria', $subcategoria_aux->nombre);
		$tpl->parse('categorias_relacionadas_current');
	} else {
		$link_categoria="categorias.php?".url_amigable("categoria=".$categoria_aux->nombre."&amp;subcategoria=".$subcategoria_aux->nombre."&amp;ubicacion=".$ubicacion);
		$tpl->setVariable('link_categoria', $link_categoria);
		$tpl->setVariable('nombre_categoria_comun', $subcategoria_aux->nombre);
		$tpl->parse('categorias_relacionadas_comun');
	}
}
$tpl->parse('categorias_relacionadas');

$provincia=new DO_Provincia();
$provincia->find();
$link_onchange="location.href='categorias.php?categoria=$categoria&amp;subcategoria=$subcategoria&amp;ubicacion='+(this.value)";
$tpl->setVariable('link_onchange', $link_onchange);
while ($provincia->fetch()){
	$tpl->setVariable('nombre_provincia', utf8_encode($provincia->provincia_nombre));
	if (($provincia_y_municipio["provincia"]!="") && ($provincia->id==$provincia_y_municipio["provincia"]->id))
		$tpl->parse('ubicacion_provincia_selected');
	else
		$tpl->parse('ubicacion_provincia');
}
if ($provincia_y_municipio["provincia"]!=""){
	$ciudad=new DO_Ciudad();
	$ciudad->provincia_id=$provincia_y_municipio["provincia"]->id;
	$ciudad->find();
	while ($ciudad->fetch()){
		$tpl->setVariable('nombre_municipio', capitalizar(utf8_encode($ciudad->ciudad_nombre)));
		if (($provincia_y_municipio["municipio"]!="") && ($ciudad->id==$provincia_y_municipio["municipio"]->id))
				$tpl->parse('ubicacion_municipio_selected');
		else
			$tpl->parse('ubicacion_municipio');
	}
}
$tpl->parse('ubicacion');

//lista de clasificados
$cantidad_clasificados=1;
$tpl->setVariable('cantidad_clasificados', $cantidad_clasificados);
if ($subcategoria=="")
	$categoria_actual=$categoria;
else 
	$categoria_actual=$subcategoria;
$tpl->setVariable('categoria', $categoria_actual);
$tpl->setVariable('ubicacion', $ubicacion);

$clasificado=new DO_Clasificado();
//como hago grupos de cosas? onda todos los clasificados de una categoria?
//lo mismo para las provincias
//ahora traigo todos
$clasificado->find();
while ($clasificado->fetch()){
	$precio="";
	if ($clasificado->precio!="")
		$precio="$clasificado->moneda $clasificado->precio";
	$tpl->setVariable('precio', $precio);
	$link_clasificado="amplia.php?id=$clasificado->idclasificado";
	if (existe_thumbnail($clasificado->idclasificado,1)){
		$tpl->setVariable('link_clasificado_thumb', $link_clasificado);
		$link_img="imgs/clasificados/thumbnails/$clasificado->idclasificado"."_1.jpg";
		$tpl->setVariable('link_img_clasificado', $link_img);
		$tpl->parse('thumbnail_clasificado');		
	}
	$tpl->setVariable('link_clasificado', $link_clasificado);
	$tpl->setVariable('clasificado_titulo', $clasificado->titulo);
	$tpl->setVariable('clasificado_detalle', $clasificado->detalle);
	$categoria_aux=new DO_Categoria();
	$categoria_aux->idcategoria=$clasificado->idcategoria;
	$categoria_aux->find();
	$categoria_aux->fetch();
	$tpl->setVariable('clasificado_categoria', utf8_encode($categoria_aux->nombre));
	$municipio_aux=new DO_Ciudad();
	$municipio_aux->id=$clasificado->idciudad;
	$municipio_aux->find();
	$municipio_aux->fetch();
	$tpl->setVariable('clasificado_ubicacion', capitalizar($municipio_aux->ciudad_nombre));
	$tpl->setVariable('clasificado_fecha', $clasificado->fecha);
	$tpl->parse('lista_clasificados');
}

$tpl->parse('clasificados');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();
?>