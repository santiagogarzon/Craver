var mapLocation = new google.maps.LatLng(-31.298287, -64.288546); //change coordinates here
var marker;
var map;
function initialize() {
    var mapOptions = {
        zoom: 16, // Change zoom here
        center: mapLocation,
        scrollwheel: false,
        styles: [
            {"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#333333"}]},
            {"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},
            {"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},
            {"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"off"}]},
            {"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},
            {"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#f6954d"}]},
            {"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#e3e2e2"}]},
            {"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},
            {"featureType":"water","elementType":"all","stylers":[{"color":"#a4c4c8"},{"visibility":"on"}]}]
    };
    
    map = new google.maps.Map(document.getElementById('map'),
    mapOptions);
    
     
    //change address details here
    var contentString = '<div class="map-info">' 
    + '<div class="map-title">' 
    + '<p class="map-address">'
    + '<div class="map-address-row">'
    + '  <i class="fa fa-map-marker"></i>'
    + '  <span class="text"><strong>Cordoba, Argentina.</strong><br>'
    + '  Río de Janeiro, Villa Allende</span>'
    + '</div>' 
    + '<p class="gmap-open"><a href="https://www.google.com.ar/maps/place/Estudio+de+Arquitectura+CRAVER/@-31.2984564,-64.2907557,17z/data=!3m1!4b1!4m12!1m6!3m5!1s0x94329c5800623941:0x697b501373d6ad17!2sEstudio+de+Arquitectura+CRAVER!8m2!3d-31.298461!4d-64.288567!3m4!1s0x94329c5800623941:0x697b501373d6ad17!8m2!3d-31.298461!4d-64.288567" target="_blank">Abrir Google Maps</a></p></div>';
    
    
    var infowindow = new google.maps.InfoWindow({
        content: contentString,
    });
    

    // Uncomment down to show Marker


    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        title: 'Craver', //change title here
        animation: google.maps.Animation.DROP,
        position: mapLocation
    });



    // Uncomment down to show info window on marker

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });




}

if ($('#map').length) {
    google.maps.event.addDomListener(window, 'load', initialize);
}

