<?php
	session_start();
	$uploaddir = '../images/productos/grandes/';
	$_SESSION['nombreImagen'] = basename($_FILES['uploadfile']['name']);
	$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
	move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file);
?>