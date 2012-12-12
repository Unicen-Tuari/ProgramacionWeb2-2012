<?php

	define('SERVIDOR','localhost');
	define('USUARIO','root');
	define('CONTRASENIA','tupar');
	define('BASE_DATO','dgm');
	
 //---------------------------------------------------------
        $peardir = 'c:\xampp\php\PEAR';
        ini_set('include_path', $peardir);
        require_once 'PEAR.php';
        require_once 'DB\DataObject.php';
        
        $config = parse_ini_file("C:\\xampp\\htdocs\\dgm\\clases\\pear\\dataobjects\\db.ini", TRUE);
        foreach ($config as $class => $values){
            $options = &PEAR::getStaticProperty($class, "options");
            $options = $values;
        }
	
?>