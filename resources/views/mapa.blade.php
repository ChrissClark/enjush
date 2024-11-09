<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mapa con Polígonos</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    
    <!-- Bootstrap CSS (Opcional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Mapa de Polígonos</h1>
    <div id="map"></div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    // Crear el mapa y centrarlo en coordenadas predeterminadas
    var map = L.map('map').setView([40.7128, -74.0060], 5); // Nueva York como centro

    // Añadir capa de mapa de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Array de puntos desde la base de datos
    var puntos = @json($puntos);

    // Variable para almacenar las coordenadas del polígono
    var coordenadasPoligono = [];

    // Recorrer los puntos y agregarlos como vértices del polígono
    puntos.forEach(function(punto) {
        coordenadasPoligono.push([punto.latitud, punto.longitud]);

        // Opcional: Si quieres seguir mostrando los marcadores junto con el polígono
        L.marker([punto.latitud, punto.longitud])
            .addTo(map)
            .bindPopup(`<strong>${punto.nombre}</strong><br>Lat: ${punto.latitud}, Lon: ${punto.longitud}`);
    });

    // Crear el polígono con los puntos adyacentes
    var poligono = L.polygon(coordenadasPoligono, {
        color: 'blue', // Color del borde del polígono
        fillColor: '#007bff', // Color de relleno
        fillOpacity: 0.5 // Opacidad del relleno
    }).addTo(map);

    coordenadasPoligono = [];
    coordenadasPoligono.push([41.8781, -87.6298], [32.7767, -96.7970], [25.7617, -80.1918]);
    // Crear el polígono con los puntos adyacentes
    var poligono = L.polygon(coordenadasPoligono, {
        color: 'red', // Color del borde del polígono
        fillColor: '#7b00ff', // Color de relleno
        fillOpacity: 0.5 // Opacidad del relleno
    }).addTo(map);

    // Opcional: centrarse en el polígono
    map.fitBounds(poligono.getBounds());

</script>

</body>
</html>
