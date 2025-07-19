@extends('layout')

@section('title', 'Escenario de Exposición')

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">

  <style>
    h1, h2, h3, h4, h5, h6 {
      color: #007bff;
    }
    #map {
      height: 800px;
      width: 100%;
    }
  </style>
@endsection

@section('content')
  <!-- Header Menu and Whst is -->
  <header>
    <div class="row">
      <div class="col-md-3">
        <b class="fw-bold text-uppercase">Contenido</b>
        <nav class="nav flex-column">
          <a class="flex-sm-fill nav-link active" aria-current="page" href="#Carcinogens">Classifying Carcinogens</a>
          <a class="flex-sm-fill nav-link" href="#Exposures">Prioritizing Canadians’ Exposures</a>
          <a class="flex-sm-fill nav-link" href="#Environmental">Environmental Approach</a>
          <a class="flex-sm-fill nav-link" href="#Occupational">Occupational Approach</a>
          <a class="flex-sm-fill nav-link" href="#Exposure">Canadian Workplace Exposure Database</a>
        </nav>
      </div>
      <div class="col-md-9 border-bottom ps-md-4">
        <h1>Escenario de Exposición</h1>
        <p>CCDISAA ha creado perfiles que las clasifican diferentes vias de emposiocion y funetes toxicas en el ambiente, loscuales estan relacionados con diversas enfermedades cronico degenerativas.</p>
        <p>Cada perfil enlista las sustancias tóxicas, usos, información,sitios de exposición y efecto en salud asociado.</p>
      </div>
    </div>
  </header>
  <!-- Estados y ciudades -->
  <div class="row my-3">
    <div class="col-md-6">
      <div class="form-floating">
        <select id="Estado" class="form-select" aria-label="Estado a consultar" onchange="muestaMunicipios()">
          <option selected>Estado a consultar</option>
          @foreach($estados as $estado)
            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
          @endforeach
        </select>
        <label for="Estado">Selecciona un Estado</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <select id="Municipio" class="form-select" aria-label="Municipio a consultar" onchange="empresasMunicipio()">
          <option selected>Municipio a consultar</option>
          @foreach($estados as $estado)
            <optgroup label="{{$estado->nombre}}" class="d-none" data-filter="{{$estado->id}}">
              @foreach($estado->municipios as $municipio)
                <option value="{{route('municipoEmpresas', $municipio->id)}}" class="d-none" data-filter="{{$municipio->idEstado}}">{{$municipio->nombre." (".$municipio->empresas->count().")"}}</option>
              @endforeach
            </optgroup>
          @endforeach
        </select>
        <label for="Municipio">Selecciona un Municipio</label>
      </div>
    </div>
  </div>
  <!-- Sectores -->
  <section class="my-3">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        @foreach($sectores as $sector)
          <button class="nav-link {{$loop->first ? 'active' : ''}}" id="nav-{{$sector->id}}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$sector->id}}" type="button" role="tab" aria-controls="nav-{{$sector->id}}" aria-selected="false">{{$sector->nombre}}</button>
        @endforeach
      </div>
    </nav>
    <!-- Contenido de las exposiciones -->
    <div class="tab-content" id="nav-tabContent">
      <!-- Sectores con sus subsectores -->
      @foreach($sectores as $sector)
        <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="nav-{{$sector->id}}" role="tabpanel" aria-labelledby="nav-{{$sector->id}}-tab" tabindex="0">
          @foreach($sector->subsectores->sortBy('nombre') as $subsector)
            <a href="{{route('subsectores.show', [$subsector->id])}}">
              <figure class="figure text-center m-2 m-xl-3" style="width:300px;">
                <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="{{$subsector->nombre}}">
                <figcaption class="figure-caption fs-5 text-center">{{$subsector->nombre}}</figcaption>
              </figure>
            </a>
          @endforeach
        </div>
      @endforeach
    </div>
  </section>
  <!-- Mapa -->
  <section>
    <div class="">
      <div id="map"></div>
    </div>
  </section>
  <!-- Tabla de las empresas -->
  <section>
    <div class="table-responsive my-3">
      <table id="Empresas" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Municipio</th>
            <th>Subsector</th>
            <th>Sector</th>
          </tr>
        </thead>
        <tbody>
          @foreach($empresas as $empresa)
            <tr>
              <th>{{$empresa->nombre}}</th>
              <th>{{$empresa->ubicacion()}}</th>
              <th>{{$empresa->subsector->sector->nombre}}</th>
              <th>{{$empresa->subsector->nombre}}</th>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
  <!--  -->
  <section id="Carcinogens" class="py-3">
    <h2>Classifying Carcinogens</h2>
    <div class="row">
      <div class="col col-md-6">
        <p>
          CAREX Canada classifies carcinogens based on evaluations made by the International Agency for Research on Cancer (IARC). IARC has classified more than 1,000 agents into different groups based on their carcinogenicity to humans. These agents include pure chemicals and chemical mixtures, occupational exposures, physical agents, biological agents, and lifestyle factors.

          The most important IARC carcinogen categories for CAREX Canada are Group 1 and Group 2A. Group 1 agents were evaluated by IARC as “carcinogenic to humans” based on “sufficient evidence of carcinogenicity in humans.” Carcinogens such as asbestos, benzene, wood dust, and diesel exhaust are Group 1 agents. The Group 2A category includes agents that are “probably carcinogenic to humans” based on “limited evidence of carcinogenicity in humans and sufficient evidence of carcinogenicity in experimental animals.” Carcinogens/exposures such as shiftwork, creosotes and acrylamide are Group 2A agents.

          IARC Group 2B agents are “possibly carcinogenic humans” for which there is “limited evidence of carcinogenicity in humans and less than sufficient evidence of carcinogenicity in experimental animals.” Some pesticides used in Canada, such as Chlorothalonil and MCPP, fall into this category.

          IARC also considers mechanistic data when assessing the carcinogenicity of different hazards. Ten key characteristics of carcinogens have been identified by IARC and can be found here.
        </p>
      </div>
      <div class="col col-md-6">
        <p>
          Overall, CAREX Canada aims to determine where Canadian exposures to carcinogens are occurring, the number of Canadians exposed to different carcinogens and their levels of exposure. One of our first tasks was to prioritize which agents to focus on, as many IARC classified agents occur in environmental and occupational settings in Canada. CAREX Canada categorized IARC agents into four priority groups: immediate high priority; possible high priority; moderate priority with further substantial investigation warranted; and low priority with no evidence of use in Canada. There were three criteria considered in this prioritization process:

          The carcinogenicity and other toxic properties of the agent.
          The prevalence of exposure in Canada.
          The feasibility of assessing exposure in Canada.
          Two documents, one for environmental and one for occupational carcinogens, have been produced to summarize the prioritization methods and results in detail:

          Occupational Priorities Report [PDF]
          Environmental Priorities Report [PDF]
        </p>
      </div>
    </div>
  </section>
  <section id="Exposures" class="py-3">
    <h2>Prioritizing Canadians’ Exposures</h2>
    <p>
      Our goal is to estimate Canadians’ potential exposures to the most common known or suspected carcinogens in community settings outside of work. This includes exposures via outdoor air, indoor air and dust at home, drinking water, and foods and beverages. We use a risk-based approach to produce indicators of potential lifetime excess cancer risk circa 2011. This allows us to compare substances and exposure pathways, and supports priority setting for exposure reduction or elimination activities. The indicators typically show a national average and maximum lifetime excess cancer risk, based on actual measured data, for each substance and exposure pathway.


      Potential lifetime excess cancer risk is calculated by multiplying intake (the amount inhaled or ingested) by a cancer potency factor or unit risk factor. For most substances, we estimated average and maximum intake using standard breathing and ingestion rates along with average and maximum measured levels in each exposure pathway (except food and beverages).

      The indicators are general estimates, and do not represent an actual risk for any specific Canadian. We assume that exposure occurs at the same level, 24 hours per day, for 70 years. This is rarely true for any single individual, but using a standard set of assumptions allows us to provide a relative ranking for known and suspected carcinogens across exposure pathways. At any one place, measured levels may change due to changes in source emissions. For any one person, intake may change over time, or as they move from place to place or change their habits.

      We have also developed highly detailed maps of known and suspected carcinogen concentrations in outdoor air across Canada.

      More information on these methods are available in the documents below:

      Methods for Lifetime Excess Cancer Risk Estimates – Environmental Exposures [PDF] *Applies to all LECR estimates except asbestos and radon
      Asbestos Methods for Lifetime Excess Cancer Risk Estimates – Environmental Exposures [PDF]
      Radon Methods for Lifetime Excess Cancer Risk Estimates – Environmental Exposures [PDF]
      Mapping Methods [PDF]
    </p>
  </section>
  <section id="Occupational" class="py-3">
    <h2>Environmental Approach</h2>
    <p>
      Our goal is to estimate Canadians’ potential exposures to the most common known or suspected carcinogens in community settings outside of work. This includes exposures via outdoor air, indoor air and dust at home, drinking water, and foods and beverages. We use a risk-based approach to produce indicators of potential lifetime excess cancer risk circa 2011. This allows us to compare substances and exposure pathways, and supports priority setting for exposure reduction or elimination activities. The indicators typically show a national average and maximum lifetime excess cancer risk, based on actual measured data, for each substance and exposure pathway.
    </p>
  </section>
  <section id="Environmental" class="py-3">
    <h2>Occupational Approach</h2>
    <div class="row">
      <div class="col col-md-6">
        <p>Our goal is to estimate Canadians’ potential exposures to known and suspected carcinogens in the workplace. Estimates of the numbers of workers exposed to specific carcinogens have been calculated by industry, occupation, province, and sex. Where data are available, levels of exposure expected in Canadian workplaces have also been estimated. These estimates are important for developing prevention strategies for cancer and other occupational diseases, for targeting high-risk groups, for determining the occupational burden of cancer in Canada, and for creating new epidemiological studies that are able to increase our ability to recognize and prevent occupational cancers.</p>
      </div>
      <div class="col col-md-6">
        <p>
          Our estimates are produced following a general approach to ensure transparency, scientific rigor, ease of interpretation, and comparability between substances. The approach is flexible, and may be adjusted for substances with unique data sources or particular challenges with respect to uncertainty. For instance, we used a modified approach to assess occupational exposure to antineoplastic agents and solar ultraviolet radiation. 

          CAREX Canada is committed to providing estimates that are as accurate as possible. A challenge that we face is a general lack of current occupational exposure data. This may affect both our prevalence estimates and levels of exposure estimates, especially when the use of a substance has changed substantially since the 1990s. We welcome comments and additional data sources from researchers and other stakeholders in occupational health.</p>
      </div>
    </div>
  </section>
  <section id="Exposure" class="py-3">
    <h2>Canadian Workplace Exposure Database</h2>
    <div class="row">
      <div class="col col-md-6">
        <p>
          The Canadian Workplace Exposure Database (CWED) is a national exposure database that has been created as an important part of CAREX Canada. The CWED contains measurement data on exposure to known, probable and possible carcinogens in Canada from a variety of sources.

          Data from the CWED is useful for both cancer prevention and research. Some examples of how the CWED can be used are shown below.
        </p>
      </div>
      <div class="col col-md-6">
        <p></p>
      </div>
    </div>
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

    //Anade una capa para los marcadores
    var layerGroup = L.layerGroup().addTo(map);

    // Array de puntos desde la base de datos
    var puntos = @json($empresas);

    // Variable para almacenar las coordenadas del polígono
    //var coordenadasPoligono = [];

    // Recorrer los puntos y agregarlos como vértices del polígono
    puntos.forEach(function(punto) {
        //coordenadasPoligono.push([punto.latitud, punto.longitud]);

        // Opcional: Si quieres seguir mostrando los marcadores junto con el polígono
        L.circleMarker([punto.latitud, punto.longitud], {radius: 15})   //cambiar estos valores
            .addTo(layerGroup)
            .bindPopup(`<strong>${punto.id}</strong><br>Lat: ${punto.latitud}, Lon: ${punto.longitud}`);
    });

    // Crear el polígono con los puntos adyacentes
    /*var poligono = L.polygon(coordenadasPoligono, {
        color: 'blue', // Color del borde del polígono
        fillColor: '#007bff', // Color de relleno
        fillOpacity: 0.5 // Opacidad del relleno
    }).addTo(map);*/

    //coordenadasPoligono = [];
    //coordenadasPoligono.push([41.8781, -87.6298], [32.7767, -96.7970], [25.7617, -80.1918]);
    // Crear el polígono con los puntos adyacentes
    /*var poligono = L.polygon(coordenadasPoligono, {
        color: 'red', // Color del borde del polígono
        fillColor: '#7b00ff', // Color de relleno
        fillOpacity: 0.5 // Opacidad del relleno
    }).addTo(map);
    */
    // Opcional: centrarse en el polígono
    //map.fitBounds(poligono.getBounds());

  </script>
  
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    $("#Empresas").DataTable();
  </script>
@endsection
