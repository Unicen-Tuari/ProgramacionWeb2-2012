<?php
//require_once('DBmanager.inc.php');
//$dbmanager=new DBmanager;
require_once ('config.php');
require_once('./DataObjects/Consultas.php');
$consulta=new DO_Consultas;
$consulta->nombre = $_POST['nombre'];
$consulta->apellido = $_POST['apellido'];
$consulta->tipo_doc = $_POST['tipodni'];
$consulta->num_doc = $_POST['dni'];
$consulta->email = $_POST['email'];
$consulta->consulta = $_POST['consulta'];

$consulta->insert();

//$consulta=$dbmanager->crearConsulta($_POST['nombre'],$_POST['apellido'],$_POST['tipodni'],$_POST['dni'],$_POST['email'],$_POST['consulta']);
//$dbmanager->sendConsulta($consulta);

//Inicio de Carga de Web
require_once('cabecera.php');
require_once('menu.php');
?>
<div class="contenido">
Muchas gracias por enviar su consulta Sr./a <?php echo($consulta->getapellido().", ".$consulta->getnombre()); ?> <br/>
<br/>
En breve le contestaremos su consulta. <br/>
</div>
<?php 
require_once('piedepagina.php');
?>