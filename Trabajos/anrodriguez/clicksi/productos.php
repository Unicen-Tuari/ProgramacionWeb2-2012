<?php
    include_once './estructura/encabezado.inc.php';
    require_once './rutinas/qproductos.php';
?>
<div class="contentCatalog">
	<br>
	<h1>Catalogo de productos</h1>
	<p>Los precios no incluyen I.V.A.</p>
	<h2>
	<?php
        $par_rubro = $_GET["rubro"];
        echo $par_rubro;
	?>
	</h2>
	<br>
	<div id="divtablaproductos">
        <form class='container' method='post'> <!-- action='contenido_productos.inc.php'-->
            <?php
                echo html_productos($par_rubro);
            ?>
            <br>
            <hr>        
        </form>
	</div>
</div>
<?php
    include_once './estructura/piedepagina.inc.php';
?>
