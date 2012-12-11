<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Equipos.php';
require_once '../../DataObjects/Imagenes_equipos.php';

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();

if(isset($_SESSION['admin'])){
	if(isset($_POST['change'])){
		// Creo el objeto y le cargo los datos originales del objeto que se desea modificar
		$equipo = new DO_Equipos;
		$equipo->get($_GET['id']);

		// Cargo los datos nuevos
		if(isset($_POST['tipo'])){
			$equipo->tipo = $_POST['tipo'];
		}
		if(isset($_POST['modelo'])){
			$equipo->modelo = $_POST['modelo'];
		}
		if(isset($_POST['marca'])){
			$equipo->marca = $_POST['marca'];
		}
		if(isset($_POST['nro_serie'])){
			$equipo->nro_serie = $_POST['nro_serie'];
		}
		
		if(isset($_POST['adquiridoen'])){
			$equipo->adquiridoen = $_POST['adquiridoen'];
		}
		
		if(isset($_POST['nrofactura'])){
			$equipo->nrofactura = $_POST['nrofactura'];
		}
		
		if(isset($_POST['fechacompra'])){
			$equipo->fechacompra = $_POST['fechacompra'];
		}
		
		// Subo los cambios a la base de datos
		$cant = $equipo->update();

		// Si la cantidad de filas modificadas es igual a 1, el proceso de modificacion se dio correctamente
		if($cant==1){ // ANTE UN VALOR ESPERADO SE MUESTRAN LOS CAMBIOS AL USUARIO
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
		} else { // ANTE UN VALOR INVALIDO DEVUELTO POR EL UPDATE SE ADVIERTE AL USUARIO
			$error=$tpl->loadTemplateFile("../../templates/error.html");
			$tpl->setVariable('titulo','Error: Error al actualizar');
			$tpl->setVariable('error','La actualizacion devolvio un valor invalido.');
			$tpl->setVariable('anterior','/admin/equipos/listar.php');
			$tpl->parse('Error');
		}
	} else if(isset($_GET['id'])) {
		
		$error=$tpl->loadTemplateFile("../../templates/admin/equipos/modificar.html");
		// Creo el objeto y le cargo los datos originales del objeto que se desea modificar
		$equipo = new DO_Equipos;
		$equipo->get($_GET['id']);
		// Cargo todos los inputs con los datos existentes
		$tpl->setVariable('id', $equipo->id_equipo);
		$tpl->setVariable('tipo', $equipo->tipo);
		$tpl->setVariable('modelo', $equipo->modelo);
		$tpl->setVariable('marca', $equipo->marca);
		$tpl->setVariable('nro_serie', $equipo->nro_serie);
		$tpl->setVariable('adquiridoen', $equipo->adquiridoen);
		$tpl->setVariable('nrofactura', $equipo->nrofactura);
		$tpl->setVariable('fechacompra', $equipo->fechacompra);
		
		$tpl->parse('update');
		
		
		
		// Cargo todas las imagenes existentes
		$imagenes = new DO_Imagenes_equipos;
		$imagenes->id_equipo = $equipo->id_equipo;
		$cant = $imagenes->find();
		while($imagenes->fetch()){
			$html = '
			<div class="single">
				<a href="../../'.$imagenes->direccion_web.'" rel="lightbox['.$equipo->id_equipo.']" title="Foto">
					<img src="../../img/uploads/miniaturas/'.$imagenes->nombre.'" width="200" height="200" alt="Taller: Foto '.$imagenes->nombre.'">
				</a>
			</div>';
			$tpl->setVariable('foto', $html);
			$tpl->parse('foto');
		}
		if ($cant>0) {
			$tpl->parse('fotos');
			$tpl->setVariable('id', $equipo->id_equipo);
			$tpl->parse('borrar');
		}
		
		$tpl->setVariable('cantidadOriginal', $cant);
		$tpl->setVariable('cantidad', $cant);
		
		$tpl->parse('cantFotos');
				
		$tpl->setVariable('titulo','Gestion para actualizar datos de Equipos');
	} else {
		$error=$tpl->loadTemplateFile("../../templates/error.html");
		$tpl->setVariable('titulo','Error: Acceso Denegado');
		$tpl->setVariable('error','Intento ingresar a una pagina invalida');
		$tpl->setVariable('anterior','index.php');
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