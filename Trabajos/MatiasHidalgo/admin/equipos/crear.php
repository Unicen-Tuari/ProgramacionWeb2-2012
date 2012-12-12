<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
require_once('Image/Transform.php');
require_once '../../DataObjects/Equipos.php';
require_once '../../DataObjects/Equipos_so.php';
require_once '../../DataObjects/Service_oficial.php';
require_once '../../DataObjects/Imagenes_equipos.php';

require_once 'HTML/Template/Sigma.php';
$tpl = new HTML_Template_Sigma('.');

session_start();
if(isset($_SESSION['admin'])){
	if(isset($_POST['new'])){
		// Creo el objeto y le cargo los datos del objeto que se desea eliminar
		$equipo = new DO_Equipos;

		$equipo->tipo = $_POST['tipo']; 
		$equipo->modelo = $_POST['modelo'];
		$equipo->marca = $_POST['marca'];
		$equipo->nro_serie = $_POST['nro_serie'];
		
		if(isset($_POST['adquiridoen'])){
			$equipo->adquiridoen = $_POST['adquiridoen'];
		} else {
			$equipo->adquiridoen = "Desconocido";
		}

		if(isset($_POST['nrofactura'])){
			$equipo->nrofactura = $_POST['nrofactura'];
		}

		if(isset($_POST['fechacompra'])){
			$equipo->fechacompra = $_POST['fechacompra'];
		}

		// Lo elimino y obtengo la cantidad de filas eliminadas en el proceso
		$id = $equipo->insert();
		
		$cant = $equipo->get($id);
		
		$cantFotos= $_POST['fotos'];
		
		for ($i=0; $i<$cantFotos ; $i++) {
			$ruta_servidor = "img/uploads";
			$rutaTemp = $_FILES ['foto'.$i]['tmp_name'];
			$nombreImagen = uniqid().'.jpg';
			$rutadestino = '../../'.$ruta_servidor.'/'.$nombreImagen;
			move_uploaded_file($rutaTemp, $rutadestino);
			
			$origen = '../../'. $ruta_servidor . '/' . $nombreImagen;
			$destino = '../../'. $ruta_servidor . '/miniaturas/' . $nombreImagen;
			//copy($origen, $destino);
			
			$it = Image_Transform::factory();
			$it->load($origen);
			$it->scaleByLength(200);
			$it->save($destino); 
			
			$foto = new DO_Imagenes_equipos;
			$foto->direccion_web=$ruta_servidor.'/'.$nombreImagen;;
			$foto->nombre=$nombreImagen;
			$foto->id_equipo=$id;
			$foto->insert();
		}
		
		// Si se cargo un registro de Service oficial
		if($_POST['equipo_so']!=0){
			// Recupero el service oficial seleccionado
			$serviceOficial = new DO_Service_oficial;
			$serviceOficial->nombre = $_POST['serviceO_name'];
			$serviceOficial->find();
			$serviceOficial->fetch();
			
			$equipo_so = new DO_Equipos_so;
			$equipo_so->id_equipo = $id;
			$equipo_so->id_serviceo = $serviceOficial->id_serviceo;
			$equipo_so->cod_id_so = $_POST['cod_id_so'];
			$equipo_so->fecha_pedido = $_POST['fecha_pedido'];
			$equipo_so->fecha_respuesta = $_POST['fecha_respuesta'];
			$equipo_so->estado = $_POST['estado'];
			
			$equipo_so->insert();
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
			$error=$tpl->loadTemplateFile("../../templates/admin/error.html");
			$tpl->setVariable('titulo','Error: Error al crear');
			$tpl->setVariable('error','La creacion devolvio un valor invalido.');
			$tpl->setVariable('anterior','../Equipos.php');
			$tpl->parse('Error');
		}
	} else {
		$error=$tpl->loadTemplateFile("../../templates/admin/equipos/crear.html");
		
		// Recupero todos los service oficiales para listarlos
		$serviceOficiales = new DO_Service_oficial;
		
		$cant = $serviceOficiales->find();
		$services = ' ';
		
		if ($cant>0) {
			while ($serviceOficiales->fetch()) {
				$services .= '<option>';
				$services .= $serviceOficiales->nombre;
				$services .= '</option>';
			};
		} else {
			$services = '<option>Ninguno</option>';
		}
		
		$tpl->setVariable('serviceOficiales',$services);
		
		$tpl->parse('serviceOficial');
		// Llenar variable serviceOficiales con los options y nombres de cada service oficial registrado 
		$tpl->setVariable('titulo','Gestor para crear Equipos');
	}
} else {
	$error=$tpl->loadTemplateFile("../../templates/admin/error.html");
	$tpl->setVariable('titulo','Error: Acceso Denegado');
	$tpl->setVariable('error','Intento ingresar a una pagina invalida');
	$tpl->setVariable('anterior','/index.php');
	$tpl->parse('Error');
}

$tpl->parse('Cabecera');

$tpl->show();
?>