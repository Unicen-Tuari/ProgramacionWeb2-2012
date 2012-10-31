<?php
require_once 'config.php';
require_once 'DataObjects/Comentario.php';
require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
$error=$tpl->loadTemplateFile("/templates/comentarios.html");

$comentario = new Comentario;
$comentario->orderby("ID DESC");
$filas = $comentario->find();
while ($comentario->fetch())
{
        $tpl->setVariable('texto',$comentario->Comentario);
        $tpl->setVariable('nombre',$comentario->Nombre);
		$tpl->setVariable('fecha',$comentario->Fecha);
		$tpl->setVariable('id_comentario',$comentario->ID);
		$tpl->parse('Comentario');
}

if(isset($_GET["delete"])){
		$tpl->setVariable('tipomensaje',"label-success");
		$tpl->setVariable('textomensaje', "El comentario ".$_GET["delete"]." se borró correctamente.");

}

if(isset($_GET["id"])){
	if($_GET["id"] > 0 )
	{
		$tpl->setVariable('tipomensaje',"label-success");
		$tpl->setVariable('textomensaje', "El comentario se insertó correctamente.");
	}
	else
	{
		$tpl->setVariable('tipomensaje',"label-warning");
		$tpl->setVariable('textomensaje', "Hubo un error al insertar el comentario. Por favor intente mas tarde.");
	}
	$tpl->parse('Mensaje');
}
$tpl->show();
?>
