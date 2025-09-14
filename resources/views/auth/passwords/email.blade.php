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
      line-height: 1.5;
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
    
    .alert-success {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: white;
      border: none;
      border-radius: 10px;
      padding: 1rem;
      margin-bottom: 1.5rem;
      text-align: center;
    }
    
    .alert-success:before {
      content: "✓";
      margin-right: 0.5rem;
      font-weight: bold;
    }
    
    .login-links {
      text-align: center;
      margin-top: 1.5rem;
      padding-top: 1.5rem;
      border-top: 1px solid #e5e7eb;
    }
    
    .login-link {
      color: #4f46e5;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
      display: inline-block;
      margin: 0 0.5rem;
    }
    
    .login-link:hover {
      color: #7c3aed;
      text-decoration: underline;
    }
    
    .password-reset-icon {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    
    .password-reset-icon i {
      font-size: 3rem;
      color: #4f46e5;
      background: rgba(79, 70, 229, 0.1);
      padding: 1rem;
      border-radius: 50%;
    }
    
    @media (max-width: 576px) {
      .card-body {
        padding: 1.5rem;
      }
      
      .login-links {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
      }
      
      .login-link {
        margin: 0.25rem 0;
      }
      
      .back-to-home {
        top: 0.5rem;
        left: 0.5rem;
      }
    }
  </style>
  @endpush
  
  @section('title', 'Reset Password')
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
        <!-- Success Message -->
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        
        <!-- Password Reset Icon -->
        <div class="password-reset-icon">
          <i class="fas fa-key"></i>
        </div>
        
        <p class="login-box-msg">Enter your email address and we'll send you a link to reset your password.</p>
        
        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          
          <!-- Email Field -->
          <div class="input-group">
            <input type="email"
                   id="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Enter your email address"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email"
                   autofocus>
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
          
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary btn-block">
            <span class="fas fa-paper-plane mr-1"></span>
            Send Reset Link
          </button>
        </form>

        <!-- Login Links -->
        <div class="login-links">
          <a href="{{ route('login') }}" class="login-link">
            <span class="fas fa-sign-in-alt mr-1"></span>
            Back to Login
          </a>
          <span class="text-muted">|</span>
          <a href="{{ route('register') }}" class="login-link">
            <span class="fas fa-user-plus mr-1"></span>
            Create Account
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to the success message
      const successAlert = document.querySelector('.alert-success');
      if (successAlert) {
        successAlert.style.animation = 'fadeIn 0.5s ease-in';
      }
      
      // Focus on email field if there's an error
      const emailField = document.getElementById('email');
      const hasError = document.querySelector('.is-invalid');
      
      if (hasError && emailField) {
        emailField.focus();
      }
    });
  </script>
</x-public>