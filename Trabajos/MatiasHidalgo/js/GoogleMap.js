var taller = new google.maps.LatLng(-37.329466047114906, -59.12573039531708);

function initialize() {
	var Opciones = {
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  draggable: false,
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),Opciones);
	
	infowindow = new google.maps.InfoWindow({
		content: 'Aqui tenemos nuestras instalaciones con atencion al publico en general. <br/>Nuestro horario actualmente es de 9 a 13hs <br/>Por consultas dirigirse a la seccion Contacto <a href="contacto.php">Aqui</a>',
		position: taller,
	});
	
	//Marco la posicion de Taller para Ubicar a los visitantes
	placeMarker(taller, map, "Nosotros estamos Aqui");
	map.setCenter(taller);
}
	
	
//agrega un marker al mapa
function placeMarker(position, map, titulo) {
	var marker = new google.maps.Marker({
		position: position,
		map: map,
		title: titulo,
	});
	
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,this);
	});
}