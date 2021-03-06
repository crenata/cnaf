<!DOCTYPE html>
<html>
<head>
    <title>Localizing the Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    // This example displays a map with the language and region set
    // to Japan. These settings are specified in the HTML script element
    // when loading the Google Maps JavaScript API.
    // Setting the language shows the map in the language of your choice.
    // Setting the region biases the geocoding results to that region.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {lat: 35.717, lng: 139.731}
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&language=ja&region=JP"
        async defer>
</script>
</body>
</html>