

// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];

function initialize() {
  var haightAshbury = new google.maps.LatLng(-4.261165, -55.988388);
  var mapOptions = {
    zoom: 14,
    center: haightAshbury,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('mapa'),
      mapOptions);

  // This event listener will call addMarker() when the map is clicked.
  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng);
  });

  addMarker();

  // Adds a marker at the center of the map.
  //addMarker(haightAshbury);
}

// Add a marker to the map and push to the array.
function addMarker() {

  var latitude_map = document.getElementById('latitude').value;
  var longitude_map = document.getElementById('longitude').value;

  if(latitude_map.value!='' && longitude_map.value!=''){
    deleteMarkers();
    var ponto = { "id": 1987, "latitude": latitude_map , "longitude": longitude_map, "tipo": "venda", "descricao": "Descrição do ponto"};
    JSON.stringify(ponto);

    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
      icon: '../../../img/marcador.png',
      map: map
    });
    markers.push(marker);
  }
}

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

google.maps.event.addDomListener(window, 'load', initialize);

