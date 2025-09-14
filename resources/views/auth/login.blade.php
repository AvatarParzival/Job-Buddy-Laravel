<x-public>
  @push('css')
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <style>
    .login-page {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    
    .login-box {
      width: 100%;
      max-width: 420px;
      margin: 0 auto;
    }
    
    .login-card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      background: #ffffff;
    }
    
    .card-header {
      background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
      border-bottom: none;
      padding: 2rem 1rem;
      text-align: center;
      position: relative;
    }
    
    .card-header a {
      color: white;
      font-size: 2rem;
      font-weight: 700;
      text-decoration: none;
    }
    
    .card-header a:hover {
      color: #e0e7ff;
    }
    
    .back-to-home {
      position: absolute;
      top: 1rem;
      left: 1rem;
      color: white;
      font-size: 1.2rem;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: all 0.3s ease;
      z-index: 10;
    }
    
    .back-to-home:hover {
      color: #e0e7ff;
      transform: translateX(-3px);
    }
    
    .card-body {
      padding: 2rem;
    }
    
    .login-box-msg {
      color: #6b7280;
      text-align: center;
      margin-bottom: 2rem;
      font-size: 1.1rem;
    }
    
    .input-group {
      margin-bottom: 1.5rem;
      position: relative;
    }
    
    .form-control {
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      height: auto;
      transition: all 0.3s ease;
    }
    
    .form-control:focus {
      border-color: #4f46e5;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }
    
    .input-group-text {
      background: transparent;
      border: 2px solid #e5e7eb;
      border-left: none;
      border-radius: 0 10px 10px 0;
    }
    
    .input-group:focus-within .input-group-text {
      border-color: #4f46e5;
    }
    
    .input-group:focus-within .form-control {
      border-right: none;
    }
    
    .input-group:focus-within .input-group-text {
      border-left: 2px solid #4f46e5;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
      border: none;
      border-radius: 10px;
      padding: 0.75rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);
    }
    
    .icheck-primary input[type="checkbox"]:checked + label::before {
      background-color: #4f46e5;
      border-color: #4f46e5;
    }
    
    .login-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 1.5rem 0;
      flex-wrap: wrap;
      gap: 1rem;
    }
    
    .forgot-link, .register-link {
      color: #4f46e5;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    
    .forgot-link:hover, .register-link:hover {
      color: #7c3aed;
      text-decoration: underline;
    }
    
    .social-login {
      margin-top: 2rem;
      text-align: center;
    }
    
    .social-divider {
      display: flex;
      align-items: center;
      margin: 1.5rem 0;
      color: #6b7280;
    }
    
    .social-divider::before,
    .social-divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background: #e5e7eb;
    }
    
    .social-divider span {
      padding: 0 1rem;
    }
    
    .social-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
    }
    
    .social-btn {
      flex: 1;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      padding: 0.5rem;
      background: white;
      color: #374151;
      font-weight: 500;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    
    .social-btn:hover {
      border-color: #4f46e5;
      color: #4f46e5;
      transform: translateY(-1px);
    }
    
    .invalid-feedback {
      color: #ef4444;
      font-size: 0.875rem;
      margin-top: 0.5rem;
      display: block;
    }
    
    .is-invalid {
      border-color: #ef4444 !important;
    }
    
    .is-invalid:focus {
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
    }
    
    @media (max-width: 576px) {
      .login-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }
      
      .social-buttons {
        flex-direction: column;
      }
      
      .card-body {
        padding: 1.5rem;
      }
      
      .back-to-home {
        top: 0.5rem;
        left: 0.5rem;
      }
    }
  </style>
  @endpush
  
  @section('title', 'Login')
  @section('body-class', 'login-page')
  
  <div class="login-box">
    <div class="login-card card">
      <div class="card-header">
        <a href="{{ url('/') }}" class="back-to-home">
          <i class="fas fa-arrow-left"></i>
        </a>
        <a href="{{ url('/') }}">
          {{ config('app.name') }}
        </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Welcome back! Sign in to continue your journey</p>
        
        <form method="POST" action="{{ route('login') }}">
          @csrf
          
          <!-- Email Field -->
          <div class="input-group">
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="Enter your email"
                   name="email"
                   required
                   autocomplete="email"
                   autofocus/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <!-- Password Field -->
          <div class="input-group">
            <input type="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Enter your password"
                   required
                   autocomplete="current-password"/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <!-- Remember Me & Login Button -->
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                <label for="remember">Remember Me</label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">
                <span class="fas fa-sign-in-alt mr-1"></span>
                {{ __('Login') }}
              </button>
            </div>
          </div>
        </form>

        <!-- Forgot Password & Register Links -->
        <div class="login-options">
          @if (Route::has('password.request'))
          <a class="forgot-link" href="{{ route('password.request') }}">
            <span class="fas fa-key mr-1"></span>
            Forgot Password?
          </a>
          @endif
          
          @if (Route::has('register'))
          <a class="register-link" href="{{ route('register') }}">
            <span class="fas fa-user-plus mr-1"></span>
            Create Account
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-public>