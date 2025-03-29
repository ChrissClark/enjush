@extends('layout')

@section('title', 'Bienvenido a Salud')

@section('styles')
    <!-- Leaflet Map -->
    <style>
        #map {
            height: 800px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section  class="py-5">
        <div id="hero-carousel" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="..." style="height:400px;">
                    <div class="carousel-caption d-none d-md-block my-5">
                        <h5 class="fs-1">Bienvenido a ENJUSH</h5>
                        <p>Permite la visualización e interpretacion de datos en Salud relaciondos con factores de riesgo ambientales y sociales.</p>
                        <a href="#" class="btn btn-custom">Descubre más</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="..." style="height:400px;">
                    <div class="carousel-caption d-none d-md-block my-5">
                        <h5>Second slide</h5>
                        <p>algun mensaje o nada.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="..." style="height:400px;">
                    <div class="carousel-caption d-none d-md-block my-5">
                        <h5>Third slide</h5>
                        <p>algun mensaje o nada.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!--  -->
    <section class="py-5">
      <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Antineoplastic Agents</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Arsenic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Asbestos</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Diesel Engine Exhaust</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Antineoplastic Agents</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Arsenic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Asbestos</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Diesel Engine Exhaust</figcaption>
          </figure>
        </div>
      </div>
      <div class="text-center my-4">
        <button class="btn btn-danger">Todos los perfiles</button>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <img src="https://via.placeholder.com/100" alt="Feature 1" class="img-fluid">
                    <h3>Consultas en línea</h3>
                    <p>Accede a consultas médicas desde la comodidad de tu hogar.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <img src="https://via.placeholder.com/100" alt="Feature 2" class="img-fluid">
                    <h3>Historial de salud</h3>
                    <p>Accede fácilmente a tu historial médico y seguimiento de tratamientos.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <img src="https://via.placeholder.com/100" alt="Feature 3" class="img-fluid">
                    <h3>Recordatorios personalizados</h3>
                    <p>Recibe alertas sobre citas médicas y toma de medicamentos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mapa con Poligonoes -->
    <section class="mb-5">
        <h2 class="text-center">Mapa de Polígonos</h2>
        <div id="map"></div>
    </section>
@endsection

@section('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
      // Crear el mapa y centrarlo en coordenadas predeterminadas
      var map = L.map('map').setView([22.1521, -100.9733], 6); // SLP como centro

      // Añadir capa de mapa de OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      // Array de puntos desde la base de datos
      var puntos = @json($empresas);

      // Variable para almacenar las coordenadas del polígono
      var coordenadasPoligono = [];

      // Recorrer los puntos y agregarlos como vértices del polígono
      puntos.forEach(function(punto) {
        coordenadasPoligono.push([punto.latitud, punto.longitud]);

        // Opcional: Si quieres seguir mostrando los marcadores junto con el polígono
        L.marker([punto.latitud, punto.longitud])
          .addTo(map)
          .bindPopup(`<strong>${punto.nombre}</strong><br>Tasa Cancer: <b>${punto.cancer}</b><br>porc CarenciaSS: <b>${punto.carenciaSS}</b><br>Lat: ${punto.latitud}, Lon: ${punto.longitud}`);
      });
      
      // Se lee un archivo json o geojson para poderlo graficar
      var url = "http://localhost/salud/salud/public/js/SLP-coor.json";
      fetch(url).then(res => res.json()).then(data => L.geoJSON(data).addTo(map))

      // Crear el polígono con los puntos adyacentes
      /*var poligono = L.polygon(coordenadasPoligono, {
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
      }).addTo(map);*/

      // Opcional: centrarse en el polígono
      //map.fitBounds(poligono.getBounds());

    </script>
@endsection
