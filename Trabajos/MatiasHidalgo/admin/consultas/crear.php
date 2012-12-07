<?php
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Consultas.php';

// Creo el objeto y le cargo los datos del objeto que se desea eliminar
$consulta = new DO_Consultas;
$consulta->get($_SESSION[id]); 

// Lo elimino y obtengo la cantidad de filas eliminadas en el proceso
$cant = $consulta->delete();

// Si la cantidad de filas eliminadas es igual a 1, el proceso de eliminacion se dio correctamente
if($cant==1){
	$error=$tpl->loadTemplateFile("/templates/consultas/borrar.html");
	$tpl->setVariable('titulo','Consulta eliminada Correctamente');
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