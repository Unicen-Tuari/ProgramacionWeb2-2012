<?php 
require_once 'config.php';
require_once 'DataObjects/exposicion.php';
require_once 'HTML/Template/Sigma.php';

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/head.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/superior.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/barramenu.html");
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/mostrar_fotos_exposicion.html");
$expo = new DO_Exposicion();
$expo->idexposicion=$_GET["id"];
$expo->find();
$expo->fetch();

$id_exposicion=$expo->idexposicion;
$directorio_foto="imagenes/exposiciones/$id_exposicion";

$dir=opendir($directorio_foto."/miniaturas/"); // Leo todos los ficheros de la carpeta, en este caso fotos
while ($elemento=readdir($dir)){
		 // Tratamos los elementos . y .. que tienen todas las carpetas
		        if( $elemento != "." && $elemento != ".."){
		            // Si es una carpeta
		            if( is_dir($path.$elemento) ){
		                // Muestro la carpeta
		               // echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
		            // Si es un fichero
		            } else {
		                // Muestro la foto
		                $tpl->setVariable('foto_grande',$directorio_foto."/$elemento");
		                $tpl->setVariable('foto_miniatura',$directorio_foto."/miniaturas/$elemento");
		                $tpl->parse('fotos_exposicion');
		            }
			
		        }	
}
/*while ($expo->fetch()){
	$id_exposicion=$expo->idexposicion;
	$link_exposicion="productos.php?id=$id_exposicion";
	$tpl->setVariable('link_exposicion',$link_exposicion);
	$titulo=$expo->titulo;
	$tpl->setVariable('titulo_exposicion',$titulo);
	$foto_portada="imagenes/exposiciones/$id_exposicion/miniaturas/1.jpg";
	$tpl->setVariable('foto_portada',$foto_portada);
	$tpl->parse('fotos_exposicion');//el begin y end de template en mostrar_fotos_exposicion
}*/
$tpl->show();

$tpl = new HTML_Template_Sigma('.');
$error = $tpl->loadTemplateFile("/templates/footer.html");
$tpl->show();


?>