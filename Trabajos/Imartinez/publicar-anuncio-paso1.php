<?php 
$categoria = $_GET["categoria"];
$subcategoria = $_GET["subcategoria"];
$ubicacion = $_GET["ubicacion"];
if ($ubicacion == "") $ubicacion = "Argentina";
require_once("includes/clases.php");
$manager = new Mannagerdb;
$manager->conectarse();
$todas_las_provincias = $manager->todas_las_provincias($manager);
//$todos_los_municipios = $manager->todos_los_municipios($manager,1);//el 1 va por parametro
$todas_las_categorias = $manager->todas_las_categorias($manager);
//$todas_las_subcategorias = $manager->todas_las_subcategorias($manager,1);//el 1 va por parametro
$manager->liberar_resultados();
$manager->cerrar_conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Publicar anuncio gratis de <?php echo $categoria?> en <?php echo $ubicacion?></title>
<meta name="description" content="" />
<?php require_once("includes/encabezados.php")?>
<script type="text/javascript" src="js/select_dependientes.js"></script>
</head>
<body>
	<div id="container">
		<?php require_once("includes/header.php")?>
		<div id="content">
			<h2>Publica tu aviso gratis</h2>
			<div class="contenedor-paso1">
				<form action="publicar-anuncio-paso2.php" method="post">					
					<div class="caja-paso1">	
						<p>Selecciona una ubicacion</p>					
						<div class="caja-paso1-interior">
							<h4>Provincia</h4>
							<select class="select" name="provincia" id="provincia" onchange="cargaContenidoMunicipios(this.id)">
								<option value="" selected="selected">-</option>
							<?php foreach ($todas_las_provincias as $provincia) {
									//o el municipio esta dentro de la provincia
									if ($ubicacion == $provincia->get_nombre()) {?>									
										<option value="<?php echo $provincia->get_id()?>" selected="selected"><?php echo $provincia->get_nombre()?></option>
									<?php } else {?>
									<option value="<?php echo $provincia->get_id()?>"><?php echo $provincia->get_nombre()?></option>
									<?php }
							}?>							
							</select>
						</div>						
						<div class="caja-paso1-interior">
							<h4>Municipio</h4>
							<select class="select" name="municipio" id="municipio">
								<option value="" selected="selected">-</option>								
							</select>
						</div>
					</div>					
					<div class="caja-paso1">	
						<p>Selecciona una categoria</p>					
						<div class="caja-paso1-interior">
							<h4>Categoria</h4>
							<select class="select" name="categoria" id="categoria" onchange="cargaContenidoSubcategorias(this.id)">
								<option value="" selected="selected">-</option>
							<?php foreach ($todas_las_categorias as $it_categoria) {
									//o la subcategoria esta dentro de la categoria
									if ($categoria == $it_categoria->get_nombre()) {?>									
										<option value="<?php echo $it_categoria->get_id()?>" selected="selected"><?php echo $it_categoria->get_nombre()?></option>
									<?php } else {?>
									<option value="<?php echo $it_categoria->get_id()?>"><?php echo $it_categoria->get_nombre()?></option>
									<?php }
							}?>
							</select>
						</div>						
						<div class="caja-paso1-interior">
							<h4>Subcategoria</h4>
							<select class="select" name="subcategoria" id="subcategoria">
								<option value="" selected="selected">-</option>
							</select>
						</div>
					</div>
					<div class="caja-paso1">
						<input name="enviar-paso1" id="enviar-paso1" type="submit"></input>
					</div>
				</form>
			</div>
		</div>			
		<?php require_once("includes/footer.php")?>
	</div>
</body>
</html>