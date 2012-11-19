<?php

define ('MONEDA1','$');
define ('MONEDA2','U$S');

define ('PATH_IMAGENES', './imagenes/productos/');
define ('CANT_FILAS_PAGINADO', 25);

$peardir = '/usr/share/php';
ini_set('include_path', $peardir);
require_once 'PEAR.php';
require_once 'DB/DataObject.php';

$config = parse_ini_file("/var/www/tupar/clicksi/clases/pear/dataobjects/db.ini", TRUE);
foreach($config as $class => $values) {
    $options = &PEAR::getStaticProperty($class, "options");
    $options = $values;
}
?>
