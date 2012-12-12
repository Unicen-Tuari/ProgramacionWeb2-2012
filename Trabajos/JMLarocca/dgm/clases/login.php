<?php

include_once '.\clases\pear\dataobjects\Cliente.php';

class login extends DO_Cliente{

public function validarClave($clave)
	{
		if ($this->clave == $clave)
			return true;
		else return false;
	}
}
?>