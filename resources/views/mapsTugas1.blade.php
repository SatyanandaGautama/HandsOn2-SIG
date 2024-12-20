<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwlgebS3bplkEr9NEFBhut66Xo-m4muW4"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            color: white;
        }

        h1 {
            text-align: center;
            padding: 10px;
            color: white;
        }

        .maps-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .map-wrapper {
            flex: 1 1 400px;
            max-width: 45%;
            min-width: 300px;
        }

        #leaflet-map,
        #google-map {
            height: 400px;
            width: 100%;
            border: 1px solid white;
        }

        h3 {
            text-align: center;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Hands On 1</h1>
    <div class="maps-container">
        <div class="map-wrapper">
            <h3>Peta Leaflet.js</h3>
            <div id="leaflet-map"></div>
        </div>
        <div class="map-wrapper">
            <h3>Peta Google Maps API</h3>
            <div id="google-map"></div>
        </div>
    </div>

    <script>
        //---Leaflet.js MAP---//
        const leafletMap = L.map('leaflet-map').setView([-8.656042, 115.2137391], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(leafletMap);
        //---Marker untuk Kantor Walikota Denpasar---//
        const markerDenpasar = L.marker([-8.656042, 115.2137391]).addTo(leafletMap);
        markerDenpasar.bindPopup("<b>Kantor : Walikota Denpasar</b>").openPopup();
        markerDenpasar.on('click', () => {
            leafletMap.setView([-8.656042, 115.2137391], 13);
            markerDenpasar.openPopup();
        });

        //---Google Maps API MAP---// 
        const googleMapDiv = document.getElementById('google-map');
        const googleMap = new google.maps.Map(googleMapDiv, {
            center: {
                lat: -8.656042,
                lng: 115.2137391
            },
            zoom: 10,
        });
        //---Marker untuk Rektorat Universitas Udayana---// 
        const googleMarker = new google.maps.Marker({
            position: {
                lat: -8.7984047,
                lng: 115.1698715
            },
            map: googleMap,
            title: "Kantor : Rektorat Universitas Udayana",
        });
        // Info Window yang berisi title marker
        const googleInfoWindow = new google.maps.InfoWindow({
            content: "<div style='color: black; font-weight: bold;'>Kantor : Rektorat Universitas Udayana</div>",
        });
        // Saat Marker di klik akan menampilkan InfoWindow
        googleMarker.addListener('click', () => {
            googleMap.setZoom(13);
            googleInfoWindow.open(googleMap, googleMarker);
            googleMap.setCenter(googleMarker.getPosition());
        });
    </script>
</body>

</html>
