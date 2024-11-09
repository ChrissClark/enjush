@extends('layout')

@section('title', 'Acerca de Nosotros')

@section('styles')
  <style>
    h1, h2, h3, h4, h5, h6 {
      color: #007bff;
    }
  </style>
@endsection

@section('content')
  <!-- Header Menu and Whst is -->
  <header>
    <div class="row">
      <div class="col-md-2">
        <nav class="nav flex-column">
          <a class="flex-sm-fill nav-link active" aria-current="page" href="#MVO">Missón, Visión y Objetivo</a>
          <a class="flex-sm-fill nav-link" href="#Funding">Funding</a>
          <a class="flex-sm-fill nav-link" href="#Team">Our Team</a>
          <a class="flex-sm-fill nav-link" href="#AnPC">Associates and Past Contributors</a>
          <a class="flex-sm-fill nav-link" href="#Advisors">Advisors</a>
        </nav>
      </div>
      <div class="col-md-10 border-bottom ps-md-4">
        <h1>What is CAREX?</h1>
        <p>CAREX Canada (CARcinogen EXposure) is a multi-institution team of researchers and specialists with expertise in epidemiology, exposure assessment, spatial analysis, health policy, and knowledge mobilization. The purpose of CAREX Canada is to provide a body of knowledge about Canadians’ exposures to known and suspected carcinogens, in order to support organizations in prioritizing exposures and in developing targeted exposure reduction policies and programs.
          <br>CAREX Canada is funded by the Canadian Partnership Against Cancer and hosted at the University of British Columbia.
          <br>For more background about CAREX Canada, see our Frequently Asked Questions.
        </p>
      </div>
    </div>
  </header>
  <section id="MVO" class="border-bottom py-2 my-4">
  <div class="row">
    <div class="col-md-6">
      <h2>Visión</h2>
      <p>Desarrollar métodos y herramientas novedosas a través de la colaboración multidisciplinaria de expertos para enfrentar los problemas de salud atribuibles al ambiente; educar a las nuevas generaciones de lideres en ciencia e innovación y promover la colaboración entre el gobierno, la sociedad y la industria para avanzar hacia el bien común.</p>
      <h2>Misión</h2>
      <p>Generar soluciones relevantes y científicamente válidas para mejorar la salud humana y del ecosistema.</p>
    </div>
    <div class="col-md-6">
      <h2>Objetivo</h2>
      <p>Objetivo, Crear procesos colaborativos multidisciplinarios aplicados a la enseñanza, la investigación para fortalecer la toma de decisiones dirigida a problemas críticos de salud y ambiente que enfrentamos como sociedad.</p>
    </div>
  </div>
  </section>
  <section id="Funding" class="border-bottom py-2 my-4">
  <div class="row">
    <div class="col-md-6">
      <h2>Funding</h2>
      <p>Funding for CAREX Canada’s pilot project in 2003 came from WorkSafeBC. Since 2007, CAREX Canada has been funded by the Canadian Partnership Against Cancer, an independent organization funded by Health Canada to accelerate action on cancer control. CAREX Canada was hosted at Simon Fraser University from 2013-22, and has been hosted at the University of British Columbia since 2022. Additional funding for First Nations knowledge translation and exchange has been provided by: The Canadian Institutes of Health Research (CIHR) Simon Fraser University Community Engagement Initiative</p>
    </div>
    <div class="col-md-6">
      <p>Additional funding for the Canadian Workplace Exposure Database (CWED) has been provided by: WorkSafeBC The Workers’ Compensation Board of Manitoba The Workers’ Compensation Board of New Brunswick The Workers’ Compensation Board of Nova Scotia Workplace Health, Safety and Compensation Commission of Newfoundland & Labrador WorkSafe Saskatchewan</p>
    </div>
  </div>
  </section>
  <section id="Team" class="border-bottom py-2 my-4">
  <h2>Our Team</h2>
  <p>CAREX Canada is a multidisciplinary team of researchers based at the School of Population and Public Health at the University of British Columbia, working in collaboration with researchers at the Department of Oncology at the University of Calgary. The team has expertise in epidemiology, occupational hygiene, toxicology, risk assessment, geographic information systems, data visualization, and knowledge translation and exchange.</p>
  <div>
    <div class="d-flex mb-2">
        <img src="https://via.placeholder.com/300" alt="" class="me-2" style="width:150px;height:150px;">
        <p>
          <span class="fw-bold">LINDSAY FORSMAN-PHILLIPS</span><br>
          <span class="text-secondary">Senior Project Manager</span><br>
          Lindsay Forsman-Phillips is a senior project manager at CAREX Canada. Previously, she was a Sun Safety Advisor based in BC for the Sun Safety at Work Canada project, which developed a sun safety program, resources and tools for outdoor workers. The project was led by Thomas Tenkate at Ryerson University in Toronto. Lindsay holds a Bachelor’s degree in Kinesiology. Her past experience includes working for municipal government and non-profit organizations, where she was responsible for the development of community health programs, and various cancer prevention projects. She is passionate about health, and enjoys raising awareness about important health issues.
        </p>
    </div>
    <div class="d-flex mb-2">
        <img src="https://via.placeholder.com/300" alt="" class="me-2" style="width:150px;height:150px;">
        <p>
          <span class="fw-bold">DISAN KATENDE</span><br>
          <span class="text-secondary">Research Analyst</span><br>
          Disan Katende is a research analyst at CAREX Canada. His past experience includes working with health research teams in sub-Saharan Africa on electronic data capture and analysis. He also worked with the Health Data Research Network Canada (HDRN), and at British Columbia Children’s Hospital Research Institute. He completed a BSc in Food Science and Technology from Makerere University Kampala-Uganda, and worked as a Clinical Nutritionist, and held subsequent roles as Nutrition Advisor and Consultant in Uganda. Disan recently graduated from the University of British Columbia with a Master in Public Health.
        </p>
    </div>
    <div class="d-flex mb-2">
        <img src="https://via.placeholder.com/300" alt="" class="me-2" style="width:150px;height:150px;">
        <p>
          <span class="fw-bold">KRISTIAN LARSEN</span><br>
          <span class="text-secondary">Senior Investigator</span><br>
          Kristian is a senior investigator at CAREX Canada. He is a Research Scientist in the Office of Environmental Health at Health Canada. He is also an Adjunct Assistant Professor in the Department of Public Health Sciences at Queen’s University, an Adjunct Professor in the Department of Geography and Environmental Studies at Toronto Metropolitan University, and a Sessional Lecturer in the Department of Geography and Planning at the University of Toronto. Kristian holds a PhD in Urban Planning from the University of Toronto, and a MA in Medical Geography from the University of Western Ontario. He also conducted post-doctoral work in Environmental Epidemiology at the Centre for Addiction and Mental Health and the Hospital for Sick Children. Kristian’s research uses geographic information science (GIS) and quantitative spatial methods to examine the relationship between the environment and health, with a focus on cancer and chronic disease prevention.
        </p>
    </div>
  </div>
  <h3>Key Partners</h3>
  <div>
    <div class="d-flex mb-2">
        <img src="https://via.placeholder.com/300" alt="" class="me-2" style="width:150px;height:150px;">
        <p>
          <span class="fw-bold">ANNE-MARIE NICOL</span><br>
          <span class="text-secondary">Key Partner</span><br>
          Anne-Marie is an Associate Professor in the Faculty of Health Sciences at Simon Fraser University. Her research focuses on the communication of complex scientific and public health information to a range of audiences. Her work is multidisciplinary, crossing the fields of epidemiology, toxicology, social marketing, risk perception and risk assessment. Most recently, Anne-Marie is focused on the pandemic response and is the Health and Risk Communication Lead for a new program of research, the Pacific Institute for Pathogens, Pandemics and Society (PIPPS). She is also a Knowledge Translation Scientist at the National Collaborating Centre for Environmental Health.
        </p>
    </div>
    <div class="d-flex mb-2">
        <img src="https://via.placeholder.com/300" alt="" class="me-2" style="width:150px;height:150px;">
        <p>
          <span class="fw-bold">PAUL DEMERS</span><br>
          <span class="text-secondary">Key Partner</span><br>
          Paul is the director of the Occupational Cancer Research Centre (OCRC) housed at Cancer Care Ontario. He moved to OCRC from UBC, where he was a Professor in the School of Environmental Health and founded CAREX Canada. As well as being Director of the OCRC, he is also a Professor with the University of Toronto’s Dalla Lana School of Public Health. He has an MSc in Industrial Hygiene and a PhD in Epidemiology, both from the University of Washington in Seattle. Paul is internationally recognized for his expertise on the health effects of workplace exposures and sits on many expert panels, including the International Agency for Research on Cancer working groups that evaluated carcinogens such as dusts and fibres, firefighting and formaldehyde.
        </p>
    </div>
    <div class="d-flex mb-2">
        <img src="https://via.placeholder.com/300" alt="" class="me-2" style="width:150px;height:150px;">
        <p>
          <span class="fw-bold">HUGH DAVIES</span><br>
          <span class="text-secondary">CWED Lead and Key Partner</span><br>
          Hugh, the co-investigator of CAREX Canada and lead on the Canadian Workplace Exposures Database, specializes in occupational hygiene and exposure assessment and modelling. He led the largest cohort study of the impact of noise exposure on heart disease, and was the first to incorporate sophisticated exposure measurement and true heart disease outcomes rather than measures of hypertension. His work has received international recognition, and he is co-chair of the International Commission on the Biological Effects of Noise.
        </p>
    </div>
  </div>
  </section>
  <section id="AnPC" class="border-bottom py-2 my-4">
    <h2>Associates and Past Contributors</h2>
    <div class="accordion my-3" id="AnPC-accor">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Past Contributions
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
  </section>
  <section id="Advisors" class="border-bottom py-2 my-4">
    <h2>Advisors</h2>
  </section>
@endsection

@section('scripts')
@endsection
