<?php
	require_once 'config.php';
	require_once 'util.php';
    include_once '/var/www/tupar/clicksi/clases/Usuario.php';
	
    
    session_start();
    if (!isset($_SESSION['usuario']) ) {
        $par_usuario 		= $_POST["usuario"];
        $par_contrasenia 	= $_POST["contrasenia"];
        
        $usuario = new Usuario;
        $usuario->setemail($par_usuario);
        $usuario->find();
        
        $nUsuarios = $usuario->fetch();
        
        if (!$nUsuarios) { 
            errorConexionPagina();
        } else {
            if (!$usuario->validarPassword($par_contrasenia)) {
                errorConexionPagina();
            }
        else {
            $_SESSION['usuario']=$par_usuario;
            }    
        }
        $usuario->free();        
    }
?>