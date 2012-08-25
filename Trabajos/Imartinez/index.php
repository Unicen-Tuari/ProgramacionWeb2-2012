<?php 
$ubicacion = $_GET["ubicacion"];
if ($ubicacion == "") $ubicacion = "Argentina";
require_once("includes/clases.php");
$manager = new Mannagerdb;
$provincias = $manager->todas_las_provincias();
$categorias = $manager->todas_las_categorias_y_subcategorias();
$orden_categorias =  array("Inmuebles", "Servicios", "Grupos", "Autos", "Trabajo", "Clases - Cursos", "Compra - Venta", "Contactos");
$cantidad_clasificados = $manager->cantidad_clasificados($ubicacion);
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
						<?php if ($ubicacion == $provincia->get_nombre()) {
						echo $provincia->get_nombre(); 
						} else {?>
						<a href="index.php?ubicacion=<?php echo $provincia->get_nombre()?>"><?php echo $provincia->get_nombre()?></a>
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
						<h2><a href="categorias.php?categoria=<?php echo $categoria?>&amp;ubicacion=<?php echo $ubicacion?>"><?php echo $categoria?></a></h2>
						<span class="cantidad">(<?php echo $cantidad_clasificados[$categoria]?>)</span>
					</div>
					<ul class="lista-subcategorias">
					<?php $subcategorias=$categorias[$categoria];					
					foreach ($subcategorias as $subcategoria) {?>
						<li>
							<a href="categorias.php?categoria=<?php echo $subcategoria->get_nombre()?>&amp;ubicacion=<?php echo $ubicacion?>"><?php echo $subcategoria->get_nombre()?></a>
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