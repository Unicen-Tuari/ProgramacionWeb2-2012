<?php 
		include_once 'config.php';
		include_once 'DataObjects/Foto.php';
		include_once 'DataObjects/Propiedad.php';
		include_once 'DataObjects/Tipo.php';
		require_once 'HTML/Template/Sigma.php';

		//incluyo sigma
		$template = new HTML_Template_Sigma('.');
		$error=$template->loadTemplateFile("/templates/Index.html");
		include_once 'comun.php';

		//DB_DataObject::debugLevel(5);


		$propiedad = new propiedad;
		$propiedad->orderBy('ID DESC');
		$propiedad->limit(6);
		$propiedad->selectAs();
		
		$propiedad->find();
		while ($propiedad->fetch()) {			
			$template->setVariable('valor', number_format($propiedad->Valor));
			$template->setVariable('titulo', $propiedad->Titulo);
			$template->setVariable('id_prop', $propiedad->ID);
			$template->parse("propiedad");
		}
		$template->show();
?>
