<?php 

	 	include_once 'config.php';
		include_once 'DataObjects/Foto.php';
		include_once 'DataObjects/Propiedad.php';
		include_once 'DataObjects/Tipo.php';
		require_once 'HTML/Template/Sigma.php';

		//incluyo sigma
		$template = new HTML_Template_Sigma('.');
		$error=$template->loadTemplateFile("/templates/propiedad.html");
		include_once 'comun.php';

		$desde = ($_POST['desde']);
		$hasta = ($_POST['hasta']);
		$tipo_post = ($_POST['tipo']);

		//DB_DataObject::debugLevel(5);
		$propiedad = new propiedad;
		$propiedad->whereAdd('Valor >= '.$desde);
		
		if($hasta == "Sin Limite"){
			echo ("");
		}else{
			$propiedad->whereAdd('Valor <= '.$hasta);
	    }

		$tipo = new tipo;
		$tipo->Tipo = $tipo_post;
		

		$propiedad->joinAdd($tipo);
		$propiedad->selectAs(); //cambia los nombre en el join
		//$propiedad->selectAs($tipo, 'tipo_%s');

		$propiedad->find();	
		while ($propiedad->fetch()) {
			$template->setVariable('valor', number_format($propiedad->Valor));
			$template->setVariable('titulo', $propiedad->Titulo);
			$template->setVariable('descripcion', $propiedad->Descripcion);
			$template->setVariable('id_prop', $propiedad->ID);
			$template->parse("propiedad");
		}
		if(!$propiedad->ID){
			$template->setVariable('claseNotificacion', "warning");
			$template->setVariable('mensajeNotificacion', "No hay publicaciones que coincidan con tu busqueda.");
			$template->setVariable('descripcionNotificacion', "");	
		}
		$template->show();

?>
