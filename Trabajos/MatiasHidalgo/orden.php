<?php
require_once ('config.php');
require_once('./DataObjects/Ordenes.php');
require_once('./DataObjects/Equipos.php');
require_once('./DataObjects/Usuarios.php');
$orden=new DO_Ordenes;
$orden->nro_orden = $_POST['nroorden'];
$cantidad = $orden->find();
if($cantidad != 0){
	$usuario=new DO_Usuarios;
	$usuario->id_usuario = $orden->id_usuario;
	$usuario->find();
	$equipo=new DO_Equipos;
	$equipo->id_equipo = $orden->id_equipo;
	$contrascorrecta=false;
	if ($usuario->contras==$_POST['contras']) {
		$contrascorrecta=true;
	}
}
require_once('cabecera.php');
require_once('menu.php');
?>
<div class="contenido">
<?php 
if($cantidad == 0){
	echo("<br/><h2>La Orden nro: ".$_POST['nroorden']." no existe</h2>");
	echo('<h3><a href="consulorden.php">Volver atras</a></h3>');
} else if($contrascorrecta=false){
	echo('<br/><h2>La contraseña no es válida</h2>');
	echo('<h3><a href="consulorden.php">Volver atras</a></h3>');	
} else echo('<form id="form">
<label>Orden Numero:</label><label id="nro_orden"> '.$orden->get_nro_orden().'</label><br/>
<label>Fecha de Ingreso:</label><label id="fecha_ingreso"> '.$orden->get_fecha_ingreso().'</label><br/>
<label>Equipo:</label><label id="tipo">'.$equipo->get_tipo().'</label><br/>
<label>Marca:</label><label id="marca">'.$equipo->get_marca().'</label><br/>
<label>Modelo:</label><label id="modelo">'.$equipo->get_modelo().'</label><br/>
<label>Nro de Serie:</label><label id="nro_serie">'.$equipo->get_nro_serie().'</label><br/>
<label>Fecha de Compromiso:</label><label id="fecha_prometido">'.$orden->get_fecha_prometido().'</label><br/>
<label>Estado:</label><label id="estado">'.$orden->get_estado().'</label><br/>
</form>
');
?>
</div>
<?php 
require_once('piedepagina.php');
$orden->free();
$usuario->free();
$equipo->free();
?>