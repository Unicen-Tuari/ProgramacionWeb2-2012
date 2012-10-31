<?php
require_once 'config.php';
require_once 'DataObjects/Comentario.php';
$comentario = new Comentario;
$filas = $comentario->find();
while ($comentario->fetch()) {
	print_r($comentario->Nombre.'</br>');
}

?>