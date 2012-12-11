<?php 
require_once 'config.php';
require_once 'DataObjects/Ciudad.php';
require_once 'DataObjects/Provincia.php';
require_once 'DataObjects/Categoria.php';
require_once 'DataObjects/Clasificado.php';

require_once 'includes/funciones.php';

require_once 'HTML/Template/Sigma.php';

//logica ubicacion
$provincia=new DO_Provincia();
$ciudad=new DO_Ciudad();
$ubicacion = "Argentina";
if (isset($_GET["provincia"]) && ($_GET["provincia"]!="")){
	$ubicacion=capitalizar($_GET["provincia"]);
	$provincia->provincia_nombre=$ubicacion;
	$provincia->find();
	$provincia->fetch();
}
if (isset($_GET["ciudad"]) && ($_GET["ciudad"]!="")){
	$ubicacion=capitalizar($_GET["ciudad"]);
	$ciudad->ciudad_nombre=$ubicacion;
	$ciudad->find();
	$ciudad->fetch();
}
//fin logica ubicacion

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/head.html");
$tpl->setVariable('title', "Anuncios clasificados gratis en $ubicacion");
$tpl->setVariable('description', "");
$tpl->parse('encabezados');
$tpl->show();

$categoria=new DO_Categoria();
$categoria->nombre=$_GET["categoria"];
$categoria->find();
$categoria->fetch();
$subcategoria=new DO_Categoria();

$categoria_para_mostrar=$_GET["categoria"];
if (isset($_GET["subcategoria"]) && ($_GET["subcategoria"]!="")){
	$categoria_para_mostrar = $_GET["subcategoria"];
	$subcategoria->nombre=$_GET["subcategoria"];
	$subcategoria->find();
	$subcategoria->fetch();
}

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/header.html");
$tpl->setVariable('titulo', "Anuncios clasificados gratis en $ubicacion");
$tpl->setVariable('provincia', $provincia->provincia_nombre);
$tpl->setVariable('ciudad', $ciudad->ciudad_nombre);
$tpl->setVariable('categoria', $categoria->nombre);
$tpl->setVariable('subcategoria', $subcategoria->nombre);
$tpl->parse('header');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/navegacion.html");
if ($provincia->provincia_nombre!=""){
	$link_provincia="index.php?provincia=".url_amigable($provincia->provincia_nombre);
	$tpl->setVariable('provincia', capitalizar($provincia->provincia_nombre));
	$tpl->setVariable('link_provincia', $link_provincia);
	$tpl->parse('navegacion_provincia');
}
if ($ciudad->ciudad_nombre!=""){
	$link_ciudad="index.php?ciudad=".url_amigable($ciudad->ciudad_nombre);
	$tpl->setVariable('ciudad', capitalizar($ciudad->ciudad_nombre));
	$tpl->setVariable('link_ciudad', $link_ciudad);
	$tpl->parse('navegacion_ciudad');
}
$link_categoria="categorias.php?categoria=".url_amigable($categoria_para_mostrar."&amp;provincia=".$provincia->provincia_nombre."&amp;ciudad=".$ciudad->ciudad_nombre);
$tpl->setVariable('link_categoria', $link_categoria);
$tpl->setVariable('categoria', $categoria->nombre);
$tpl->setVariable('ubicacion', $ubicacion);
$tpl->parse('navegacion_categoria');

if ($subcategoria->nombre!=""){
	$link_subcategoria="categorias.php?categoria=".url_amigable($categoria->nombre."&amp;subcategoria=".$subcategoria->nombre."&amp;provincia=".$provincia->provincia_nombre."&amp;ciudad=".$ciudad->ciudad_nombre);
	$tpl->setVariable('link_subcategoria', $link_subcategoria);
	$tpl->setVariable('subcategoria', $subcategoria->nombre);
	$tpl->setVariable('ubicacion', $ubicacion);
	$tpl->parse('navegacion_subcategoria');
}

$tpl->parse('navegacion');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/categorias.html");
if ($subcategoria==""){
	$tpl->setVariable('nombre_categoria', capitalizar($categoria->nombre));
	$tpl->parse('categorias_relacionadas_current');
} else {
	$link_categoria="categorias.php?".url_amigable("categoria=".$categoria->nombre."&amp;provincia=".$provincia->provincia_nombre."&amp;ciudad=".$ciudad->ciudad_nombre);
	$tpl->setVariable('link_categoria', $link_categoria);
	$tpl->setVariable('nombre_categoria_comun', capitalizar($categoria->nombre));
	$tpl->parse('categorias_relacionadas_comun');
}
//termine el primero

$categoria_aux=new DO_Categoria();
$categoria_aux->idcategoria=$categoria->idcategoria;
$categoria_aux->find();
$categoria_aux->fetch();
$subcategoria_aux=new DO_Categoria();
$subcategoria_aux->idpadre=$categoria_aux->idcategoria;
$subcategoria_aux->find();
while ($subcategoria_aux->fetch()){
	//por cada subcategoria
	if (($subcategoria->nombre!="") && ($subcategoria_aux->idcategoria==$subcategoria->idcategoria)){
		$tpl->setVariable('nombre_categoria', $subcategoria_aux->nombre);
		$tpl->parse('categorias_relacionadas_current');
	} else {
		$link_categoria="categorias.php?".url_amigable("categoria=".$categoria_aux->nombre."&amp;subcategoria=".$subcategoria_aux->nombre."&amp;provincia=".$provincia->provincia_nombre."&amp;ciudad=".$ciudad->ciudad_nombre);
		$tpl->setVariable('link_categoria', $link_categoria);
		$tpl->setVariable('nombre_categoria_comun', $subcategoria_aux->nombre);
		$tpl->parse('categorias_relacionadas_comun');
	}
}
$tpl->parse('categorias_relacionadas');

$prov=new DO_Provincia();
$prov->find();
$link_onchange="location.href='categorias.php?categoria=".$categoria->nombre."&amp;subcategoria=".$subcategoria->nombre."&amp;provincia='+(this.value)";
$tpl->setVariable('link_onchange', $link_onchange);
while ($prov->fetch()){
	$tpl->setVariable('nombre_provincia', utf8_encode($prov->provincia_nombre));
	if (($provincia->provincia_nombre!="") && ($prov->id==$provincia->id))
		$tpl->parse('ubicacion_provincia_selected');
	else
		$tpl->parse('ubicacion_provincia');
}
if ($provincia->provincia_nombre!=""){
	$ciud=new DO_Ciudad();
	$ciud->provincia_id=$provincia->id;
	$ciud->find();
	$link_onchange="location.href='categorias.php?categoria=".$categoria->nombre."&amp;subcategoria=".$subcategoria->nombre."&amp;provincia=".$provincia->provincia_nombre."&amp;ciudad='+(this.value)";
	$tpl->setVariable('link_onchange_municipio', $link_onchange);
	while ($ciud->fetch()){
		$tpl->setVariable('nombre_municipio', capitalizar(utf8_encode($ciud->ciudad_nombre)));
		if (($ciudad->ciudad_nombre!="") && ($ciud->id==$ciudad->id))
			$tpl->parse('ubicacion_municipio_selected');
		else
			$tpl->parse('ubicacion_municipio');
	}
}
$tpl->parse('ubicacion');

//lista de clasificados

$tpl->setVariable('categoria', $categoria_para_mostrar);
$tpl->setVariable('ubicacion', $ubicacion);

$clasificado=new DO_Clasificado();
if ($provincia->provincia_nombre!="")
	$clasificado->idprovincia=$provincia->id;
if ($ciudad->ciudad_nombre!="")
	$clasificado->idciudad=$ciudad->id;
$clasificado->idcategoria=$categoria->idcategoria;
if ($subcategoria->nombre!="")
	$clasificado->idsubcategoria=$subcategoria->idcategoria;
$clasificado->find();
$cantidad_clasificados=$clasificado->count();

while ($clasificado->fetch()){
	$precio="";
	if ($clasificado->precio!=""){
		if ($clasificado->moneda=="pesos")
			$precio='$ '.$clasificado->precio;
		else
			$precio='u$s '.$clasificado->precio;
	}
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
	$categoria_aux->idcategoria=$clasificado->idsubcategoria;
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
$tpl->setVariable('cantidad_clasificados', $cantidad_clasificados);

$tpl->parse('clasificados');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();
?>