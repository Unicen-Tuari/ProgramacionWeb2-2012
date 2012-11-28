<?php
	session_start();
	$uploaddir = '../images/productos/grandes/';
	$_SESSION['nombreImagen' . $_REQUEST['img']] = uniqid() . basename($_FILES['uploadfile']['name']);
	$file = $uploaddir . $_SESSION['nombreImagen' . $_REQUEST['img']];
	move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file);
?>