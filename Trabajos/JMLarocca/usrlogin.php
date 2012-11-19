<?php 


require_once 'clases\config.inc.php';
include_once 'C:\xampp\htdocs\DgMweb2\clases\pear\dataobjects\Cliente.php';
include_once 'clases\login.php';

$usrLogin = new login();

if ( (isset($_POST['usuario'])) && (isset($_POST['clave'])))
{
	$usrLogin->setmail($_POST['usuario']);
        $usrLogin->find();
        $usuario = $usrLogin->fetch();
        $clave = $_POST['clave'];
        if ($usuario)
         {  
             $mail = $usrLogin->getmail();
             if ($usrLogin->validarClave($clave))
                {
                        session_start();
			$_SESSION['usuariovalido'] = true;
			$_SESSION['usuario']= $_POST['usuario'];
			$_SESSION['clave']= $_POST['clave'];
                        echo " <script lenguaseje='JavaScript'>
			location.href= 'principal.php';
			</script>";
                }
              else
		echo " <script lenguaseje='JavaScript'>
			location.href= 'index.html?msg=usuario_invalido';
			</script>";
         }
         echo " <script lenguaje='JavaScript'>
                location.href= 'index.html';
                </script>";
}
?>