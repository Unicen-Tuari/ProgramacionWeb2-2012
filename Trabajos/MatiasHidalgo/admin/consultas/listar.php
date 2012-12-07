<?php
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Consultas.php';

// Creo el objeto
$consulta = new DO_Consultas;

// Obtengo todas las filas de la base de datos
$consulta->find();


// Si la cantidad de filas eliminadas es igual a 1, el proceso de eliminacion se dio correctamente
if($cant==1){
	$error=$tpl->loadTemplateFile("/templates/consultas/listar.html");
	$tpl->setVariable('titulo','Consultas');
} else {
	$error=$tpl->loadTemplateFile("/templates/error.html");
	$tpl->setVariable('titulo','Error: Error al eliminar');
	$tpl->setVariable('error','La eliminacion devolvio un valor invalido.');
	$tpl->setVariable('anterior','index.php');
	$tpl->parse('Error');
}

$tpl->parse('Cabecera');

$tpl->show();
?>