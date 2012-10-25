<?php
    include_once '/var/www/tupar/clicksi/clases/pear/dataobjects/Usuario.php';

class Usuario extends DO_Usuario {
    
    public function validarPassword($par_contrasenia) {
        if ($this->password==md5(rtrim($par_contrasenia)))
			return true;
		else 
			return false;
	}
}

?>