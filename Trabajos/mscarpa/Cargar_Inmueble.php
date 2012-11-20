<?php   
		require_once 'HTML/Template/Sigma.php';
		include_once 'config.php';
		include_once 'DataObjects/Foto.php';
		include_once 'DataObjects/Propiedad.php';
		include_once 'DataObjects/Tipo.php';
		include("autorizacion.php");
		require_once('Image/Transform.php');

		//incluyo sigma
		$template = new HTML_Template_Sigma('.');
		$error=$template->loadTemplateFile("/templates/carga_inm.html");
		include_once 'comun.php';
	if(!$_POST){ 

		$template->show();

	}else{

		//cargo las posibles notificaciones
		$notificacion = new HTML_Template_Sigma('.');
		$error=$notificacion->loadTemplateFile("/templates/notificaciones.html", true, true);
		
		//recivo del post
		$titulo = ($_POST['titulo']);
		$descripcion = ($_POST['descripcion']);
		$valor = ($_POST['valor']);
		$tipo_post = ($_POST['tipo']);
		

		//Busco el tipo y lo cargo si no esta
		$tipe = new tipo;
		$tipe->Tipo=$tipo_post;
		$tipe->find();
		$encontrado=false;
		while ($tipe->fetch() && !$encontrado) {
			if ($tipe->Tipo == "$tipo_post"){
				$idtipo=$tipe->ID;
				$encontrado = true;
				break;
			}
		}
		if(!$encontrado){
			$tipe->Tipo=$tipo_post;
			$tipe->Insert();
			$idtipo=$tipe->ID;
			$encontrado = true;
			break;
		}
	
		//cargo los datos de la propiedad en la base

		$propiedad = new propiedad;
		$propiedad->Titulo=$titulo;
		$propiedad->Descripcion=$descripcion;
		$propiedad->Valor=$valor;
		$propiedad->Foto_FK=$idfoto;
		$propiedad->TIPO_FK=$idtipo;
		$id=$propiedad->Insert();

		//cargo la foto 
		//guardo la imagen en un carpeta en mi servidor y guado la ruta para cargarla en la base.
		for ($i=1; $i<=3 ; $i++) {
			$nombre = uniqid();
			$ruta_servidor = "image";
			$rutaTemp = $_FILES ['foto'.$i]['tmp_name'];
			$nombreImagen = uniqid().'.jpg';
			$rutadestino = $ruta_servidor.'/'.$nombreImagen;
			move_uploaded_file($rutaTemp, $rutadestino);

			$origen = '/image/' . $nombreImagen;
			$destino = '/image/img_chicas/' . $nombreImagen;
			//copy($origen, $destino);

			$it = Image_Transform::factory();
			$it->load($origen);
			$it->scaleByLength(160);
			$it->save($destino);

			$foto = new foto;
			$foto->URL=$rutadestino;
			$foto->Nombre=$nombreImagen;
			$foto->PROP_FK=$id;
			$foto->Insert();
		}
	
		//verifico si se inserto en la DB
		if($id > 0){
			$template->setVariable('claseNotificacion', "success");
			$template->setVariable('mensajeNotificacion', "Se inserto correctamente");
			$template->setVariable('descripcionNotificacion', "");
			
		}
		else{
		$template->setVariable('claseNotificacion', "error");
			$template->setVariable('mensajeNotificacion', "No se insertó correctamente");
			$template->setVariable('descripcionNotificacion', "");
			
		}
		$template->parse("notificacion");
		$template->show();

	}
?>	