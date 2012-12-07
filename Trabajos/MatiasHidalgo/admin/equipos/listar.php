<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Equipos.php';

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();

if(isset($_SESSION['admin'])){
	// Creo el objeto
	$equipo = new DO_Equipos;

	// Obtengo todas las filas de la base de datos
	$cant = $equipo->find();

	// Si la cantidad de filas eliminadas es igual a 1, el proceso de eliminacion se dio correctamente
	if($cant>=1){
		$error=$tpl->loadTemplateFile("../../templates/admin/equipos/listar.html");
		
		
		while($equipo->fetch()){
			$tpl->setVariable('tipo', $equipo->tipo);
			$tpl->setVariable('modelo', $equipo->modelo);
			$tpl->setVariable('marca', $equipo->marca);
			$tpl->setVariable('nro_serie', $equipo->nro_serie);
			$tpl->setVariable('adquiridoen', $equipo->adquiridoen);
			$tpl->setVariable('nrofactura', $equipo->nrofactura);
			$tpl->setVariable('fechacompra', $equipo->fechacompra);
			$tpl->setVariable('modificar', $equipo->id_equipo);
			$tpl->setVariable('borrar', $equipo->id_equipo);
			$tpl->parse('equipo');
		}
		
		$tpl->setVariable('titulo','Nuestros Equipos');
	} else {
		$error=$tpl->loadTemplateFile("../../templates/error.html");
		$tpl->setVariable('titulo','Error: Error al Listar');
		$tpl->setVariable('error','La busqueda no devolvio resultados.');
		$tpl->setVariable('anterior','/admin/equipos/listar.php');
		$tpl->parse('Error');
	}
} else {
	$error=$tpl->loadTemplateFile("../../templates/error.html");
	$tpl->setVariable('titulo','Error: Acceso Denegado');
	$tpl->setVariable('error','Intento ingresar a una pagina invalida');
	$tpl->setVariable('anterior','index.php');
	$tpl->parse('Error');
}

$tpl->parse('Cabecera');

$tpl->show();
?>