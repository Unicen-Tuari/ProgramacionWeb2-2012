<?php 
$categoria_actual = $_GET["categoria"];
$subcategoria_actual = $_GET["subcategoria"];
if ($subcategoria_actual!="")
	$categoria_para_mostrar=$subcategoria_actual;
else 
	$categoria_para_mostrar=$categoria_actual;
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
$categorias_relacionadas = $manager->categorias_relacionadas($manager,$categoria_para_mostrar);
$clasificados = $manager->listar_clasificados($manager,$categoria_para_mostrar,$provincia_y_municipio);
$cantidad_clasificados = $manager->cantidad_clasificados($manager,$categoria_para_mostrar,$provincia_y_municipio);
$todas_las_provincias = $manager->todas_las_provincias($manager);
if ($provincia_y_municipio["provincia"]!="")
	$todos_los_municipios = $manager->todos_los_municipios($manager,$provincia_y_municipio["provincia"]->get_id());
$manager->liberar_resultados();
$manager->cerrar_conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Anuncios clasificados gratis de <?php echo $categoria_para_mostrar?> en <?php echo $ubicacion?></title>
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
				<ul class="lista-categorias">
				<?php foreach ($categorias_relacionadas as $itcategoria) {
						if ($categoria_para_mostrar == normalizar($itcategoria->get_nombre())) {
						?> <li><?php echo $itcategoria->get_nombre()?></li> 
						<?php } else {
						$url_amigable="categorias.php?".url_amigable("categoria=".$categorias_relacionadas[0]->get_nombre()."&amp;subcategoria=".$itcategoria->get_nombre()."&amp;ubicacion=".$ubicacion);?>
						<li><a href="<?php echo $url_amigable?>"><?php echo $itcategoria->get_nombre()?></a></li>
						<?php }
				}?>
				</ul>
				<p>Ubicacion</p>
				<ul class="filtro-ubicacion">
				<li>
				<select class="select" name="provincia" id="provincia" onchange="location.href='categorias.php?categoria=<?php echo $categoria_actual?>&amp;subcategoria=<?php echo $subcategoria_actual?>&amp;ubicacion='+(this.value)">
					<option value="" selected="selected">-</option>
					<?php foreach ($todas_las_provincias as $provincia) {
						//o el municipio esta dentro de la provincia
						if (($provincia_y_municipio["provincia"]!="") && ($provincia_y_municipio["provincia"]->get_nombre() == $provincia->get_nombre())) {?>									
							<option value="<?php echo $provincia->get_nombre()?>" selected="selected"><?php echo $provincia->get_nombre()?></option>
						<?php } else {?>
							<option value="<?php echo $provincia->get_nombre()?>"><?php echo $provincia->get_nombre()?></option>
						<?php }
					}?>							
				</select>
				</li>
				<li>
				<select class="select" name="municipio" id="municipio" onchange="location.href='categorias.php?categoria=<?php echo $categoria_actual?>&amp;subcategoria=<?php echo $subcategoria_actual?>&amp;ubicacion='+(this.value)">
					<option value="" selected="selected">-</option>
					<?php foreach ($todos_los_municipios as $municipio) {
							if ($ubicacion == $municipio->get_nombre()) {?>		
								<option selected="selected" value="<?php echo $municipio->get_nombre()?>"><?php echo $municipio->get_nombre()?></option>
							<?php } else {?>
								<option value="<?php echo $municipio->get_nombre()?>"><?php echo $municipio->get_nombre()?></option>
						<?php }
						}?>
				</select>	
				</li>
				</ul>
			</div>	
			<div class="clasificados">
				<div class="titulo-categoria">
					<h2><?php echo $cantidad_clasificados?> anuncios para <?php echo capitalizar($categoria_para_mostrar)?> en <?php echo $ubicacion?></h2>
				</div>
				<ul>
				<?php foreach ($clasificados as $clasificado) {
						?>
						<li>
							<div class="precio">
							<?php if ($clasificado->get_precio()!="")
									echo $clasificado->get_moneda()." ".$clasificado->get_precio()?>
							</div>
							<a href="amplia.php?id=<?php echo $clasificado->get_id()?>"><img src="http://static.blidoo.com.ar/img_ads/20000/20125_tl_1.jpg" class="thumbnail"/></a>
							<h3><a href="amplia.php?id=<?php echo $clasificado->get_id()?>"><?php echo $clasificado->get_titulo()?></a></h3>
							<p><?php echo $clasificado->get_detalle()?></p>
							<p><?php echo $clasificado->get_nombre_categoria()?> | <?php echo capitalizar($clasificado->get_nombre_municipio())?> | <?php echo $clasificado->get_fecha()?></p>
						</li>
						<?php }?>
				</ul>
			</div>
		</div>			
		<?php require_once("includes/footer.php")?>
	</div>
</body>
</html>