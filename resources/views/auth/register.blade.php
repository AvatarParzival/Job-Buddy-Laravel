<x-public>
  @push('css')
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <style>
    .register-page {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    
    .register-box {
      width: 100%;
      max-width: 450px;
      margin: 0 auto;
    }
    
    .register-card {
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
    }
    
    .input-group {
      margin-bottom: 1rem;
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
      margin-top: 1rem;
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
    
    .password-strength {
      margin-top: 0.5rem;
      height: 5px;
      background: #e5e7eb;
      border-radius: 3px;
      overflow: hidden;
    }
    
    .strength-meter {
      height: 100%;
      width: 0%;
      transition: width 0.3s ease, background 0.3s ease;
      border-radius: 3px;
    }
    
    .strength-weak { background: #ef4444; width: 33%; }
    .strength-medium { background: #f59e0b; width: 66%; }
    .strength-strong { background: #10b981; width: 100%; }
    
    .password-rules {
      font-size: 0.8rem;
      color: #6b7280;
      margin-top: 0.5rem;
    }
    
    .password-rules ul {
      padding-left: 1.2rem;
      margin: 0.5rem 0;
    }
    
    .password-rules li {
      margin-bottom: 0.2rem;
      list-style-type: none;
      position: relative;
    }
    
    .password-rules li:before {
      content: "•";
      position: absolute;
      left: -1rem;
    }
    
    .password-rules .valid {
      color: #10b981;
    }
    
    .password-rules .valid:before {
      content: "✓";
      left: -1.2rem;
    }
    
    .password-rules .invalid {
      color: #9ca3af;
    }
    
    .login-link {
      color: #4f46e5;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
      display: block;
      text-align: center;
      margin-top: 1.5rem;
    }
    
    .login-link:hover {
      color: #7c3aed;
      text-decoration: underline;
    }
    
    .terms-check {
      margin: 1.5rem 0;
    }
    
    .password-match {
      display: none;
      color: #10b981;
      font-size: 0.8rem;
      margin-top: 0.5rem;
    }
    
    @media (max-width: 576px) {
      .card-body {
        padding: 1.5rem;
      }
      
      .register-box {
        max-width: 100%;
      }
      
      .back-to-home {
        top: 0.5rem;
        left: 0.5rem;
      }
    }
  </style>
  @endpush
  
  @section('title', 'Register')
  @section('body-class', 'register-page')
  
  <div class="register-box">
    <div class="register-card card">
      <div class="card-header">
        <a href="{{ url('/') }}" class="back-to-home">
          <i class="fas fa-arrow-left"></i>
        </a>
        <a href="{{ url('/') }}">
          {{ config('app.name') }}
        </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Create your account and start your journey</p>
        
        <form action="{{ route('register') }}" method="post" id="registerForm">
          @csrf
          
          <!-- Name Field -->
          <div class="input-group">
            <input type="text"
                   id="name"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Full Name"
                   value="{{ old('name') }}"
                   required
                   autocomplete="name"
                   autofocus/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <!-- Email Field -->
          <div class="input-group">
            <input type="email"
                   id="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Email Address"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email"/>
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
                   id="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Create Password"
                   required
                   autocomplete="new-password"
                   oninput="checkPasswordStrength(this.value)"/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="password-strength">
              <div class="strength-meter" id="passwordStrength"></div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <!-- Password Rules -->
          <div class="password-rules">
            <small>Password must include:</small>
            <ul>
              <li id="rule-length" class="invalid">At least 8 characters</li>
              <li id="rule-uppercase" class="invalid">One uppercase letter</li>
              <li id="rule-number" class="invalid">One number</li>
              <li id="rule-special" class="invalid">One special character</li>
            </ul>
          </div>
          
          <!-- Confirm Password Field -->
          <div class="input-group">
            <input type="password"
                   id="password-confirm"
                   class="form-control"
                   name="password_confirmation"
                   placeholder="Confirm Password"
                   required
                   autocomplete="new-password"
                   oninput="checkPasswordMatch()">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div id="passwordMatch" class="password-match">
              ✓ Passwords match
            </div>
          </div>
          
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary btn-block">
            <span class="fas fa-user-plus mr-1"></span>
            Create Account
          </button>
        </form>

        <!-- Login Link -->
        <a href="{{ route('login') }}" class="login-link">
          <span class="fas fa-sign-in-alt mr-1"></span>
          Already have an account? Sign in
        </a>
      </div>
    </div>
  </div>

  <script>
    function checkPasswordStrength(password) {
      const strengthMeter = document.getElementById('passwordStrength');
      const ruleLength = document.getElementById('rule-length');
      const ruleUppercase = document.getElementById('rule-uppercase');
      const ruleNumber = document.getElementById('rule-number');
      const ruleSpecial = document.getElementById('rule-special');
      
      // Reset classes
      strengthMeter.className = 'strength-meter';
      ruleLength.className = 'invalid';
      ruleUppercase.className = 'invalid';
      ruleNumber.className = 'invalid';
      ruleSpecial.className = 'invalid';
      
      let strength = 0;
      
      // Check length
      if (password.length >= 8) {
        strength += 1;
        ruleLength.className = 'valid';
      }
      
      // Check uppercase
      if (/[A-Z]/.test(password)) {
        strength += 1;
        ruleUppercase.className = 'valid';
      }
      
      // Check numbers
      if (/[0-9]/.test(password)) {
        strength += 1;
        ruleNumber.className = 'valid';
      }
      
      // Check special characters
      if (/[^A-Za-z0-9]/.test(password)) {
        strength += 1;
        ruleSpecial.className = 'valid';
      }
      
      // Update strength meter
      if (strength > 0 && strength <= 2) {
        strengthMeter.className = 'strength-meter strength-weak';
      } else if (strength === 3) {
        strengthMeter.className = 'strength-meter strength-medium';
      } else if (strength === 4) {
        strengthMeter.className = 'strength-meter strength-strong';
      }
    }
    
    function checkPasswordMatch() {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('password-confirm').value;
      const matchIndicator = document.getElementById('passwordMatch');
      
      if (confirmPassword && password === confirmPassword) {
        matchIndicator.style.display = 'block';
      } else {
        matchIndicator.style.display = 'none';
      }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
      // Check if there's already a password value (e.g., after form validation error)
      const passwordField = document.getElementById('password');
      if (passwordField.value) {
        checkPasswordStrength(passwordField.value);
      }
      
      // Check if passwords match on load
      checkPasswordMatch();
    });
  </script>
</x-public>