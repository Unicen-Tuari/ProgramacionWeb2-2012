<?php
require_once 'config.php';
require_once 'DataObjects/Persona.php';
$persona = new DO_Persona;
$persona->get(1);
print_r($persona);

?>