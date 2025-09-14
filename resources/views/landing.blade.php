<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>@yield('title', 'Find Your Dream Job') | {{ config('app.name', 'Job Buddy') }}</title>

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
  <style>
    :root {
      --primary: #3498db;
      --secondary: #2c3e50;
      --accent: #e74c3c;
      --light: #f8f9fa;
      --dark: #343a40;
    }
    
    body {
      font-family: 'Source Sans Pro', sans-serif;
      color: #333;
    }
    
    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      padding: 0.8rem 0;
    }
    
    .navbar-brand {
      font-weight: 700;
      color: var(--primary) !important;
      display: flex;
      align-items: center;
    }
    
    .navbar-brand img {
      margin-right: 10px;
    }
    
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    
    .btn-primary:hover {
      background-color: #2980b9;
      border-color: #2980b9;
    }
    
    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
    }
    
    .btn-outline-primary:hover {
      background-color: var(--primary);
      color: white;
    }
    
    .hero-section {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      padding: 5rem 0;
    }
    
    .hero-title {
      font-weight: 700;
      color: var(--secondary);
      margin-bottom: 1.5rem;
    }
    
    .hero-subtitle {
      font-size: 1.25rem;
      color: #555;
      margin-bottom: 2rem;
    }
    
    .feature-card {
      border: none;
      border-radius: 10px;
      transition: transform 0.3s, box-shadow 0.3s;
      height: 100%;
    }
    
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .feature-icon {
      font-size: 2.5rem;
      color: var(--primary);
      margin-bottom: 1rem;
    }
    
    .stats-section {
      background-color: var(--secondary);
      color: white;
      padding: 4rem 0;

    }
    
    .stat-number {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }
    
    .cta-section {
      background: linear-gradient(135deg, var(--primary) 0%, #2980b9 100%);
      color: white;
      padding: 5rem 0;


    }
    
    .testimonial-card {
      background-color: white;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      margin-bottom: 2rem;
    }
    
    .testimonial-text {
      font-style: italic;
      margin-bottom: 1rem;
    }
    
    .testimonial-author {
      font-weight: 600;
      color: var(--primary);
    }
    



        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer-content {
            text-align: center;
        }
        
        .footer-tagline {
            font-size: 1.2rem;
            margin-bottom: 20px;
            opacity: 0.8;
        }
        
        .social-links {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: background 0.3s;
        }
        
        .social-links a:hover {
            background: var(--primary);
        }
        
        .copyright {
            opacity: 0.6;
            font-size: 0.9rem;
        }
    
    .section-title {
      position: relative;
      margin-bottom: 2.5rem;
      font-weight: 700;
      color: var(--secondary);
    }
    
    .section-title:after {
      content: '';
      display: block;
      width: 50px;
      height: 3px;
      background-color: var(--primary);
      margin-top: 10px;
    }
    
    .text-center .section-title:after {
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('welcome') }}"> 
        <img src="{{ asset('img/logo.png') }}" width="40" height="40" alt="Job Buddy Logo"> 
        <span class="d-none d-md-inline">Job Buddy</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#how-it-works">How It Works</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testimonials">Testimonials</a>
          </li>
          <li class="nav-item ml-md-2 mt-2 mt-md-0">
            <a class="nav-link btn btn-outline-primary px-4" href="{{ route('login') }}">Sign In</a>
          </li>
          <li class="nav-item ml-md-2 mt-2 mt-md-0">
            <a class="nav-link btn btn-primary text-white px-4" href="{{ route('register') }}">Join Now</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main id="app" role="main">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1 class="hero-title">Find Your Dream Job with Job Buddy</h1>
            <p class="hero-subtitle">Your personalized job search companion that connects you with thousands of opportunities across various industries.</p>
            <div class="d-flex flex-wrap gap-2">
              <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 py-2">Get Started</a>
              <a href="#how-it-works" class="btn btn-outline-primary btn-lg px-4 py-2">Learn More</a>
            </div>
          </div>
          <div class="col-lg-6 d-none d-lg-block">
            <img src="./img/landing/hero.png" class="img-fluid" alt="Job Search Illustration">
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="stat-number">10,000+</div>
            <div class="stat-label">Active Jobs</div>
          </div>
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="stat-number">5,000+</div>
            <div class="stat-label">Companies</div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-number">50,000+</div>
            <div class="stat-label">Job Seekers</div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-number">95%</div>
            <div class="stat-label">Success Rate</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-12">
            <h2 class="section-title">Why Choose Job Buddy?</h2>
            <p class="lead">We provide everything you need to streamline your job search</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card feature-card h-100">
              <div class="card-body text-center p-4">
                <div class="feature-icon">
                  <i class="fas fa-search"></i>
                </div>
                <h3>Smart Job Matching</h3>
                <p>Our advanced algorithm matches you with jobs that fit your skills, experience, and preferences.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card feature-card h-100">
              <div class="card-body text-center p-4">
                <div class="feature-icon">
                  <i class="fas fa-bell"></i>
                </div>
                <h3>Job Alerts</h3>
                <p>Get notified when new jobs that match your criteria are posted. Never miss an opportunity.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card feature-card h-100">
              <div class="card-body text-center p-4">
                <div class="feature-icon">
                  <i class="fas fa-file-alt"></i>
                </div>
                <h3>Resume Builder</h3>
                <p>Create professional resumes that stand out to employers with our easy-to-use resume builder.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-5 bg-light">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-12">
            <h2 class="section-title">How Job Buddy Works</h2>
            <p class="lead">Get started in just a few simple steps</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center">
              <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <span class="text-white h3 mb-0">1</span>
              </div>
              <h4>Create Profile</h4>
              <p>Sign up and build your professional profile with skills, experience, and preferences.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center">
              <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <span class="text-white h3 mb-0">2</span>
              </div>
              <h4>Search Jobs</h4>
              <p>Browse through thousands of curated job listings or let our algorithm find matches for you.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center">
              <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <span class="text-white h3 mb-0">3</span>
              </div>
              <h4>Apply</h4>
              <p>Apply to jobs with a single click using your Job Buddy profile or uploaded resume.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center">
              <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <span class="text-white h3 mb-0">4</span>
              </div>
              <h4>Get Hired</h4>
              <p>Track your applications and get hired for your dream job faster than ever before.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-12">
            <h2 class="section-title">Success Stories</h2>
            <p class="lead">Hear from people who found their dream job through Job Buddy</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="testimonial-card">
              <div class="testimonial-text">
                "Job Buddy made my job search so much easier. The personalized recommendations were spot on, and I found my current position within two weeks!"
              </div>
              <div class="testimonial-author">- Sarah Johnson, Marketing Manager</div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="testimonial-card">
              <div class="testimonial-text">
                "As a recent graduate, I was struggling to find entry-level positions. Job Buddy connected me with companies looking for fresh talent."
              </div>
              <div class="testimonial-author">- Michael Chen, Software Developer</div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="testimonial-card">
              <div class="testimonial-text">
                "The resume builder helped me create a professional CV that got me interviews. I landed a job with a 30% salary increase thanks to Job Buddy!"
              </div>
              <div class="testimonial-author">- David Wilson, Financial Analyst</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
      <div class="container text-center">
        <h2 class="mb-4">Ready to find your dream job?</h2>
        <p class="lead mb-5">Join thousands of job seekers who have accelerated their career with Job Buddy</p>
        <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">Create Your Free Account</a>
      </div>
    </section>
  </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p class="footer-tagline">Your trusted companion in the job search journey</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <p class="copyright">&copy; 2025 Job Buddy. All rights reserved.</p>
            </div>
        </div>
    </footer>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script type="application/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script type="application/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @stack('js')
</body>

</html>

