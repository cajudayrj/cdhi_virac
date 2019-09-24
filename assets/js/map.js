// Initialize and add the map
const mapContainer = document.querySelector('#map');

function initMap() {
    if (mapContainer) {
        // The location of Uluru
        var uluru = { lat: 13.5900749, lng: 124.1933298 };
        // The map, centered at Uluru
        var map = new google.maps.Map(
            mapContainer, { zoom: 15, center: uluru });
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({ position: uluru, map: map });
    }
}