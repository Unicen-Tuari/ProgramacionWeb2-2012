<?php
	include('producto.inc.php');
	include('categoria.inc.php');
	include('conexion.inc.php');
	include('usuario.inc.php');
	include('consulta.inc.php');

	class manager {
		public function getAllCategories($conexion) {
			$registros = $conexion->consulta('select * from categoria');
			while ($reg = mysql_fetch_array($registros)) {
				$categoria = new categoria();
				$categoria->setCodigo($reg['codigo']);
				$categoria->setCat($reg['cat']);
				$allCategories[] = $categoria;
			}
			return $allCategories;
		}
		
		public function getCategoryById($conexion, $id) {
			$registros = $conexion->consulta('select * from categoria where codigo = ' . $id);
			$reg = mysql_fetch_array($registros);
			$categoria = new categoria();
			$categoria->setCodigo($reg['codigo']);
			$categoria->setCat($reg['cat']);
			return $categoria;
		}
		
		public function getAllProducts($conexion) {
			$registros = $conexion->consulta('select * from producto');
			while ($reg = mysql_fetch_array($registros)) {
				$producto = new producto();
				$producto->setCodigo($reg['codigo']);
				$producto->setNombre($reg['nombre']);
				$producto->setNombreImagen($reg['nombre_imagen']);
				$producto->setPrecio($reg['precio']);
				$producto->setCantidad($reg['cantidad']);
				$producto->setCaracteristicas($reg['caracteristicas']);
				$producto->setFechaIngreso($reg['fecha_ingreso']);
				$producto->setCodigoCategoria($reg['codigo_categoria']);
				$allProducts[] = $producto;
			}
			return $allProducts;
		}
		
		public function getProductById($conexion, $id) {
			$registros = $conexion->consulta('select * from producto where codigo = ' . $id);
			$reg = mysql_fetch_array($registros);
			$producto = new producto();
			$producto->setCodigo($reg['codigo']);
			$producto->setNombre($reg['nombre']);
			$producto->setNombreImagen($reg['nombre_imagen']);
			$producto->setPrecio($reg['precio']);
			$producto->setCantidad($reg['cantidad']);
			$producto->setCaracteristicas($reg['caracteristicas']);
			$producto->setFechaIngreso($reg['fecha_ingreso']);
			$producto->setCodigoCategoria($reg['codigo_categoria']);
			return $producto;
		}
		
		public function getProductsByCategoryId($conexion, $id) {
			$registros = $conexion->consulta('select * from producto where codigo_categoria = ' . $id);
			while ($reg = mysql_fetch_array($registros)) {
				$producto = new producto();
				$producto->setCodigo($reg['codigo']);
				$producto->setNombre($reg['nombre']);
				$producto->setNombreImagen($reg['nombre_imagen']);
				$producto->setPrecio($reg['precio']);
				$producto->setCantidad($reg['cantidad']);
				$producto->setCaracteristicas($reg['caracteristicas']);
				$producto->setFechaIngreso($reg['fecha_ingreso']);
				$producto->setCodigoCategoria($reg['codigo_categoria']);
				$allProducts[] = $producto;
			}
			return $allProducts;
		}
		
		public function getLatestProducts($conexion) {
			$registros = $conexion->consulta('select * from producto order by fecha_ingreso desc limit 3');
			while ($reg = mysql_fetch_array($registros)) {
				$producto = new producto();
				$producto->setCodigo($reg['codigo']);
				$producto->setNombre($reg['nombre']);
				$producto->setNombreImagen($reg['nombre_imagen']);
				$producto->setPrecio($reg['precio']);
				$producto->setCantidad($reg['cantidad']);
				$producto->setCaracteristicas($reg['caracteristicas']);
				$producto->setFechaIngreso($reg['fecha_ingreso']);
				$producto->setCodigoCategoria($reg['codigo_categoria']);
				$latestProducts[] = $producto;
			}
			return $latestProducts;
		}
		
		public function getAllUsers($conexion) {
			$registros = $conexion->consulta('select * from usuario');
			while ($reg = mysql_fetch_array($registros)) {
				$usuario = new usuario();
				$usuario->setCodigo($reg['codigo']);
				$usuario->setUsu($reg['usu']);
				$usuario->setPassword($reg['password']);
				$allUsers[] = $usuario;
			}
			return $allUsers;
		}
		
		public function addUser($conexion, $usuario) {
			$usu = $usuario->getUsu();
			$password = $usuario->getPassword();
			$conexion->consulta('insert into usuario (usu, password) values ("' . $usu . '", "' . $password . '")');
		}
		
		public function addQuery($conexion, $consulta) {
			$nombre = $consulta->getNombre();
			$mai = $consulta->getMail();
			$con = $consulta->getCon();
			$conexion->consulta('insert into consulta (nombre, mail, con) values ("' . $nombre . '", "' . $mai . '", "' . $con . '")');
		}
	}
?>