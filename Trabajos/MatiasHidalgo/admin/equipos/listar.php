<?php
require_once ('../../config.php');
require_once 'DB/DataObject.php';
require_once '../../DataObjects/Equipos.php';
require_once '../../DataObjects/Imagenes_equipos.php';

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
			
			$imagenes = new DO_Imagenes_equipos;
			$imagenes->id_equipo = $equipo->id_equipo;
			$cant = $imagenes->find();
			$mostradas = 0;
			while($imagenes->fetch()){
				if($mostradas>=3){ 
					$mostrar = 'style="display:none"'; 
				} else {
					$mostrar = '';
				}
				$html = '
				<div class="single" '. $mostrar .'>
					<a href="../../'.$imagenes->direccion_web.'" rel="lightbox['.$equipo->id_equipo.']" title="Foto">
						<img src="../../img/uploads/miniaturas/'.$imagenes->nombre.'" width="200" height="200" alt="Taller: Foto '.$imagenes->nombre.'">
					</a>
				</div>';
				$tpl->setVariable('foto', $html);
				$tpl->parse('foto');
				$mostradas++;
			}
			//if ($cant>0) {
				$tpl->parse('fotos');
			//}
			
			$tpl->parse('equipo');
		}
		
		$tpl->setVariable('titulo','Nuestros Equipos');
	} else {
		$error=$tpl->loadTemplateFile("../../templates/admin/error.html");
		$tpl->setVariable('titulo','Error: Error al Listar');
		$tpl->setVariable('error','La busqueda no devolvio resultados.');
		$tpl->setVariable('anterior','../Equipos.php');
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