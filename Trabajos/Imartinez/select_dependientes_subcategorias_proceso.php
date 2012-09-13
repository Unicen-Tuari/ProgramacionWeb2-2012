<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
	"categoria"=>"categoria",
	"subcategoria"=>"subcategoria"
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects[$selectDestino];
	require_once("includes/clases.php");
	$manager = new Mannagerdb;
	$manager->conectarse();
	$todas_las_subcategorias = $manager->todas_las_subcategorias($manager,$opcionSeleccionada);
	$manager->liberar_resultados();
	$manager->cerrar_conexion();?>
	<h4>Subcategoria</h4>
	<select class="select" name="<?php echo $selectDestino?>" id="<?php echo $selectDestino?>" <?php //onChange="cargaContenidoSubcategorias(this.id)>"?>>
		<option value="" selected="selected">-</option>
		<?php foreach ($todas_las_subcategorias as $it_subcategoria) {?>
				<option value="<?php echo $it_subcategoria->get_id()?>"><?php echo $it_subcategoria->get_nombre()?></option>
			<?php }?>
	</select>		
<?php } ?>