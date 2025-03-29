<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Leaflet y DataTables</title>

    <!-- Bootstrap y DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map { height: 400px; }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Mapa con Leaflet, DataTables y Chart.js</h2>

    <!-- Mapa -->
    <div id="map"></div>

    <!-- Tabla -->
    <table id="tablaPuntos" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>idMunicipio</th>
                <th>idSubsector</th>
                <th>Latitud</th>
                <th>Longitud</th>
            </tr>
        </thead>
    </table>

    <!-- Gráfico -->
    <canvas id="grafico"></canvas>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // Inicializar el mapa
    /*var map = L.map('map').setView([22.1521, -100.9733], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    function cargarPoligonos(bounds) {
        $.getJSON('/api/getPolygonsByBounds', {
            northEast: bounds.getNorthEast().lat + ',' + bounds.getNorthEast().lng,
            southWest: bounds.getSouthWest().lat + ',' + bounds.getSouthWest().lng
        }, function(data) {
            data.forEach(punto => {
                L.marker([punto.latitud, punto.longitud]).addTo(map)
                    .bindPopup(`<strong>${punto.nombre}</strong><br>${punto.ubicacion}`);
            });
        });
    }

    // Cargar polígonos en función del área visible
    map.on('moveend', function() {
        cargarPoligonos(map.getBounds());
    });*/

    // Inicializar DataTables con AJAX
    $(document).ready(function() {
        /**/$('#tablaPuntos').DataTable({
            processing: true,
            serverSide: true,
            ajax: "http://localhost/salud/salud/public/api/getPuntos",
            columns: [
                { data: "id" },
                { data: "nombre" },
                { data: "idMunicipio" },
                { data: "idSubsector" },
                { data: "latitud" },
                { data: "longitud" }
            ]
        });

        // Cargar datos en Chart.js
        $.getJSON('http://localhost/salud/salud/public/api/getPolygonData', function(response) {
            var ctx = document.getElementById('grafico').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.labels,
                    datasets: [{
                        label: 'Cantidad de Puntos por Ubicación',
                        data: response.data,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'blue',
                        borderWidth: 1
                    }]
                }
            });
        });
    });
</script>

</body>
</html>
