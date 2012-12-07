<?php
require_once ('config.php');
require_once('./DataObjects/Ordenes.php');
require_once('./DataObjects/Equipos.php');
require_once('./DataObjects/Usuarios.php');
$orden=new DO_Ordenes;
//$orden->nro_orden = $_POST['nroorden'];
//$cantidad = $orden->find();
//$orden->fetch();
$cantidad = $orden->get($_POST['nroorden']);
if($cantidad != 0){
	$usuario=new DO_Usuarios;
	$usuario->get($orden->id_usuario);
	$equipo=new DO_Equipos;
	$equipo->get($orden->id_equipo);
	$contrascorrecta=false;
	if ($usuario->contras==$_POST['contras']) {
		$contrascorrecta=true;
	}
}

require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');

if($cantidad == 0){
	$error=$tpl->loadTemplateFile("/templates/error.html");
	$tpl->setVariable('titulo','Error: Orden Invalida');
	$tpl->setVariable('error','La Orden nro: '.$_POST['nroorden'].' no existe');
	$tpl->setVariable('anterior','consulorden.php');
	$tpl->parse('Error');
} else if($contrascorrecta==false){	
	$error=$tpl->loadTemplateFile("/templates/error.html");
	$tpl->setVariable('titulo','Error: Contraseña Invalida');
	$tpl->setVariable('error','La contraseña no es válida');
	$tpl->setVariable('anterior','consulorden.php');
	$tpl->parse('Error');
} else {
	$error=$tpl->loadTemplateFile("/templates/orden.html");
	$tpl->setVariable('titulo','Consulta enviada con exito!');
	$tpl->setVariable('nro_orden',$orden->getnro_orden());
	$tpl->setVariable('fecha_ingreso',$orden->getfecha_ingreso());
	$tpl->setVariable('tipo',$equipo->gettipo());
	$tpl->setVariable('marca',$equipo->getmarca());
	$tpl->setVariable('modelo',$equipo->getmodelo());
	$tpl->setVariable('nro_serie',$equipo->getnro_serie());
	$tpl->setVariable('fecha_prometido',$orden->getfecha_prometido());
	$tpl->setVariable('estado',$orden->getestado());
	$tpl->parse('Consulta');
}

$tpl->parse('Cabecera');



$orden->free();
if(isset($usuario)){
	$usuario->free();
	$equipo->free();
}

$tpl->show();	
?>