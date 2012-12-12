<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Equipos.php';
require_once '../../DataObjects/Imagenes_equipos.php';

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();
if(isset($_SESSION['admin'])){
	if(isset($_GET['id'])){
		// Creo el objeto y le cargo los datos del objeto que se desea eliminar
		$equipo = new DO_Equipos;
		$equipo->get($_GET['id']);
		
		$imagenes = new DO_Imagenes_equipos;
		$imagenes->id_equipo = $equipo->id_equipo;
		$imagenes->find();
		
		while($imagenes->fetch()){
			unlink('../../'.$imagenes->direccion_web);
			unlink('../../img/uploads/miniaturas/'.$imagenes->nombre);
			$imagenes->delete();
		}
		
		$error=$tpl->loadTemplateFile("../../templates/admin/equipos/listar.html");
		
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
		
		$tpl->setVariable('titulo','Fotos eliminadas Correctamente');
	} else {
		$error=$tpl->loadTemplateFile("../../templates/admin/error.html");
		$tpl->setVariable('titulo','Error: Error, ID desconocido');
		$tpl->setVariable('error','No se pudo eliminar ya que no se proporciono un ID.');
		$tpl->setVariable('anterior','listar.php');
		$tpl->parse('Error');
	}
} else {
	$error=$tpl->loadTemplateFile("../../templates/admin/error.html");
	$tpl->setVariable('titulo','Error: Acceso Denegado');
	$tpl->setVariable('error','Intento ingresar a una pagina invalida');
	$tpl->setVariable('anterior','listar.php');
	$tpl->parse('Error');
}
$tpl->parse('Cabecera');

$tpl->show();
?>