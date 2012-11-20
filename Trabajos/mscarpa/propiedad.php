<?php 
		include_once 'config.php';
		include_once 'DataObjects/Foto.php';
		include_once 'DataObjects/Propiedad.php';
		include_once 'DataObjects/Tipo.php';
		require_once 'HTML/Template/Sigma.php';

		$id_inmueble=$_GET["id"];

		//incluyo sigma
		$template = new HTML_Template_Sigma('.');
		$error=$template->loadTemplateFile("/templates/mostrar_propiedad.html");
		include_once 'comun.php';
		
		//echo $id_inmueble;
		//DB_DataObject::debugLevel(5);
		$propiedad = new propiedad;
		$propiedad->ID = $id_inmueble;
		

		//$foto = new foto;
		//$foto->get($foto->PROP_FK);
		$foto = new foto;
		$foto->PROP_FK = $id_inmueble;
		$foto->find();
	
		while ($foto->fetch()) {
		$fotos[]=$foto->URL;
		}

		$propiedad->find();
		while ($propiedad->fetch()) {
			$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
			$template->setVariable('valor', number_format($propiedad->Valor));
			$template->setVariable('titulo', $propiedad->Titulo);
			$template->setVariable('descripcion', $propiedad->Descripcion);
			$template->setVariable('foto_URL1', $fotos[0]);
			$template->setVariable('foto_URL2', $fotos[1]);
			$template->setVariable('foto_URL3', $fotos[2]);
			$template->setVariable('url_actual', $url_actual);
			$template->parse("propiedad");
		}
		$template->show();

?>







