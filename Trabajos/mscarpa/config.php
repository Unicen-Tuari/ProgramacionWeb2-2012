<?php
require_once 'DB/DataObject.php';
ini_set('display_errors', '0');
error_reporting(E_ALL | E_STRICT);
$config = parse_ini_file('db.ini',TRUE);
foreach($config as $class=>$values) {
		    $options = &PEAR::getStaticProperty($class,'options');
		    $options = $values;
}
?>

