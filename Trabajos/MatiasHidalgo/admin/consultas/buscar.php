<?php
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Consultas.php';

($criterios,$orden){
// Creo el objeto
$consulta = new DO_Consultas;

// Lo cargo con los criterios obtenidos
foreach($criterios as $key => $value){
	$consulta->$key = $value;
}
// Le doy un orden
$consulta->orderBy($orden);
// Busco todas las ocurrencias con esos criterios y ordenados por orden
$consulta->find();

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