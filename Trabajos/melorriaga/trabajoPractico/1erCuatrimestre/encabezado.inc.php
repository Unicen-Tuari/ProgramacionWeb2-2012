<div class="encabezado">

    <div class="menu">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="novedades.php">Novedades</a></li>
    <li><a href="listado.php">Listado</a></li>
    <li><a href="consultas.php">Consultas</a></li>
    </ul>
    </div>
    
    <?php
		
		include('manager.inc.php');
		if (!isset($_SESSION['logueado'])) {
			if (isset($_REQUEST['usuario']) && isset($_REQUEST['password'])) {
				$usuario = $_REQUEST['usuario'];
				$password = $_REQUEST['password'];
				$server = 'localhost';
				$username = 'tp';
				$pass = '123456';
				$database = 'tp';
				$conexion = new conexion();
				$conexion->conectar($server, $username, $pass, $database);
				$manager = new manager();
				$usuarios = $manager->getAllUsers($conexion);
				foreach ($usuarios as $usu) {
					if (($usu->getUsu() == $usuario) && ($usu->getPassword() == $password)) {
						$_SESSION['logueado'] = $usuario;
						break;
					}
				}
				$conexion->desconectar();
			}
			
			if (!isset($_SESSION['logueado'])) {
				
		?>    
        	
            <div class="menu" style="padding-left:0.4em">
            <ul>
            <li><a href="registro.php">Registro</a></li>
            </ul>
            </div>
            
            <div id="login">
            <form action="index.php" method="post" name="loginForm" id="loginForm" onSubmit="validarIngreso()">
            Usuario: <input type="text" id="usuario" name="usuario" class="campoTexto" />
            Contrase&ntilde;a: <input type="password" id="password" name="password" class="campoTexto" />
            <input type="submit" id="botonLogin" name="botonLogin" value="Ingresar" />
            </form>
            </div>
                
            <?php
			
			}
		}

		if (isset($_SESSION['logueado'])) {
			?>
            
            <div class="menu" style="padding-left:0.4em">
            <ul>
            <li><a href="altas.php">Altas</a></li>
            </ul>
            </div>
            
            <div id="login" style="padding-top:0.7em">
            <form action="cerrarSesion.php" method="post">
                <div id="user">
                <?php
					echo "Inicio sesion como ";
                    echo $_SESSION['logueado'];
                ?>
                </div>
            <input type="submit" id="botonLogin" value="Cerrar sesion" />
            </form>
            </div>
            
            <?php
		}

	?>

</div>