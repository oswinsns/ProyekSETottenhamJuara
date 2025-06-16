<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Simple Forum/Discussion System - Login</title>
  
  <?php include('./header.php'); ?>
  <?php 
  if(isset($_SESSION['login_id']))
    header("location:index.php?page=home");
  ?>
  
  <!-- Modern Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* Ultra Modern Login Styling */
    :root {
      --primary: #667eea;
      --primary-dark: #5a67d8;
      --secondary: #764ba2;
      --accent: #f093fb;
      --success: #48bb78;
      --warning: #ed8936;
      --danger: #f56565;
      --info: #4299e1;
      --light: #f7fafc;
      --dark: #2d3748;
      --gray-50: #f9fafb;
      --gray-100: #f3f4f6;
      --gray-200: #e5e7eb;
      --gray-300: #d1d5db;
      --gray-400: #9ca3af;
      --gray-500: #6b7280;
      --gray-600: #4b5563;
      --gray-700: #374151;
      --gray-800: #1f2937;
      --gray-900: #111827;
      --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --gradient-accent: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
      --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
      --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
      --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      --border-radius: 16px;
      --border-radius-lg: 20px;
      --border-radius-xl: 24px;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: var(--gradient-bg);
      min-height: 100vh;
      overflow: hidden;
      position: relative;
    }
    
    /* Animated Background */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
      animation: float 20s ease-in-out infinite;
      z-index: -1;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      33% { transform: translateY(-30px) rotate(120deg); }
      66% { transform: translateY(30px) rotate(240deg); }
    }
    
    /* Floating Particles */
    .particles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }
    
    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      animation: particle-float 15s infinite linear;
    }
    
    .particle:nth-child(1) { left: 10%; width: 20px; height: 20px; animation-delay: 0s; }
    .particle:nth-child(2) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; }
    .particle:nth-child(3) { left: 30%; width: 25px; height: 25px; animation-delay: 4s; }
    .particle:nth-child(4) { left: 40%; width: 18px; height: 18px; animation-delay: 6s; }
    .particle:nth-child(5) { left: 50%; width: 22px; height: 22px; animation-delay: 8s; }
    .particle:nth-child(6) { left: 60%; width: 16px; height: 16px; animation-delay: 10s; }
    .particle:nth-child(7) { left: 70%; width: 24px; height: 24px; animation-delay: 12s; }
    .particle:nth-child(8) { left: 80%; width: 19px; height: 19px; animation-delay: 14s; }
    .particle:nth-child(9) { left: 90%; width: 21px; height: 21px; animation-delay: 16s; }
    
    @keyframes particle-float {
      0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }
    
    /* Main Container */
    .login-container {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 2rem;
      position: relative;
      z-index: 1;
    }
    
    /* Glassmorphism Login Card */
    .login-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: var(--border-radius-xl);
      padding: 3rem;
      width: 100%;
      max-width: 450px;
      box-shadow: var(--shadow-2xl);
      position: relative;
      overflow: hidden;
      animation: slideUp 0.8s ease-out;
    }
    
    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .login-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    }
    
    .login-card::after {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 100%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.03), transparent);
      transform: rotate(45deg);
      animation: shimmer 3s infinite;
    }
    
    @keyframes shimmer {
      0% { transform: translateX(-100%) rotate(45deg); }
      100% { transform: translateX(100%) rotate(45deg); }
    }
    
    /* Logo Section */
    .login-header {
      text-align: center;
      margin-bottom: 2.5rem;
      position: relative;
      z-index: 1;
    }
    
    .logo-container {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 80px;
      height: 80px;
      background: var(--gradient-primary);
      border-radius: 50%;
      margin-bottom: 1.5rem;
      box-shadow: var(--shadow-xl);
      position: relative;
      animation: logoFloat 3s ease-in-out infinite;
    }
    
    @keyframes logoFloat {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }
    
    .logo-container::before {
      content: '';
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      background: var(--gradient-accent);
      border-radius: 50%;
      z-index: -1;
      animation: rotate 4s linear infinite;
    }
    
    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    
    .logo-icon {
      font-size: 2rem;
      color: white;
    }
    
    .login-title {
      font-size: 2rem;
      font-weight: 800;
      color: white;
      margin-bottom: 0.5rem;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .login-subtitle {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.8);
      font-weight: 400;
    }
    
    /* Form Styling */
    .login-form {
      position: relative;
      z-index: 1;
    }
    
    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
    }
    
    .form-label {
      display: block;
      font-size: 0.9rem;
      font-weight: 600;
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 0.5rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .form-input {
      width: 100%;
      padding: 1rem 1.25rem;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: var(--border-radius);
      color: white;
      font-size: 1rem;
      font-weight: 500;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }
    
    .form-input::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }
    
    .form-input:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.4);
      box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
      transform: translateY(-2px);
    }
    
    /* Login Button */
    .login-button {
      width: 100%;
      padding: 1rem 2rem;
      background: var(--gradient-accent);
      border: none;
      border-radius: var(--border-radius);
      color: white;
      font-size: 1rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-lg);
      position: relative;
      overflow: hidden;
      margin-top: 1rem;
    }
    
    .login-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }
    
    .login-button:hover::before {
      left: 100%;
    }
    
    .login-button:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-2xl);
    }
    
    .login-button:active {
      transform: translateY(-1px);
    }
    
    .login-button:disabled {
      opacity: 0.7;
      cursor: not-allowed;
      transform: none;
    }
    
    /* Loading Animation */
    .loading-spinner {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      border-top-color: white;
      animation: spin 1s ease-in-out infinite;
      margin-right: 0.5rem;
    }
    
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    
    /* Alert Styling */
    .alert {
      padding: 1rem;
      border-radius: var(--border-radius);
      margin-bottom: 1.5rem;
      font-weight: 500;
      animation: slideDown 0.3s ease-out;
    }
    
    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .alert-danger {
      background: rgba(245, 101, 101, 0.1);
      border: 1px solid rgba(245, 101, 101, 0.2);
      color: #feb2b2;
      backdrop-filter: blur(10px);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
      .login-container {
        padding: 1rem;
      }
      
      .login-card {
        padding: 2rem;
        max-width: 100%;
      }
      
      .login-title {
        font-size: 1.75rem;
      }
      
      .logo-container {
        width: 70px;
        height: 70px;
      }
      
      .logo-icon {
        font-size: 1.75rem;
      }
    }
    
    @media (max-width: 480px) {
      .login-card {
        padding: 1.5rem;
      }
      
      .login-title {
        font-size: 1.5rem;
      }
      
      .form-input {
        padding: 0.875rem 1rem;
      }
      
      .login-button {
        padding: 0.875rem 1.5rem;
      }
    }
    
    /* Hide default scrollbar but keep functionality */
    body::-webkit-scrollbar {
      display: none;
    }
    
    body {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
</head>

<body>
  <!-- Floating Particles -->
  <div class="particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
  </div>

  <!-- Login Container -->
  <div class="login-container">
    <div class="login-card">
      <!-- Login Header -->
      <div class="login-header">
        <div class="logo-container">
          <i class="fa fa-comments logo-icon"></i>
        </div>
        <h1 class="login-title">Welcome Back</h1>
        <p class="login-subtitle">Sign in to your forum account</p>
      </div>
      
      <!-- Login Form -->
      <form id="login-form" class="login-form">
        <div class="form-group">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username" class="form-input" placeholder="Enter your username" required>
        </div>
        
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" required>
        </div>
        
        <button type="submit" class="login-button" id="loginBtn">
          <span class="button-text">Sign In</span>
        </button>
      </form>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#login-form').submit(function(e) {
        e.preventDefault();
        
        const $button = $('#loginBtn');
        const $buttonText = $('.button-text');
        
        // Disable button and show loading
        $button.prop('disabled', true);
        $buttonText.html('<span class="loading-spinner"></span>Signing In...');
        
        // Remove existing alerts
        if ($(this).find('.alert-danger').length > 0) {
          $(this).find('.alert-danger').remove();
        }
        
        $.ajax({
          url: 'ajax.php?action=login',
          method: 'POST',
          data: $(this).serialize(),
          error: function(err) {
            console.log(err);
            $button.prop('disabled', false);
            $buttonText.html('Sign In');
          },
          success: function(resp) {
            if (resp == 1) {
              $buttonText.html('<i class="fa fa-check mr-2"></i>Success! Redirecting...');
              setTimeout(function() {
                location.href = 'index.php?page=home';
              }, 1000);
            } else {
              $('#login-form').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle mr-2"></i>Username or password is incorrect.</div>');
              $button.prop('disabled', false);
              $buttonText.html('Sign In');
              
              // Auto remove alert after 5 seconds
              setTimeout(function() {
                $('.alert-danger').fadeOut(300, function() {
                  $(this).remove();
                });
              }, 5000);
            }
          }
        });
      });
      
      // Add focus effects
      $('.form-input').on('focus', function() {
        $(this).parent().addClass('focused');
      }).on('blur', function() {
        $(this).parent().removeClass('focused');
      });
    });
  </script>
</body>
</html>
