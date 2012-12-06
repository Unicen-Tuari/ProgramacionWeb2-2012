<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
//require_once('Image/Transform.php');
require_once '../../DataObjects/Equipos.php';
require_once '../../DataObjects/Imagenes_equipos.php';

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();
if(isset($_SESSION['admin'])){
	if(isset($_GET['new'])){
		// Creo el objeto y le cargo los datos del objeto que se desea eliminar
		$equipo = new DO_Equipos;

		$equipo->tipo = $_GET['tipo']; 
		$equipo->modelo = $_GET['modelo'];
		$equipo->marca = $_GET['marca'];
		$equipo->marca = $_GET['nro_serie'];
		
		if(isset($_GET['adquiridoen'])){
			$equipo->adquiridoen = $_GET['adquiridoen'];
		} else {
			$equipo->adquiridoen = "Desconocido";
		}

		if(isset($_GET['nro_factura'])){
			$equipo->nro_factura = $_GET['nro_factura'];
		}

		if(isset($_GET['fechacompra'])){
			$equipo->fechacompra = $_GET['fechacompra'];
		}

		// Lo elimino y obtengo la cantidad de filas eliminadas en el proceso
		$id = $equipo->insert();
		
		$cant = $equipo->get($id);
		
		for ($i=1; $i<=3 ; $i++) {
			$ruta_servidor = "img/uploads";
			$rutaTemp = $_FILES ['foto'.$i]['tmp_name'];
			$nombreImagen = uniqid().'.jpg';
			$rutadestino = $ruta_servidor.'/'.$nombreImagen;
			move_uploaded_file($rutaTemp, $rutadestino);
			
			/* $origen = '/'. $ruta_servidor . '/' . $nombreImagen;
			$destino = '/'. $ruta_servidor . '/miniaturas/' . $nombreImagen;
			//copy($origen, $destino);
			
			$it = Image_Transform::factory();
			$it->load($origen);
			$it->scaleByLength(150);
			$it->save($destino); */
			
			$foto = new DO_Imagenes_equipos;
			$foto->direccion_web=$rutadestino;
			$foto->nombre=$nombreImagen;
			$foto->id_equipo=$id;
			$foto->insert();
		}
		
		// Si la cantidad de filas eliminadas es igual a 1, el proceso de eliminacion se dio correctamente
		if($cant==1){
			$error=$tpl->loadTemplateFile("../../templates/admin/equipos/listar.html");
			$tpl->setVariable('titulo','Equipo creado Correctamente');
			
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
		} else {
			$error=$tpl->loadTemplateFile("../../templates/error.html");
			$tpl->setVariable('titulo','Error: Error al crear');
			$tpl->setVariable('error','La creacion devolvio un valor invalido.');
			$tpl->setVariable('anterior','/admin/equipos/listar.php');
			$tpl->parse('Error');
		}
	} else {
		$error=$tpl->loadTemplateFile("../../templates/admin/equipos/crear.html");
		$tpl->setVariable('titulo','Gestor para crear Equipos');	
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