function initializeMap() {
  var mapOptions = {
    zoom: 3,
    center: new google.maps.LatLng(45, -100),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


}

$(document).ready(function() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?sensor=true&' +
      'callback=initializeMap';
  document.body.appendChild(script);
})
