<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RentalX - Map</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f4f4f4;
      color: #333;
    }

    header {
      background-color: #1e90ff;
      color: white;
      padding: 15px 20px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    h2 {
      text-align: center;
      margin: 20px 0;
      font-size: 28px;
      color: #1e90ff;
    }

    /* Fullscreen map */
    #map {
      height: 80vh; /* 80% of viewport height */
      width: 90%;
      max-width: 1200px;
      margin: 0 auto 40px auto;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      display: block;
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 15px;
      background: #1e90ff;
      color: white;
      font-size: 16px;
    }

    /* Popup styling (optional) */
    .leaflet-popup-content {
      font-weight: bold;
      color: #1e90ff;
    }

  </style>
</head>
<body>

<header>
  RentalX Car Rental Locations - Mumbai
</header>

<h2>Our Rental Locations</h2>
<div id="map"></div>

<footer>
  © 2026 RentalX. All rights reserved.
</footer>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  // Initialize map centered on Mumbai
  var map = L.map('map').setView([19.0760, 72.8777], 12);

  // Add OpenStreetMap tiles
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  // Sample rental locations in Mumbai
  var rentalLocations = [
    {name: "Bandra Rental", coords: [19.0544, 72.8404]},
    {name: "Andheri East Rental", coords: [19.1190, 72.8460]},
    {name: "Colaba Rental", coords: [18.9219, 72.8347]},
    {name: "Powai Rental", coords: [19.1170, 72.9095]},
    {name: "Dadar Rental", coords: [19.0187, 72.8479]}
  ];

  // Add markers to map
  rentalLocations.forEach(function(loc){
    L.marker(loc.coords).addTo(map)
      .bindPopup('<b>' + loc.name + '</b><br>Car rental available.')
  });
</script>

</body>
</html>