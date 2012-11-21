<?php
//ini_set('display_errors', '0');     # don't show any errors...
//error_reporting(E_ALL | E_STRICT);  # ...but do log them
require_once 'DB/DataObject.php';

$config = parse_ini_file('db.ini',TRUE);
 foreach($config as $class=>$values) {
		    $options = &PEAR::getStaticProperty($class,'options');
		    $options = $values;
}
?>

