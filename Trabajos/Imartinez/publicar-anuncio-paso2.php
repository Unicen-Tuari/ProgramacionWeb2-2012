<?php 
require_once 'config.php';
require_once 'DataObjects/Ciudad.php';
require_once 'DataObjects/Provincia.php';
require_once 'DataObjects/Categoria.php';
require_once 'DataObjects/Clasificado.php';

require_once 'includes/funciones.php';

require_once 'HTML/Template/Sigma.php';

$id_categoria = $_POST["categoria"];
$id_subcategoria = $_POST["subcategoria"];
$id_provincia = $_POST["provincia"];
$id_municipio = $_POST["municipio"];

if (isset($_POST["enviar-paso2"])){
	$clasificado = new DO_Clasificado();
	
	$clasificado->titulo=$_POST["titulo"];
	$clasificado->detalle=$_POST["detalle"];	
	$clasificado->idciudad=$id_municipio;
	$clasificado->idprovincia=$id_provincia;
	$clasificado->idcategoria=$id_categoria;
	$clasificado->idsubcategoria=$id_subcategoria;
	$clasificado->contacto=$_POST["email"];
	$clasificado->precio=$_POST["precio"];
	$clasificado->moneda=$_POST["moneda"];
	$clasificado->telefono=$_POST["telefono"];
	$id_clasificado=$clasificado->insert();
	if ($id_clasificado!=""){
		if ($_FILES["foto1"]["name"]!=""){
			generar_archivos_imagenes($_FILES['foto1']['tmp_name'],$id_clasificado,1);
		}
		if ($_FILES["foto2"]["name"]!=""){
			generar_archivos_imagenes($_FILES['foto2']['tmp_name'],$id_clasificado,2);
		}
		if ($_FILES["foto3"]["name"]!=""){
			generar_archivos_imagenes($_FILES['foto3']['tmp_name'],$id_clasificado,3);
		}
		mail($clasificado->contacto,"alta de clasificado en Yastay","Su clasificado ha sido dado de alta satisfactoriamente.");
		//si todo salio bien lo llevo al clasificado ampliado
		header("Location:amplia.php?id=$id_clasificado");
	}
}

$ciudad=new DO_Ciudad();
$ciudad->id=$id_municipio;
$ciudad->find();
$ciudad->fetch();
$ubicacion=capitalizar($ciudad->ciudad_nombre);

$provincia=new DO_Provincia();
$provincia->id=$id_provincia;
$provincia->find();
$provincia->fetch();

$categoria=new DO_Categoria();
$categoria->idcategoria=$id_categoria;
$categoria->find();
$categoria->fetch();

$subcategoria=new DO_Categoria();
$subcategoria->idcategoria=$id_subcategoria;
$subcategoria->find();
$subcategoria->fetch();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/head.html");
$tpl->setVariable('title', "Yastay - Cargar clasificado - Paso 2");
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
$error=$tpl->loadTemplateFile("/templates/publicar-anuncio-paso2.html");
$tpl->setVariable('nombre_subcategoria', $subcategoria->nombre);
$tpl->setVariable('nombre_municipio', capitalizar($ciudad->ciudad_nombre));
$tpl->setVariable('nombre_provincia', $provincia->provincia_nombre);
$link_cambiar="publicar-anuncio-paso1.php?categoria=$id_categoria
&amp;subcategoria=$id_subcategoria
&amp;ubicacion=$ubicacion";
$tpl->setVariable('link_cambiar', $link_cambiar);
$tpl->setVariable('id_categoria', $id_categoria);
$tpl->setVariable('id_subcategoria', $id_subcategoria);
$tpl->setVariable('id_provincia', $id_provincia);
$tpl->setVariable('id_municipio', $id_municipio);
$tpl->parse('paso2');
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();
?>