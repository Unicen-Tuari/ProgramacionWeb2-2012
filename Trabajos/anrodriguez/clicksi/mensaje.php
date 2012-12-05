<?php
include_once 'config.php';
include_once("/usr/share/php/HTML/Template/Sigma.php");

function mensaje($titulo, $texto1, $texto2, $pagina) {    

$tpl = new HTML_Template_Sigma(".");
$ret = $tpl->loadTemplateFile("./templates/mensaje.html");

if (!$ret) {
    die ('Error al cargar template');
}

$tpl->setVariable(titulo, $titulo);
$tpl->setVariable(texto1, $texto1);
$tpl->setVariable(texto2, $texto2);
$tpl->parse('mensaje');
}

$tpl->show();

//header("Location:".$pagina);

?>
