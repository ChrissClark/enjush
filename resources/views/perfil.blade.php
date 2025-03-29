@extends('layout')

@section('title', 'Perfil')

@section('styles')
  <style>
    h1, h2, h3, h4, h5, h6 {
      color: #007bff;
    }
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
@endsection

@section('content')
  <!--  -->
  <section class="my-3">
    <nav>
      <div class="nav nav-underline nav-justified" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-fuente-tab" data-bs-toggle="tab" data-bs-target="#nav-fuente" role="tab" aria-controls="nav-fuente" aria-selected="true">Fuente de Exposición</button>
        <button class="nav-link" id="nav-recursos-tab" data-bs-toggle="tab" data-bs-target="#nav-recursos" role="tab" aria-controls="nav-recursos" aria-selected="false">Recursos</button>
      </div>
    </nav>
    <!-- Fuente de exposicion -->
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active py-4" id="nav-fuente" role="tabpanel" aria-labelledby="nav-fuente-tab" tabindex="0">
        <div class="row g-3">
          <div class="col-md-2">
            <b class="fw-bold text-uppercase">Contenido</b>
            <nav class="nav flex-column">
              <a class="flex-sm-fill nav-link active" href="#Carcinogens">Información general</a>
              <a class="flex-sm-fill nav-link" href="#Exposures">Sustancia que emite</a>
              <a class="flex-sm-fill nav-link" href="#Environmental">Efectos en Salud</a>
              <a class="flex-sm-fill nav-link" href="#Occupational">Regulación y Normas</a>
              <a class="flex-sm-fill nav-link" href="#Exposure">Localización</a>
            </nav>
            <p class="mt-3">Cómo ENJUSH obtuvo esta información?</p>
            <a href="">Llevar a descripcion de metodologias</a>
          </div>
          <!-- Contenido -->
          <div class="col-md-10">
            <h1 class="">{{$subsector->nombre}}</h1>
            <div class="py-3">
              <h2 class="fs-4">Informacion genral</h2>
              <p>1-Bromopropane is an organic solvent that is a colourless or pale yellow liquid with a strong, sweet odour.[1]  It is used as a solvent in many industries, and in the past it has also been used as a chemical intermediate to produce other substances, including pesticides and fragrances.[2] 1-Bromopropane may also be referred to as propyl bromide or n-propyl bromide. There are numerous other synonyms and product names; see the Hazardous Substances Data Bank for more information.</p>
            </div>
            <div class="py-3">
              <h2 class="fs-4">Sustancia que emite</h2>
              <div class="list-group list-group-flush">
                @foreach($subsector->sustancias->unique('nombre')->sortBy('nombre') as $sustancia)
                  <a href="{{route('sustancias.index')}}" class="list-group-item list-group-item-action">{{$sustancia->nombre}}</a>
                @endforeach
              </div>
            </div>
            <div class="py-3">
              <h2 class="fs-4">Efectos en Salud</h2>
            </div>
            <div class="py-3">
              <h2 class="fs-4">Regulación y Normas</h2>
            </div>
            <div class="py-3">
              <h2 class="fs-4">Localización</h2>
              <div id="map"></div>
            </div>
            <div class="accordion my-3" id="AnPC-accor">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Bibliografía
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#AnPC-accor">
                  <div class="accordion-body">
                    We would like to acknowledge the significant contributions of many CAREX team members who have moved on to other assignments: <br>

                    Shelby Fenton Occupational exposure estimates; COVID-19 media surveillance.<br>

                    Alison Palmer Leadership; strategic operations; communications; knowledge mobilization.<br>

                    Sajjad Fazel Safe handling of antineoplastic agents; sun safety messaging.<br>

                    Amy Hall Occupational exposure estimates.<br>

                    Paleah Black Moher Environmental exposures; pesticide estimates; First Nations KT.<br>

                    Eleanor Setton Leadership; environmental exposures estimates; First Nations KT.<br>

                    Chantal Burnett Occupational exposure estimates; profile development and updates.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Recursos del Perfil -->
      <div class="tab-pane fade" id="nav-recursos" role="tabpanel" aria-labelledby="nav-recursos-tab" tabindex="0">
        <h2 class="fs-4">Publicaciones</h2>
        <h3 class="fs-5">Videos</h3>
        <h3 class="fs-5">Reducción de exposición</h3>
        <p>Our team has performed a detailed scan of exposure control resources and assembled a compilation of key publications and resources. These are organized by type of exposure (environmental or occupational) and by specificity (general or carcinogen-specific). Please visit our Exposure Reduction Resources page to view.</p>
      </div>
    </div>
  </section>
  <!--  -->
  <section>
  </section>
@endsection

@section('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Crear el mapa y centrarlo en coordenadas predeterminadas
        var map = L.map('map').setView([22.1521, -100.9733], 12); // SLP como centro

        // Añadir capa de mapa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Array de puntos desde la base de datos
        var puntos = [];// @ json($puntos);

        // Variable para almacenar las coordenadas del polígono
        var coordenadasPoligono = [];

        // Recorrer los puntos y agregarlos como vértices del polígono
        puntos.forEach(function(punto) {
            //coordenadasPoligono.push([punto.latitud, punto.longitud]);

            // Opcional: Si quieres seguir mostrando los marcadores junto con el polígono
            L.marker([punto.latitud, punto.longitud])
                .addTo(map)
                .bindPopup(`<strong>${punto.nombre}</strong><br>Lat: ${punto.latitud}, Lon: ${punto.longitud}`);
        });

        // Crear el polígono con los puntos adyacentes
        /*var poligono = L.polygon(coordenadasPoligono, {
            color: 'blue', // Color del borde del polígono
            fillColor: '#007bff', // Color de relleno
            fillOpacity: 0.5 // Opacidad del relleno
        }).addTo(map);*/

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
@endsection
