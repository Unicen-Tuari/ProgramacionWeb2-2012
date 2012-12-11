<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Equipos.php';
require_once '../../DataObjects/Imagenes_equipos.php';

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();

if(isset($_SESSION['admin'])){
	if(isset($_POST['search'])){
		// Creo el objeto
		$equipo = new DO_Equipos;

		/* Lo cargo con los criterios obtenidos.... implementar a futuro
		foreach($criterios as $key => $value){
			$equipo->$key = $value;
		}*/
		if($_POST['tipo']!=''){
			$equipo->tipo = $_POST['tipo'];
		}
		if($_POST['modelo']!=''){
			$equipo->modelo = $_POST['modelo'];
		}
		if($_POST['marca']!=''){
			$equipo->marca = $_POST['marca'];
		}
		if($_POST['nro_serie']!=''){
			$equipo->nro_serie = $_POST['nro_serie'];
		}
		if($_POST['adquiridoen']!=''){
			$equipo->nro_serie = $_POST['adquiridoen'];
		}
		if($_POST['nrofactura']!=''){
			$equipo->nro_serie = $_POST['nrofactura'];
		}
		if($_POST['fechacompra']!=''){
			$equipo->nro_serie = $_POST['fechacompra'];
		}
		// Le doy un orden
		if(isset($_POST['orden'])){
			$equipo->orderBy($_POST['orden']);
		}
		// Busco todas las ocurrencias con esos criterios y ordenados por orden
		$cant = $equipo->find();

		if($cant>=1){
			$error=$tpl->loadTemplateFile("../../templates/admin/equipos/listar.html");
			$tpl->setVariable('titulo','Resultado de la busqueda');
			while($equipo->fetch()){
				$tpl->setVariable('tipo', $equipo->tipo);
				$tpl->setVariable('modelo', $equipo->modelo);
				$tpl->setVariable('marca', $equipo->marca);
				$tpl->setVariable('nro_serie', $equipo->nro_serie);
				$tpl->setVariable('adquiridoen', $equipo->adquiridoen);
				$tpl->setVariable('nrofactura', $equipo->nrofactura);
				$tpl->setVariable('fechacompra', $equipo->fechacompra);
				$tpl->setVariable('modificar', $equipo->id);
				$tpl->setVariable('borrar', $equipo->id);
				$tpl->parse('equipo');
			}
		} else {
			$error=$tpl->loadTemplateFile("../../templates/error.html");
			$tpl->setVariable('titulo','Error: Error al buscar');
			$tpl->setVariable('error','La busqueda no devolvio ningun resultado.');
			$tpl->setVariable('anterior','/admin/equipos/listar.php');
			$tpl->parse('Error');
		}
	} else {
		$error=$tpl->loadTemplateFile("../../templates/admin/equipos/buscar.html");
		$tpl->setVariable('titulo','Gestor de Busquedas');
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