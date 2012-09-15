<?php 
$id_categoria = $_POST["categoria"];
$id_subcategoria = $_POST["subcategoria"];
$id_provincia = $_POST["provincia"];
$id_municipio = $_POST["municipio"];
require_once("includes/clases.php");
$manager = new Mannagerdb;
$manager->conectarse();
$nombre_municipio = $manager->municipio($manager,$id_municipio)->get_nombre();
$ubicacion = $nombre_municipio;
$nombre_provincia = $manager->provincia($manager,$id_provincia)->get_nombre();
$nombre_subcategoria = $manager->categoria($manager,$id_subcategoria)->get_nombre();
if (isset($_POST["enviar-paso2"])){
	$clasificado = new Clasificado;
	//$clasificado->set_id($renglon["idclasificado"]);
	$clasificado->set_id_ciudad($id_municipio);
	$clasificado->set_titulo($_POST["titulo"]);
	$clasificado->set_detalle($_POST["detalle"]);
	$clasificado->set_id_categoria($id_subcategoria);
	$clasificado->set_contacto($_POST["email"]);
	//$clasificado->set_fecha($renglon["fecha"]);
	$clasificado->set_precio($_POST["precio"]);
	$clasificado->set_moneda($_POST["moneda"]);
	$clasificado->set_telefono($_POST["telefono"]);
	//$clasificado->set_nombre_categoria($renglon["nombre"]);
	//print_r($clasificado);
	$manager->agregar_clasificado($manager,$clasificado);
}
$manager->liberar_resultados();
$manager->cerrar_conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Publicar anuncio clasificado gratis de <?php echo $nombre_subcategoria?> en <?php echo $ubicacion?></title>
<meta name="description" content="" />
<?php require_once("includes/encabezados.php")?>
</head>
<body>
	<div id="container">
		<?php require_once("includes/header.php")?>
		<div id="content">
			<h2>Publica tu aviso clasificado gratis</h2>
			<p>Publicar clasificado gratis de <b><?php echo $nombre_subcategoria?></b> en 
			<b><?php echo $nombre_municipio?>, <?php echo $nombre_provincia?></b> 
			(<a href="publicar-anuncio-paso1.php?categoria=<?php echo $id_categoria?>
			&amp;subcategoria=<?php echo $id_subcategoria?>
			&amp;ubicacion=<?php echo $ubicacion?>">cambiar</a>)</p>
			<div class="contenedor-paso1">
				<form id="publicar-anuncio-paso2" action="publicar-anuncio-paso2.php" method="post">
					<div class="caja-paso1">					
						<div class="caja-paso2-interior">
							<h4>Titulo</h4>
							<input name="titulo" id="titulo"></input>
							<p>70 caracteres restantes</p>
						</div>				
					</div>					
					<div class="caja-paso1">				
						<div class="caja-paso2-interior">
							<h4>Descripcion</h4>
							<textarea name="detalle" id="descripcion"></textarea>
						</div>		
					</div>
					<div class="caja-paso1">				
						<div class="caja-paso2-interior">
							<h4>Precio <span class="opcional">(opcional)</span></h4>
							<input name="precio" id="precio"></input>
							<select name="moneda" id="moneda">
								<option value="pesos" selected="selected">Pesos</option>
								<option value="dolares">Dolares</option>
							</select>
						</div>		
					</div>
					<div class="caja-paso1">				
						<div class="caja-paso2-interior">
							<h4>Fotos <span class="opcional">(opcional)</span></h4>
						</div>		
					</div>
					<div class="caja-paso1">				
						<div class="caja-paso2-interior">
							<h4>Telefono <span class="opcional">(opcional)</span></h4>
							<input name="telefono" id="telefono"></input>
						</div>		
					</div>
					<div class="caja-paso1">				
						<div class="caja-paso2-interior">
							<h4>E-mail</h4>
							<input name="email" id="email"></input>
							<p>Tu direccion de email no sera publicada</p>
						</div>		
					</div>
					<div>
						<input type="hidden" name="categoria" value="<?php echo $_POST["categoria"]?>"></input>
						<input type="hidden" name="subcategoria" value="<?php echo $_POST["subcategoria"]?>"></input>
						<input type="hidden" name="provincia" value="<?php echo $_POST["provincia"]?>"></input>
						<input type="hidden" name="municipio" value="<?php echo $_POST["municipio"]?>"></input>
					</div>
					<div class="caja-paso1">
						<input name="enviar-paso2" id="enviar-paso1" type="submit" value="Publicar anuncio!"></input>
					</div>
				</form>
			</div>
		</div>			
		<?php require_once("includes/footer.php")?>
	</div>
</body>
</html>