<?php 
$ubicacion = $_GET["ubicacion"];
require_once("includes/clases.php");
$manager = new Mannagerdb;
$manager->conectarse();
$provincia_y_municipio = $manager->provincia_y_municipio($manager, $ubicacion);
if ($provincia_y_municipio["municipio"]!="")
	$ubicacion = capitalizar($provincia_y_municipio["municipio"]->get_nombre());
else
	if ($provincia_y_municipio["provincia"]!="")
		$ubicacion = capitalizar($provincia_y_municipio["provincia"]->get_nombre());
	else
		$ubicacion = "Argentina";
$provincias = $manager->todas_las_provincias($manager);
$categorias = $manager->todas_las_categorias_y_subcategorias($manager);
$orden_categorias =  array("Inmuebles", "Servicios", "Grupos", "Vehículos", "Trabajo", "Clases - Cursos", "Compra - Venta", "Contactos");
foreach ($orden_categorias as $categoria){
	$cantidad_clasificados[$categoria] = $manager->cantidad_clasificados($manager,$categoria,$provincia_y_municipio);
}
$manager->liberar_resultados();
$manager->cerrar_conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Anuncios clasificados gratis en <?php echo $ubicacion?></title>
<meta name="description" content="" />
<?php require_once("includes/encabezados.php")?>
</head>
<body>
	<div id="container">
		<?php require_once("includes/header.php")?>
		<div id="content">
			<div class="lateral">
				<h4>Selecciona una provincia</h4>
				<ul class="lista-provincias">
				<?php foreach ($provincias as $provincia) {?>
					<li>
						<?php if ($ubicacion == capitalizar($provincia->get_nombre())) {
						echo $provincia->get_nombre(); 
						} else {
						$url_amigable="index.php?ubicacion=".url_amigable($provincia->get_nombre());
							?>
						<a href="<?php echo $url_amigable?>"><?php echo $provincia->get_nombre()?></a>
						<?php }?>
					</li>
				<?php }?>
				</ul>
			</div>	
			<div class="contenedor-categorias">
			<?php 
			for ($i=0;$i<8;$i++){
				$categoria=$orden_categorias[$i];?>
				<div class="categoria">
					<div class="titulo-categoria">
					<?php $url_amigable="categorias.php?categoria=".url_amigable($categoria."&amp;ubicacion=".$ubicacion);?>
						<h2><a href="<?php echo $url_amigable?>"><?php echo $categoria?></a></h2>
						<span class="cantidad">(<?php echo $cantidad_clasificados[$categoria]?>)</span>
					</div>
					<ul class="lista-subcategorias">
					<?php $subcategorias=$categorias[$categoria];					
					foreach ($subcategorias as $subcategoria) {?>
						<li>
						<?php $url_amigable="categorias.php?categoria=".url_amigable($categoria."&amp;subcategoria=".$subcategoria->get_nombre()."&amp;ubicacion=".$ubicacion);?>
							<a href="<?php echo $url_amigable?>"><?php echo $subcategoria->get_nombre()?></a>
						</li><?php }?>						
					</ul>
				</div>
			<?php if ($i==2 || $i==5){ ?>	
				</div>	
				<div class="contenedor-categorias">						
				<?php }
			}?>
			</div>
		</div>			
		<?php require_once("includes/footer.php")?>
	</div>
</body>
</html>