<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Lab Data Technology</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  
  <!-- LOGIN CONTAINER -->
  <div class="login-wrapper">
    
    <!-- LEFT SIDE - Form -->
    <div class="login-left">
      <div class="login-box">
        
        <!-- Logo & Title -->
        <div class="login-header">
          <img src="assets/img/Logo Polinema.png" alt="Logo Polinema" class="login-logo">
          <h1>Lab Data Technology</h1>
          <p>Admin Dashboard Login</p>
        </div>
        
        <!-- Login Form -->
        <form class="login-form" id="loginForm" action="admin/dashboard.php" method="POST">
          
          <!-- Alert (Hidden by default) -->
          <div class="alert alert-error" id="alertBox" style="display: none;">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" y1="8" x2="12" y2="12"></line>
              <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span id="alertMessage">Username atau password salah!</span>
          </div>
          
          <!-- Username -->
          <div class="form-group">
            <label for="username">Username</label>
            <div class="input-wrapper">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="input-icon">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              <input type="text" 
                     id="username" 
                     name="username" 
                     placeholder="Masukkan username" 
                     required
                     autocomplete="username">
            </div>
          </div>
          
          <!-- Password -->
          <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="input-icon">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
              <input type="password" 
                     id="password" 
                     name="password" 
                     placeholder="Masukkan password" 
                     required
                     autocomplete="current-password">
              <button type="button" class="toggle-password" id="togglePassword">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" id="eyeIcon">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>
          </div>
          
          <!-- Remember Me & Forgot Password -->
          <div class="form-options">
            <label class="checkbox-label">
              <input type="checkbox" name="remember">
              <span>Remember me</span>
            </label>
            <a href="#" class="forgot-link">Lupa password?</a>
          </div>
          
          <!-- Submit Button -->
          <button type="submit" class="btn-login">
            <span class="btn-text">Login</span>
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="btn-icon">
              <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"/>
            </svg>
          </button>
          
        </form>
        
        <!-- Footer -->
        <div class="login-footer">
          <a href="index.php" class="back-home">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Kembali ke Beranda
          </a>
        </div>
        
      </div>
    </div>
    
    <!-- RIGHT SIDE - Image/Pattern -->
    <div class="login-right">
      <div class="login-overlay">
        <div class="welcome-text">
          <h2>Welcome Back!</h2>
          <p>Kelola konten dan data Lab Data Technology dengan mudah</p>
        </div>
        
        <!-- Decorative Pattern -->
        <div class="pattern-dots">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
      </div>
    </div>
    
  </div>
  
  <script>
    // Toggle Password Visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    togglePassword.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      
      // Toggle icon
      if(type === 'text') {
        eyeIcon.innerHTML = `
          <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
          <line x1="1" y1="1" x2="23" y2="23"></line>
        `;
      } else {
        eyeIcon.innerHTML = `
          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
          <circle cx="12" cy="12" r="3"></circle>
        `;
      }
    });
    
    // Form Submission (Simulasi - ganti dengan real authentication nanti)
    const loginForm = document.getElementById('loginForm');
    const alertBox = document.getElementById('alertBox');
    const alertMessage = document.getElementById('alertMessage');
    
    loginForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      
      // Simulasi validasi (GANTI dengan backend authentication nanti)
      if(username === 'admin' && password === 'admin123') {
        // Success - redirect to dashboard
        alertBox.style.display = 'none';
        window.location.href = 'admin/dashboard.php';
      } else {
        // Failed - show error
        alertMessage.textContent = 'Username atau password salah!';
        alertBox.classList.remove('alert-success');
        alertBox.classList.add('alert-error');
        alertBox.style.display = 'flex';
        
        // Shake animation
        loginForm.classList.add('shake');
        setTimeout(() => {
          loginForm.classList.remove('shake');
        }, 500);
      }
    });
    
    // Hide alert when user starts typing
    document.getElementById('username').addEventListener('input', function() {
      alertBox.style.display = 'none';
    });
    
    document.getElementById('password').addEventListener('input', function() {
      alertBox.style.display = 'none';
    });
  </script>
  
</body>
</html>