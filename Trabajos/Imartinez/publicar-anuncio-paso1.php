<?php 
$categoria = $_GET["categoria"];
$subcategoria = $_GET["subcategoria"];
$ubicacion = $_GET["ubicacion"];
if ($ubicacion == "") $ubicacion = "Argentina";
require_once("includes/clases.php");
$manager = new Mannagerdb;
$todas_las_provincias = $manager->todas_las_provincias();
$todos_los_municipios = $manager->todos_los_municipios(1);//el 1 va por parametro
$todas_las_categorias = $manager->todas_las_categorias();
$todas_las_subcategorias = $manager->todas_las_subcategorias(1);//el 1 va por parametro
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Publicar anuncio gratis de <?php echo $categoria?> en <?php echo $ubicacion?></title>
<meta name="description" content="" />
<?php require_once("includes/encabezados.php")?>
</head>
<body>
	<div id="container">
		<?php require_once("includes/header.php")?>
		<div id="content">
			<h2>Publica tu aviso gratis</h2>
			<div class="contenedor-paso1">
				<form>					
					<div class="caja-paso1">	
						<p>Selecciona una ubicacion</p>					
						<div class="caja-paso1-interior">
							<h4>Provincia</h4>
							<select class="select" name="provincia">
								<option value="" selected="selected">-</option>
							<?php foreach ($todas_las_provincias as $provincia) {
									if ($ubicacion == $provincia->get_nombre()) {?>									
										<option value="<?php echo $provincia->get_nombre()?>" selected="selected"><?php echo $provincia->get_nombre()?></option>
									<?php } else {?>
									<option value="<?php echo $provincia->get_id()?>"><?php echo $provincia->get_nombre()?></option>
									<?php }
							}?>							
							</select>
						</div>						
						<div class="caja-paso1-interior">
							<h4>Municipio</h4>
							<select class="select" name="municipio">
								<option value="" selected="selected">-</option>
								<?php foreach ($todos_los_municipios as $municipio) {
									if ($ubicacion == $municipio->get_nombre()) {?>									
										<option value="<?php echo $municipio->get_nombre()?>" selected="selected"><?php echo $municipio->get_nombre()?></option>
									<?php } else {?>
									<option value="<?php echo $municipio->get_id()?>"><?php echo $municipio->get_nombre()?></option>
									<?php }
							}?>	
							</select>
						</div>
					</div>					
					<div class="caja-paso1">	
						<p>Selecciona una categoria</p>					
						<div class="caja-paso1-interior">
							<h4>Categoria</h4>
							<select class="select" name="categoria">
								<option value="" selected="selected">-</option>
							<?php foreach ($todas_las_categorias as $it_categoria) {
									if ($categoria == $it_categoria->get_nombre()) {?>									
										<option value="<?php echo $it_categoria->get_nombre()?>" selected="selected"><?php echo $it_categoria->get_nombre()?></option>
									<?php } else {?>
									<option value="<?php echo $it_categoria->get_id()?>"><?php echo $it_categoria->get_nombre()?></option>
									<?php }
							}?>
							</select>
						</div>						
						<div class="caja-paso1-interior">
							<h4>Subcategoria</h4>
							<select class="select" name="subcategoria">
								<option value="" selected="selected">-</option>
								<?php foreach ($todas_las_subcategorias as $it_subcategoria) {
									if ($categoria == $it_subcategoria->get_nombre()) {?>									
										<option value="<?php echo $it_subcategoria->get_nombre()?>" selected="selected"><?php echo $it_subcategoria->get_nombre()?></option>
									<?php } else {?>
									<option value="<?php echo $it_subcategoria->get_id()?>"><?php echo $it_subcategoria->get_nombre()?></option>
									<?php }
							}?>
							</select>
						</div>
					</div>
					<div class="caja-paso1">
						<input id="enviar-paso1" type="submit"></input>
					</div>
				</form>
			</div>
		</div>			
		<?php require_once("includes/footer.php")?>
	</div>
</body>
</html>