
var google;

var map;
function initMap() {
    var myLatLng = {lat: 54.680542, lng: 25.285915};

    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 16
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Restoranas'
  });

}
