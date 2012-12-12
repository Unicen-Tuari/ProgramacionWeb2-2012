<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
	"categoria"=>"categoria",
	"subcategoria"=>"subcategoria"
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects[$selectDestino];
	require_once 'config.php';
	require_once 'DataObjects/Categoria.php';
	
	require_once 'includes/funciones.php';
	
	require_once 'HTML/Template/Sigma.php';

	$subcategoria=new DO_Categoria();
	$subcategoria->idpadre=$opcionSeleccionada;
	$subcategoria->find();
	
	$tpl = new HTML_Template_Sigma('.');
	$error=$tpl->loadTemplateFile("/templates/select_dependientes_subcategorias_proceso.html");
	$tpl->setVariable('selectDestino', $selectDestino);
	while($subcategoria->fetch()){
		$tpl->setVariable('subcategoria_id', $subcategoria->idcategoria);
		$tpl->setVariable('subcategoria_nombre', $subcategoria->nombre);
		$tpl->parse('subcategorias');
	}
	$tpl->parse('dependientes_subcategoria');
	$tpl->show();
}
?>