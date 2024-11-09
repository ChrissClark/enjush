@extends('layout')

@section('title', 'Escenario de Exposición')

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
  <!--  -->
  <section class="my-3">
    <div class="py-3">
      <select class="form-select" aria-label="Default select example my-5">
        <option selected>Open this select menu</option>
        <option value="1">SLP</option>
        <option value="2">Merida</option>
        <option value="3">Villa de Reyes</option>
      </select>
    </div>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-todos-tab" data-bs-toggle="tab" data-bs-target="#nav-todos" type="button" role="tab" aria-controls="nav-todos" aria-selected="true">Todos</button>
        <button class="nav-link" id="nav-cancerigenos-tab" data-bs-toggle="tab" data-bs-target="#nav-cancerigenos" type="button" role="tab" aria-controls="nav-cancerigenos" aria-selected="false">Cancerigenos</button>
        <button class="nav-link" id="nav-Nefrotoxicos-tab" data-bs-toggle="tab" data-bs-target="#nav-Nefrotoxicos" type="button" role="tab" aria-controls="nav-Nefrotoxicos" aria-selected="false">Nefrotóxicos</button>
        <button class="nav-link" id="nav-Neurotoxicos-tab" data-bs-toggle="tab" data-bs-target="#nav-Neurotoxicos" type="button" role="tab" aria-controls="nav-Neurotoxicos" aria-selected="false">Neurotóxicos</button>
        <button class="nav-link" id="nav-indusriales-tab" data-bs-toggle="tab" data-bs-target="#nav-indusriales" type="button" role="tab" aria-controls="nav-indusriales" aria-selected="false">Quimicos Industriales</button>
        <button class="nav-link" id="nav-comercial-tab" data-bs-toggle="tab" data-bs-target="#nav-comercial" type="button" role="tab" aria-controls="nav-comercial" aria-selected="false">Uso Comercial</button>
        <button class="nav-link" id="nav-ocupacionales-tab" data-bs-toggle="tab" data-bs-target="#nav-ocupacionales" type="button" role="tab" aria-controls="nav-ocupacionales" aria-selected="false">Ocupacionales</button>
        <button class="nav-link" id="nav-agua-tab" data-bs-toggle="tab" data-bs-target="#nav-agua" type="button" role="tab" aria-controls="nav-agua" aria-selected="false">Agua</button>
        <button class="nav-link" id="nav-aire-tab" data-bs-toggle="tab" data-bs-target="#nav-aire" type="button" role="tab" aria-controls="nav-aire" aria-selected="false">Aire</button>
      </div>
    </nav>
    <!-- Contenido de las exposiciones -->
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-todos" role="tabpanel" aria-labelledby="nav-todos-tab" tabindex="0">
        <a href="{{route('perfil')}}">
          <figure class="figure">
            <img src="https://via.placeholder.com/300" class="figure-img img-fluid rounded-circle" alt="...">
            <figcaption class="figure-caption fs-5 text-center">Antineoplastic Agents</figcaption>
          </figure>
        </a>
      </div>
      <div class="tab-pane fade" id="nav-cancerigenos" role="tabpanel" aria-labelledby="nav-cancerigenos-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="nav-indusriales" role="tabpanel" aria-labelledby="nav-indusriales-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="nav-comercial" role="tabpanel" aria-labelledby="nav-comercial-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="nav-ocupacionales" role="tabpanel" aria-labelledby="nav-ocupacionales-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="nav-agua" role="tabpanel" aria-labelledby="nav-agua-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="nav-Nefrotoxicos" role="tabpanel" aria-labelledby="nav-Nefrotoxicos-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="nav-Neurotoxicos" role="tabpanel" aria-labelledby="nav-Neurotoxicos-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="nav-aire" role="tabpanel" aria-labelledby="nav-aire-tab" tabindex="0">...</div>
    </div>
  </section>
  <!--  -->
  <section>
    <p>Resumen de resultados generales que se han encontrado con el analisis de los datos personales en el ecosistema.</p>
    <ul>
      <li>Posters</li>
      <li>Tablas</li>
      <li>Mapas</li>
      <div class="py-3">
        <div id="map"></div>
      </div>
      <li>Infogrfia</li>
      <li>Documentos</li>
    </ul>
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
