<?php
include_once 'config.php';
include_once 'rutinas/conexion.inc.php';
include_once("HTML/Template/Sigma.php");

$tpl = new HTML_Template_Sigma(".");
$retOK = $tpl->loadTemplateFile("./templates/administracion.html");

if (!$retOK) {
    die ('Error al cargar template');
}

$tpl->setVariable(usuario_sesion,  $_GET["usuario"]);    
$tpl->parse('menu_administracion');

$tpl->show();

?>