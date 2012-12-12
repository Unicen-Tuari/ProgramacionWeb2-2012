function init(){

    var latlng = new google.maps.LatLng(-38.020548, -57.589079);   
    var myOptions = {
                     zoom: 16,
                     center: latlng,
                     mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("mapa"), myOptions);
    var domicilio = 'Cuba 1048, Tandil, Buenos Aires, Argentina';
    setUbicacion(domicilio);
  
  }

function setUbicacion(ubicacion) {
      
 geocoder = new google.maps.Geocoder();
 geocoder.geocode( { 'address': ubicacion}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
       map.setCenter(results[0].geometry.location);
       new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    title: 'DgM Insumos'+'\n'+ubicacion,
                    animation: google.maps.Animation.DROP
       });
    } else {
       alert("Imposible establecer ubicación - Error:" + status);
      }
    });
}

