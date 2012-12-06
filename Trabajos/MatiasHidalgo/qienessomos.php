<?php
require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');

$error=$tpl->loadTemplateFile("/templates/qienessomos.html");

$tpl->setVariable('titulo','Quienes Somos');
$tpl->setVariable('scripts','<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script><script type="text/javascript" src="js/GoogleMap.js"></script>');
$tpl->setVariable('onload','initialize();');

$tpl->parse('Cabecera');


$tpl->show();	
?>