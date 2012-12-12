<?php
require_once 'config.php';
require_once 'DataObjects/Clasificado.php';
require_once 'DataObjects/Ciudad.php';
require_once 'DataObjects/Provincia.php';
require_once 'DataObjects/Categoria.php';

require_once 'includes/funciones.php';

require_once 'HTML/Template/Sigma.php';

$id = $_GET["id"];
$clasificado=new DO_Clasificado();
$clasificado->idclasificado=$id;
$clasificado->find();
$clasificado->fetch();

if (isset($_POST["enviar"])){
	mail($clasificado->contacto,"consulta desde Yastay clasificados",$_POST["consulta"]);
	//si todo salio bien lo llevo al clasificado ampliado
	header("Location:amplia.php?id=$id_clasificado");
}

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/head.html");
$tpl->setVariable('title', $clasificado->titulo);
$tpl->setVariable('description', "");
$tpl->parse('encabezados');
$tpl->show();

//logica ubicacion
$ciudad=new DO_Ciudad();
$ciudad->id=$clasificado->idciudad;
$ciudad->find();
$ciudad->fetch();

$provincia=new DO_Provincia();
$provincia->id=$ciudad->provincia_id;
$provincia->find();
$provincia->fetch();

$provincia_actual=$provincia->provincia_nombre;
//fin logica ubicacion

//logica categoria
$categoria=new DO_Categoria();
$categoria->idcategoria=$clasificado->idcategoria;
$categoria->find();
$categoria->fetch();

$subcategoria=new DO_Categoria();
$subcategoria->idcategoria=$clasificado->idsubcategoria;
$subcategoria->find();
$subcategoria->fetch();
//fin logica categoria

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/header.html");
$tpl->setVariable('titulo', "Anuncios clasificados gratis en ".$ciudad->ciudad_nombre);
$tpl->setVariable('provincia', $provincia->provincia_nombre);
$tpl->setVariable('ciudad', $ciudad->ciudad_nombre);
$tpl->setVariable('categoria', $categoria->nombre);
$tpl->setVariable('subcategoria', $subcategoria->nombre);
$tpl->parse('header');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/navegacion.html");

$link_provincia="index.php?provincia=".url_amigable($provincia->provincia_nombre);
$tpl->setVariable('provincia', capitalizar($provincia->provincia_nombre));
$tpl->setVariable('link_provincia', $link_provincia);
$tpl->parse('navegacion_provincia');

$link_ciudad="index.php?provincia=".url_amigable($provincia->provincia_nombre)."&amp;ciudad=".url_amigable($ciudad->ciudad_nombre);
$tpl->setVariable('ciudad', capitalizar($ciudad->ciudad_nombre));
$tpl->setVariable('link_ciudad', $link_ciudad);
$tpl->parse('navegacion_ciudad');

$link_categoria="categorias.php?categoria=".url_amigable($categoria->nombre)."&amp;provincia=".url_amigable($provincia->provincia_nombre)."&amp;ciudad=".url_amigable($ciudad->ciudad_nombre);
$tpl->setVariable('link_categoria', $link_categoria);
$tpl->setVariable('categoria', $categoria->nombre);
$tpl->setVariable('ubicacion', capitalizar($ciudad->ciudad_nombre));
$tpl->parse('navegacion_categoria');

$link_subcategoria="categorias.php?categoria=".url_amigable($categoria->nombre)."&amp;subcategoria=".$subcategoria->nombre."&amp;provincia=".url_amigable($provincia->provincia_nombre)."&amp;ciudad=".url_amigable($ciudad->ciudad_nombre);
$tpl->setVariable('link_subcategoria', $link_subcategoria);
$tpl->setVariable('subcategoria', $subcategoria->nombre);
$tpl->setVariable('ubicacion', capitalizar($ciudad->ciudad_nombre));
$tpl->parse('navegacion_subcategoria');

$tpl->parse('navegacion');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/amplia.html");
$tpl->setVariable('titulo_clasificado', $clasificado->titulo);
$tpl->setVariable('detalle_clasificado', $clasificado->detalle);
for ($i=1;$i<=3;$i++){
	if (existe_thumbnail($clasificado->idclasificado,$i)){
		$link_img="imgs/clasificados/".$clasificado->idclasificado."_$i.jpg";
		$link_img_thumb="imgs/clasificados/thumbnails/".$clasificado->idclasificado."_$i.jpg";
		$tpl->setVariable('link_clasificado_img', $link_img);
		$tpl->setVariable('link_clasificado_thumb', $link_img_thumb);
		$tpl->parse('imagenes_clasificado');
		//esto lo hace para el 3ro solamente o sea la ultima imagen (error)
	}
}

$tpl->parse('clasificado');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();
?>