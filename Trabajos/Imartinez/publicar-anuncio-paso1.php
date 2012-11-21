<?php 
require_once 'config.php';
require_once 'DataObjects/Ciudad.php';
require_once 'DataObjects/Provincia.php';
require_once 'DataObjects/Categoria.php';
require_once 'DataObjects/Clasificado.php';

require_once 'includes/common.php';
require_once 'includes/funciones.php';

require_once 'HTML/Template/Sigma.php';

$nombre_categoria = normalizar($_GET["categoria"]);
$nombre_subcategoria = normalizar($_GET["subcategoria"]);
$ubicacion = capitalizar($_GET["ubicacion"]);

$provincia_y_municipio = provincia_y_municipio($ubicacion);

$ciudad=new DO_Ciudad();
if ($provincia_y_municipio["municipio"]!=""){
	$ciudad->id=$provincia_y_municipio["municipio"]->id;
	$ciudad->find();
	$ciudad->fetch();
}

$provincia=new DO_Provincia();
if ($provincia_y_municipio["provincia"]!=""){
	$provincia->id=$provincia_y_municipio["provincia"]->id;
	$provincia->find();
	$provincia->fetch();
}

$categoria=new DO_Categoria();
if ($nombre_categoria!=""){
	$categoria->nombre=$nombre_categoria;
	$categoria->find();
	$categoria->fetch();
}

$subcategoria=new DO_Categoria();
if ($nombre_subcategoria!=""){
	$subcategoria->nombre=$nombre_subcategoria;
	$subcategoria->find();
	$subcategoria->fetch();
}

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/head.html");
$tpl->setVariable('title', "Yastay - Cargar clasificado - Paso 1");
$tpl->setVariable('description', "");
$tpl->parse('encabezados');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/header.html");
$tpl->setVariable('titulo', "Anuncios clasificados gratis en $ubicacion");
$tpl->setVariable('ubicacion', $ubicacion);
$tpl->setVariable('categoria', $categoria->nombre);
$tpl->setVariable('subcategoria', $subcategoria->nombre);
$tpl->parse('header');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/publicar-anuncio-paso1.html");

$todas_las_provincias=new DO_Provincia();
$todas_las_provincias->find();
while ($todas_las_provincias->fetch()){
	$tpl->setVariable('id_provincia', $todas_las_provincias->id);
	$tpl->setVariable('nombre_provincia', utf8_encode($todas_las_provincias->provincia_nombre));
	if ($todas_las_provincias->id==$provincia->id){
		$tpl->parse('select_provincia_selected');
	} else {
		$tpl->parse('select_provincia_comun');
	}
	$tpl->parse('select_provincia');
}

if ($provincia_y_municipio["provincia"]!=""){
	// si no preseleccione una provincia no cargo ningun municipio
	$todas_las_ciudades=new DO_Ciudad();
	$todas_las_ciudades->provincia_id=$provincia_y_municipio["provincia"]->id;
	$todas_las_ciudades->find();
	while ($todas_las_ciudades->fetch()){
		$tpl->setVariable('id_municipio', $todas_las_ciudades->id);
		$tpl->setVariable('nombre_municipio', capitalizar(utf8_encode($todas_las_ciudades->ciudad_nombre)));
		if ($ciudad->id==$todas_las_ciudades->id){
			$tpl->parse('select_municipio_selected');
		} else {
			$tpl->parse('select_municipio_comun');
		}
		$tpl->parse('select_municipio');
	}
}

$todas_las_categorias=new DO_Categoria();
$todas_las_categorias->idpadre=0;
$todas_las_categorias->find();
while ($todas_las_categorias->fetch()){
	$tpl->setVariable('id_categoria', $todas_las_categorias->idcategoria);
	$tpl->setVariable('nombre_categoria', capitalizar(utf8_encode($todas_las_categorias->nombre)));
	if ($todas_las_categorias->idcategoria==$categoria->idcategoria){
		$tpl->parse('select_categoria_selected');
	} else {
		$tpl->parse('select_categoria_comun');
	}
	$tpl->parse('select_categoria');
}
if ($nombre_categoria!=""){
	//si no seleccione una categoria no muestro ninguna subcategoria
	$todas_las_subcategorias=new DO_Categoria();
	$todas_las_subcategorias->idpadre=$categoria->idcategoria;
	$todas_las_subcategorias->find();
	while ($todas_las_subcategorias->fetch()){
		$tpl->setVariable('id_subcategoria', $todas_las_subcategorias->idcategoria);
		$tpl->setVariable('nombre_subcategoria', capitalizar(utf8_encode($todas_las_subcategorias->nombre)));
		if ($todas_las_subcategorias->idcategoria==$subcategoria->idcategoria){
			$tpl->parse('select_subcategoria_selected');
		} else {
			$tpl->parse('select_subcategoria_comun');
		}
		$tpl->parse('select_subcategoria');
	}
}

$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();

?>