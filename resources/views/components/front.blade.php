<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}"/>
    <title>@yield('title', 'Jobs') | {{ config('app.name', 'Job Buddy') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />

    @stack('css')
    @yield('jsconfig')
  </head>

  <body class="bg--light-gray @yield('bodyclass')">
    <nav class="bg-white navbar navbar-expand-md navbar-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
          @if(!request()->is('job/*'))
            <img src="{{ asset('img/logo.png') }}" width="50px" alt="Brand Logo">
          @else
            {{ config('app.name') }}
          @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                                                                            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="ml-auto navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('welcome') }}"><i class="fas fa-briefcase"></i> Jobs <span
                                              class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('img/avatar.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                  <img src="{{ asset('img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">

                  <p>
                  {{ auth()->user()->name }}
                  <small>Member since {{ date('M. Y', strtotime(auth()->user()->created_at)) }}</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  @if(auth()->user()->hasRole('user'))
                    <a href="{{ route('user.profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                  @endif
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                              class="float-right btn btn-default btn-flat">Sign out</a>
                </li>
              </ul>
              <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav> <!-- /.navbar -->

    <main id="app" role="main" class="mt-2 main">

      {{ $slot }}

    </main><!-- /.container -->

    @if(!request()->is('job/*'))
<footer class="footer">
  <div class="container">
    <div class="footer-content">
      <div class="row align-items-center">
        <!-- Brand and Tagline -->
        <div class="col-lg-4 text-center text-lg-start mb-3 mb-lg-0">
          <div class="footer-brand">
            <img src="{{ asset('img/logo.png') }}" width="40" height="40" alt="{{ config('app.name') }} Logo" class="footer-logo">
            <h5 class="footer-company-name">{{ config('app.name') }}</h5>
          </div>
          <p class="footer-tagline mt-2">
            Connecting talented professionals with top companies.
          </p>
        </div>
        
        <!-- Social Icons -->
        <div class="col-lg-4 text-center mb-3 mb-lg-0">
          <div class="social-links">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        
        <!-- Copyright & Credits -->
        <div class="col-lg-4 text-center text-lg-end">
          <p class="copyright mb-1">
            &copy; 2025 {{ config('app.name') }}
          </p>
          <div class="footer-credits">
            Made with 
            <a href="https://laravel.com/" target="_blank" rel="noopener">Laravel</a>
            <i class="mx-1 fa fa-heart text-danger"></i>
            <a href="https://getbootstrap.com/" target="_blank" rel="noopener">Bootstrap</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<style>
.footer {
  background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);
  color: #e2e8f0;
  padding: 2.5rem 0 1.5rem;
  margin-top: 3rem;
}

.footer-content {
  padding: 1rem 0;
}

.footer-brand {
  display: flex;
  align-items: center;
  gap: 12px;
  justify-content: center;
  justify-content: flex-start;
}

.footer-logo {
  border-radius: 8px;
}

.footer-company-name {
  font-weight: 700;
  color: #fff;
  margin: 0;
  font-size: 1.5rem;
}

.footer-tagline {
  color: #a0aec0;
  font-style: italic;
  margin: 0;
  font-size: 0.95rem;
}

.social-links {
  display: flex;
  gap: 1rem;
  justify-content: center;
}

.social-links a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  color: #e2e8f0;
  text-decoration: none;
  transition: all 0.3s ease;
}

.social-links a:hover {
  background: #4299e1;
  color: white;
  transform: translateY(-3px);
}

.copyright {
  color: #a0aec0;
  margin: 0;
  font-size: 0.9rem;
}

.footer-credits {
  color: #a0aec0;
  font-size: 0.85rem;
}

.footer-credits a {
  color: #4299e1;
  text-decoration: none;
  font-weight: 500;
}

.footer-credits a:hover {
  text-decoration: underline;
}

.footer-credits .fa-heart {
  animation: heartbeat 2s infinite;
}

@keyframes heartbeat {
  0% { transform: scale(1); }
  5% { transform: scale(1.2); }
  10% { transform: scale(1); }
  15% { transform: scale(1.3); }
  20% { transform: scale(1); }
  100% { transform: scale(1); }
}

/* Responsive Design */
@media (max-width: 992px) {
  .footer-brand {
    justify-content: center;
  }
  
  .footer-tagline {
    text-align: center;
  }
  
  .footer-credits {
    text-align: center !important;
  }
}

@media (max-width: 768px) {
  .footer {
    padding: 2rem 0 1rem;
  }
  
  .footer-brand {
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 1rem;
  }
  
  .footer-logo {
    margin-right: 0;
  }
  
  .social-links {
    margin: 1rem 0;
  }
  
  .footer-credits {
    margin-top: 1rem;
  }
}
</style> <!-- /.footer -->
    @endif


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script type="application/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script type="application/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('js')
  </body>

</html>
