<?php
ini_set('display_errors', '0'); #No muestra los errores
error_reporting(E_ALL | E_STRICT); # ...but los loguea
require_once 'DB\DataObject.php';
	$config = parse_ini_file('db.ini', TRUE);
	foreach ($config as $class=>$values){
		$options = &PEAR::getStaticProperty($class,'options');
		$options = $values;
	}

?>