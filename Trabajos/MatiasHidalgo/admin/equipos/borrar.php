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
		
		// Lo elimino y obtengo la cantidad de filas eliminadas en el proceso
		$cant = $equipo->delete();

		// Si la cantidad de filas eliminadas es igual a 1, el proceso de eliminacion se dio correctamente
		if($cant==1){
			$error=$tpl->loadTemplateFile("../../templates/admin/equipos/borrar.html");
			$tpl->setVariable('titulo','Equipo eliminado Correctamente');
		} else {
			$error=$tpl->loadTemplateFile("../../templates/error.html");
			$tpl->setVariable('titulo','Error: Error al eliminar');
			$tpl->setVariable('error','La eliminacion devolvio un valor invalido. Probablemente el ID de equipo que intenta eliminar no es valido');
			$tpl->setVariable('anterior','/admin/equipos/listar.php');
			$tpl->parse('Error');
		}
	} else {
		$error=$tpl->loadTemplateFile("../../templates/error.html");
		$tpl->setVariable('titulo','Error: Error, ID desconocido');
		$tpl->setVariable('error','No se pudo eliminar ya que no se proporciono un ID.');
		$tpl->setVariable('anterior','/admin/equipos/listar.php');
		$tpl->parse('Error');
	}
} else {
	$error=$tpl->loadTemplateFile("../../templates/error.html");
	$tpl->setVariable('titulo','Error: Acceso Denegado');
	$tpl->setVariable('error','Intento ingresar a una pagina invalida');
	$tpl->setVariable('anterior','/index.php');
	$tpl->parse('Error');
}
$tpl->parse('Cabecera');

$tpl->show();
?>