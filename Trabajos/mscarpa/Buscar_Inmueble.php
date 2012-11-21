
<?php
	require_once 'HTML/Template/Sigma.php';
	include_once 'config.php';
	include_once 'DataObjects/Tipo.php';

	//incluyo sigma
	$template = new HTML_Template_Sigma('.');
	$error=$template->loadTemplateFile("/templates/buscar_prop.html");
	include_once 'comun.php';

	$tipo = new tipo;
	$tipo->find();
	while ($tipo->fetch()) {
		$template->setVariable('tipo', $tipo->Tipo);
		$template->parse("tipo_prop");
	}
	$template->show();
?>
