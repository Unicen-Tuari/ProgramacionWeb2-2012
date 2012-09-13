<div id="header">
	<div class="logo">
	<a href="index.php">logo</a>
	</div>	
	<h1>Anuncios clasificados gratis en <b><?php echo $ubicacion?></b></h1>
	<div class="publica-anuncio-gratis">
		<a href="publicar-anuncio-paso1.php?ubicacion=<?php echo $ubicacion?>&amp;categoria=<?php echo $categoria?>">Publica tu anuncio clasificado gratis</a>
	</div>
	<form id="buscador">
		<input type="text" name="texto" id="entrada-buscador"/>
		<input type="submit" name="enviar" value="Buscar"/>
	</form>
</div>