<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Proyecto de Salud')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/salud.css')}}">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Style -->
    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">ENJUSH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('escenarioexposicion')}}">Escenario de Exposición</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Casos de Estudio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Efectos en Salud
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Cancer de mama</a></li>
                <li><a class="dropdown-item" href="#">Leucemia</a></li>
                <li><a class="dropdown-item" href="#">Enfermedad Renal</a></li>
                <li><a class="dropdown-item" href="#">Enfermedades Neurologicas</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('sustancias.index')}}">Sustancias</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Recursos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Anuncios</a></li>
                <li><a class="dropdown-item" href="#">Solicitudes</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('recursos')}}">Publicaicones</a></li>
                <li><a class="dropdown-item" href="#">Videos</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('nosotros')}}">Nosotros</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('empresas.index')}}">Empresas</a></li>
                <li><a class="dropdown-item" href="{{route('evaluaciones.index')}}">Evaluaciones</a></li>
                <li><a class="dropdown-item" href="{{route('matriza.index')}}">Matriz Ambiental</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('sustancias.index')}}">Sustancias</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('sectores.index')}}">Sectores</a></li>
                <li><a class="dropdown-item" href="{{route('subsectores.index')}}">Subsectores</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('clasificaciones.index')}}">Clasificaciones</a></li>
                <li><a class="dropdown-item" href="{{route('instituciones.index')}}">Instituciones</a></li>
                <li><a class="dropdown-item" href="{{route('evaluadores.index')}}">Evaluadores</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('estados.index')}}">Ubicación</a></li>
              </ul>
            </li>
            @if(Route::has('login'))
              @auth
                <!-- Algun menu especial con auth -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">{{Auth::user()->email}}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Log Out</a>
                      </form>
                    </li>
                  </ul>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @if(Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                  </li>
                @endif
              @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Content -->
    <main class="container my-4">
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-6 col-md-3">
            <p class="fw-semibold">School of Population and Public Health</p>
            <p>University of British Columbia Vancouver Campus 370A - 2206 East Mall Vancouver, BC  V6T 1Z3 CANADA</p>
            <p></p>
            <p>&copy; 2024 CAREX Canada</p>
          </div>
          <div class="col-6 col-md-3">
            <div class="mb-3">Email: <a href="mailto:">info@carexcanada.ca</a></div>
            <div>
              <i class="fa-brands fa-x-twitter"></i>
              <i class="fa-brands fa-youtube"></i>
              <i class="fa-brands fa-linkedin"></i>
              <i class="fa-brands fa-square-facebook"></i>
            </div>
          </div>
          <div class="col-6 col-md-3"></div>
          <div class="col-6 col-md-3">
            <a href="">FAQs</a><br>
            <a href="">Terms of Use</a><br>
            <a href="">Glossary</a>
          </div>
        </div>
        <div>
          <p class="text-center mt-2">As a national organization, our work extends across borders into many Indigenous lands throughout Canada. We gratefully acknowledge that our host institution, the University of British Columbia Point Grey campus, is located on the traditional, ancestral and unceded territories of the xʷməθkʷəy̓əm (Musqueam) people.</p>
        </div>
      </div>
    </footer>
    <!-- Boton arriba -->
    <span class="ir-arriba"><i class="fa-solid fa-angle-up"></i></span>

    @include('modal')

    <!-- Custom Script -->
    @yield('scripts')
    @yield('scriptsTables')

    <script src="{{asset('js/salud.js')}}"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
