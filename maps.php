<!DOCTYPE html>
<html>
<head>
    <title>Simple Map with Search</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* CSS styles */
        /* Set the body and HTML height to 100% to ensure full screen */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Use flexbox layout to position search container and map */
        body {
            display: flex;
            flex-direction: column;
        }

        #map-container {
            flex: 1;
            position: relative;
        }

        #map {
            height: 100%;
            width: 100%;
        }

        /* Position the search container at the top */
        #search-container {
            position: absolute;
            top: 10px;
            left: 200px; /* Adjust this value according to your layout */
            z-index: 1000;
        }

        #pac-input {
            width: 300px;
            padding: 6px 12px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="search-container">
    <input id="pac-input" type="text" placeholder="Search for a place">
    <button id="search-button">Search</button> <!-- Add a search button -->
</div>
<div id="map-container">
    <div id="map"></div>
</div>

<script>
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat:12.8819585, lng:121.76654050000002 },
            zoom: 8
        });

        // Handle search button click event
        document.getElementById('search-button').addEventListener('click', function() {
            var query = document.getElementById('pac-input').value;
            searchPlaces(query);
        });
    }

    function searchPlaces(query) {
    var myHeaders = new Headers();
    myHeaders.append("X-API-KEY", "8ccee2fb4c5a9e6453663a6e9f00533b7919b05c");
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        "q": query
    });

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    fetch("https://google.serper.dev/places", requestOptions)
        .then(response => response.json())
        .then(result => {
            // Check if the response contains valid latitude and longitude
            if (result.places && result.places.length > 0) {
                var place = result.places[0];
                var lat = place.latitude;
                var lng = place.longitude;
                // Update map center based on fetched latitude and longitude
                map.setCenter({ lat: lat, lng: lng });
                map.setZoom(15); // Optional: Adjust zoom level as needed
            } else {
                console.error("Failed to fetch or parse location data.");
            }
        })
        .catch(error => console.error('Error fetching location:', error));
}
</script>
 <script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v6.6/mapsJavaScriptAPI.js"
    async defer></script>
</body>
</html>
