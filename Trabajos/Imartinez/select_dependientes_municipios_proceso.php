<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
	"provincia"=>"provincia",
	"municipio"=>"ciudad"
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
	$todos_los_municipios = $manager->todos_los_municipios($manager,$opcionSeleccionada);
	$manager->liberar_resultados();
	$manager->cerrar_conexion();?>
	<h4>Municipio</h4>
	<select class="select" name="<?php echo $selectDestino?>" id="<?php echo $selectDestino?>" <?php //onChange="cargaContenidoMunicipios(this.id)>"?>>
		<option value="" selected="selected">-</option>
		<?php foreach ($todos_los_municipios as $municipio) {?>
				<option value="<?php echo $municipio->get_id()?>"><?php echo $municipio->get_nombre()?></option>
			<?php }?>
	</select>	
<?php } ?>