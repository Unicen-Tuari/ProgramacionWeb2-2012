<?php
include_once 'config.php';
include_once("HTML/Template/Sigma.php");

function mensaje($titulo, $texto1='', $texto2='', $pagina='', $textoPagina='') {
    echo $titulo;
    $tpl = new HTML_Template_Sigma(".");
    $retOK = $tpl->loadTemplateFile("./templates/mensaje.html");

    if (!$retOK) {
        die ('Error al cargar template');
    }
    
    $tpl->setVariable(titulo, $titulo);
    $tpl->setVariable(texto1, $texto1);
    $tpl->setVariable(texto2, $texto2);
    $tpl->setVariable(pagina, $pagina);
    $tpl->setVariable(texto_pagina, $textoPagina);

    $tpl->parse('mensaje');
    $tpl->show();
}
?>