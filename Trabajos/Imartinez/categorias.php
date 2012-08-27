<?php 
$categoria = $_GET["categoria"];
//$subcategoria = $_GET["subcategoria"];
$ubicacion = $_GET["ubicacion"];
if ($ubicacion == "") $ubicacion = "Argentina";
require_once("includes/clases.php");
$manager = new Mannagerdb;
$manager->conectarse();
$categorias_relacionadas = $manager->categorias_relacionadas($manager,$categoria);
$clasificados = $manager->listar_clasificados($manager,$categoria, $ubicacion);
$manager->liberar_resultados();
$manager->cerrar_conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Anuncios clasificados gratis de <?php echo $categoria?> en <?php echo $ubicacion?></title>
<meta name="description" content="" />
<?php require_once("includes/encabezados.php")?>
</head>
<body>
	<div id="container">
		<?php require_once("includes/header.php")?>
		<div id="content">
			<?php require_once("includes/navegacion.php")?>
			<div class="lateral">
				<h4>Busqueda avanzada</h4>
				<p>Categorias</p>
				<ul class="categorias">
				<?php foreach ($categorias_relacionadas as $itcategoria) {
						if ($categoria == $itcategoria->get_nombre()) {
						?> <li><?php echo $itcategoria->get_nombre()?></li> 
						<?php } else {?>
						<li><a href="categorias.php?categoria=<?php echo $itcategoria->get_nombre()?>&amp;ubicacion=<?php echo $ubicacion?>"><?php echo $itcategoria->get_nombre()?></a></li>
						<?php }
				}?>
				</ul>
			</div>	
			<div class="clasificados">
				<div class="titulo-categoria">
					<h2>2764 anuncios para <?php echo $categoria?> en <?php echo $ubicacion?></h2>
				</div>
				<ul>
				<?php foreach ($clasificados as $clasificado) {
						?>
						<li>
							<a href="amplia.php?id=<?php echo $clasificado->get_id()?>"><img src="http://static.blidoo.com.ar/img_ads/20000/20125_tl_1.jpg" class="thumbnail"/></a>
							<h3><a href="amplia.php?id=<?php echo $clasificado->get_id()?>"><?php echo $clasificado->get_titulo()?></a></h3>
							<p><?php echo $clasificado->get_detalle()?></p>
							<p>Alquiler temporario en Bariloche - Río Negro | hace una hora</p>
						</li>
						<?php }?>
				</ul>
			</div>
		</div>			
		<?php require_once("includes/footer.php")?>
	</div>
</body>
</html>