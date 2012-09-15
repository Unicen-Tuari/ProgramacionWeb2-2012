<?php
function fecha_actual(){
	setlocale(LC_ALL, 'Spanish_Spain.28605');
    $fecha=strftime('%A, %d de %B de %Y', time());
    $fecha[0]=strtoupper($fecha[0]);//pongo en mayusculas la primer letra
    return $fecha;//devuelve un string del estilo "Martes, 03 de julio de 2012"
} 
function capitalizar($texto){
	return ucwords(strtolower($texto));
}
function normalizar ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
function url_amigable($texto){
	$texto=normalizar($texto);
	return $texto;
}
/*
function agregar_class_current($link){//ejemplo: agregar_class_current("index.php") o agregar_class_current("index.php, home.php, inicio.php")
	$directorio="/estudioargeri/"; //directorio actual
	$url=$_SERVER['REQUEST_URI'];
	$aux=explode("?",$url);
	$nombre_archivo=$aux[0];
	$aux=explode(", ",$link);//varios archivos separados por ", "
	foreach ($aux as $valor) {
    if ($nombre_archivo=="$directorio$valor") echo 'class="current"';
	}	
}
*/
?>