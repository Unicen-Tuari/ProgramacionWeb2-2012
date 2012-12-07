<?php
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Consultas.php';

// Creo el objeto y le cargo los datos originales del objeto que se desea modificar
$consulta = new DO_Consultas;
$consulta->get($nueva->id);

// Cargo los datos nuevos
$consulta->nombre = $nueva->nombre;
$consulta->apellido = $nueva->apellido;
$consulta->tipo_doc = $nueva->tipo_doc;
$consulta->num_doc = $nueva->num_doc;
$consulta->email = $nueva->email;
$consulta->consulta = $nueva->consulta;

// Subo los cambios a la base de datos
$cant = $consulta->update();

// Si la cantidad de filas modificadas es igual a 1, el proceso de modificacion se dio correctamente
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