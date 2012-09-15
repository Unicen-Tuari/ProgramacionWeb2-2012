<?php 
$id = $_GET["id"];
require_once("includes/clases.php");
$manager = new Mannagerdb;
$manager->conectarse();
$clasificado = $manager->clasificado($manager,$id);
$ubicacion = $manager->municipio($manager,$clasificado->get_id_ciudad())->get_nombre();
$categoria = $manager->categoria($manager,$clasificado->get_id_categoria())->get_nombre();
$provincia_y_municipio = $manager->provincia_y_municipio($manager, $ubicacion);
$categorias_relacionadas = $manager->categorias_relacionadas($manager,$categoria);
$subcategoria_actual=$categoria;
$manager->liberar_resultados();
$manager->cerrar_conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Anuncios clasificados gratis de <?php echo $categoria?> en <?php echo "Argentina"?></title>
<meta name="description" content="" />
<?php require_once("includes/encabezados.php")?>
</head>
<body>
	<div id="container">
		<?php require_once("includes/header.php")?>
		<div id="content">
			<?php require_once("includes/navegacion.php")?>
			<div class="amplia-clasificado">
				<h2><?php echo $clasificado->get_titulo()?></h2>
				<p><?php echo $clasificado->get_detalle()?></p>
				
				<div>servicios</div>
				<div>contactar al anunciante</div>
				<div>imagenes</div>
			</div>
		</div>			
		<?php require_once("includes/footer.php")?>
	</div>
</body>
</html>