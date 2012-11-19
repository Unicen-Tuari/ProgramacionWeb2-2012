<?php

include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\Login.php';

class login extends DO_Login{

public function validarClave($clave)
	{
		if ($this->clave == $clave)
			return true;
		else return false;
	}
}
?>