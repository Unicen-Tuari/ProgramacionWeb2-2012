<?php   
	require_once 'HTML/Template/Sigma.php';
	include_once 'config.php';
	include_once 'DataObjects/Automoviles.php';
	include_once 'DataObjects/Imagenes.php';
	include_once 'DataObjects/Marca.php';

	ini_set('display_errors', '0');     #No muestra los errores
	session_start();

	$marca_post = ($_POST['marca']);
	$descripcion_post = ($_POST['descripcion']);
	$modelo_post = ($_POST['modelo']);
	$valor_post = ($_POST['valor']);

	
	//DB_DataObject::debugLevel(5);
	$marca = new DO_Marca;
	$marca->marcas= $marca_post;
	$marca->find();
	$encontrado=false;
	while ($marca->fetch() && !$encontrado) {
		if ($marca->marcas == "$marca_post"){
			$id_marca=$marca->id;
			$encontrado = true;
			break;
		}
	}

	if(!$encontrado){
		$marca->marcas=$marca_post;
		$marca->Insert();
		$id_marca=$marca->id;
		$encontrado = true;
		break;
	}

	$auto = new DO_Automoviles;
	$auto->modelo=$modelo_post;
	$auto->modelo=$modelo_post;
	$auto->precio=$valor_post;
	$auto->descripcion=$descripcion_post;
	$auto->id_cat=$id_marca;
	$id_auto=$auto->Insert();

	for ($i=1; $i<=3 ; $i++) {
		$nombre = uniqid();
		$ruta_servidor = "fotos";
		$rutaTemp = $_FILES ['foto'.$i]['tmp_name'];
		$nombreImagen = uniqid().'.jpg';
		$rutadestino = $ruta_servidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemp, $rutadestino);


		$imagen = new DO_Imagenes;
		$imagen->ruta = $rutadestino;
		$imagen->id_automoviles = $id_auto;
		$imagen->Insert();
	}


	if($id_auto>0){
		header("location:panel.php");
	}
		echo ("error al cargar auto!");
?>