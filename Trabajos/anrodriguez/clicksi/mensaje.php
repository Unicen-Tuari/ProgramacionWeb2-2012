<?php
include_once 'config.php';
include_once("HTML/Template/Sigma.php");

    $tpl = new HTML_Template_Sigma(".");
    $retOK = $tpl->loadTemplateFile("./templates/mensaje.html");

    if (!$retOK) {
        die ('Error al cargar template');
    }
  
    $titulo     = $_GET["titulo"];
    $texto1     = $_GET["texto1"];
    $texto2     = $_GET["texto2"];
    $pagina     = $_GET["pagina"];
    $textoPagina= $_GET["textoPagina"];
    
    
    $tpl->setVariable(titulo, $titulo);
    $tpl->setVariable(texto1, $texto1);
    $tpl->setVariable(texto2, $texto2);
    $tpl->setVariable(texto3, $texto3);
    $tpl->setVariable(pagina, $pagina);
    $tpl->setVariable(texto_pagina, $textoPagina);

    $tpl->parse('mensaje');
    $tpl->show();

?>