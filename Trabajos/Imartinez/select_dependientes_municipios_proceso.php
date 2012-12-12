<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
	"provincia"=>"provincia",
	"municipio"=>"ciudad"
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
	require_once 'DataObjects/Ciudad.php';
	
	require_once 'includes/funciones.php';
	
	require_once 'HTML/Template/Sigma.php';	
	
	$municipio=new DO_Ciudad();
	$municipio->provincia_id=$opcionSeleccionada;
	$municipio->find();

	$tpl = new HTML_Template_Sigma('.');
	$error=$tpl->loadTemplateFile("/templates/select_dependientes_municipios_proceso.html");
	$tpl->setVariable('selectDestino', $selectDestino);
	while($municipio->fetch()){
		$tpl->setVariable('municipio_id', $municipio->id);
		$tpl->setVariable('municipio_nombre', $municipio->ciudad_nombre);
		$tpl->parse('municipio');
	}
	$tpl->parse('dependientes_municipio');
	$tpl->show();
}
?>