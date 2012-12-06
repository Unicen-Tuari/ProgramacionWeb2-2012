<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Equipos.php';

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();

if(isset($_SESSION['admin'])){
	if(isset($_GET['change'])){
		// Creo el objeto y le cargo los datos originales del objeto que se desea modificar
		$equipo = new DO_Equipos;
		$equipo->get($_GET['id']);

		// Cargo los datos nuevos
		if(isset($_GET['tipo'])){
			$equipo->tipo = $_GET['tipo'];
		}
		if(isset($_GET['modelo'])){
			$equipo->modelo = $_GET['modelo'];
		}
		if(isset($_GET['marca'])){
			$equipo->marca = $_GET['marca'];
		}
		if(isset($_GET['nro_serie'])){
			$equipo->nro_serie = $_GET['nro_serie'];
		}
		
		if(isset($_GET['adquiridoen'])){
			$equipo->adquiridoen = $_GET['adquiridoen'];
		}
		
		if(isset($_GET['nro_factura'])){
			$equipo->nro_factura = $_GET['nro_factura'];
		}
		
		if(isset($_GET['fechacompra'])){
			$equipo->fechacompra = $_GET['fechacompra'];
		}
		
		// Subo los cambios a la base de datos
		$cant = $equipo->update();

		// Si la cantidad de filas modificadas es igual a 1, el proceso de modificacion se dio correctamente
		if($cant==1){
			$error=$tpl->loadTemplateFile("../../templates/admin/equipos/listar.html");
			$tpl->setVariable('titulo','Equipo actualizado Correctamente');
			
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
		} else {
			$error=$tpl->loadTemplateFile("../../templates/error.html");
			$tpl->setVariable('titulo','Error: Error al actualizar');
			$tpl->setVariable('error','La actualizacion devolvio un valor invalido.');
			$tpl->setVariable('anterior','/admin/equipos/listar.php');
			$tpl->parse('Error');
		}
	} else {
		$error=$tpl->loadTemplateFile("../../templates/admin/equipos/modificar.html");
		$tpl->setVariable('titulo','Gestion para actualizar datos de Equipos');
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