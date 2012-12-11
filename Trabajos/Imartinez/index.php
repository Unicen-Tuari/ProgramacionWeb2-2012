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
$tpl->setVariable('provincia', $provincia->provincia_nombre);
$tpl->setVariable('ciudad', $ciudad->ciudad_nombre);
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
		$url_amigable="index.php?provincia=".url_amigable(utf8_encode($prov->provincia_nombre));
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
	$url_amigable="categorias.php?categoria=".url_amigable($cat->nombre."&amp;provincia=".$provincia->provincia_nombre."&amp;ciudad=".$ciudad->ciudad_nombre);
	$tpl->setVariable('link_categoria', $url_amigable);
	$subcat=new DO_Categoria();
	$subcat->idpadre=$cat->idcategoria;
	$subcat->find();
	while ($subcat->fetch()){
		$tpl->setVariable('nombre_subcategoria', utf8_encode($subcat->nombre));
		$url_amigable="categorias.php?categoria=".url_amigable($cat->nombre."&amp;subcategoria=".$subcat->nombre."&amp;provincia=".$provincia->provincia_nombre."&amp;ciudad=".$ciudad->ciudad_nombre);
		$tpl->setVariable('link_subcategoria', $url_amigable);
		$tpl->parse('subcategorias');
	}
	$clasificado=new DO_Clasificado();
	$clasificado->idcategoria=$cat->idcategoria;
	$cantidad_clasificados=$clasificado->count();
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