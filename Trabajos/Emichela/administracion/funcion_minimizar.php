<?php 
function generar_archivos_imagenes($imagen,$proximo_id,$nrofoto){
	$archivo_temporal="imgs/temp/tmp.jpg";
	copy($imagen,$archivo_temporal);//copio la imagen temporal
	generar_imagen($archivo_temporal,600,450,$proximo_id."_".$nrofoto.".jpg");//creo una version para mostrar
	generar_imagen($archivo_temporal,90,65,"thumbnails/".$proximo_id."_".$nrofoto.".jpg");//creo el thumbnail
	unlink($archivo_temporal);//borro el archivo temporal generado
}
function generar_imagen($imagen,$ancho,$alto,$nombre_final){	
	$anchura=$ancho;//maximo ancho de la imagen
	$hmax=$alto;//maximo alto de la imagen
	$datos = getimagesize($imagen);//obtengo las medidas de la imagen
	if($datos[2]!=2){//si no es .jpg salgo automaticamente
		return false;
	} else {//si es jpg
		$img = @imagecreatefromjpeg($imagen);//obtengo la info de la imagen
	}
	$ratio = ($datos[0] / $anchura);
	$altura = ($datos[1] / $ratio);
	if($altura>$hmax){//si me exedo de la altura maxima permitida
		$anchura2=$hmax*$anchura/$altura;//la recalculo
		$altura=$hmax;
		$anchura=$anchura2;
	}
	$thumb = imagecreatetruecolor($anchura,$altura);//creo el thumb en truecolor
	
	imagecopyresampled($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);
	//copio los cambio realizados a la imagen en memoria
	
	imagejpeg($thumb, $nombre_final, 100);//copio la imagen generada al archivo fisico
	
	imagedestroy($thumb);//libero memoria
	return true;//salio todo ok
}
?>