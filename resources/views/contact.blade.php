<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Miniso-Inspired Landing Page</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  /* Basic Reset & Font */
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #fef8f6;
    color: #333;
    line-height: 1.6;
  }

  /* Navigation styles */
  .navbar {
    background-color: #fff !important;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 1rem 0;
  }

  .navbar-brand {
    font-size: 1.5rem;
    font-weight: 600;
    color: #ff6f61 !important;
    text-decoration: none;
  }

  .navbar-nav .nav-link {
    color: #333 !important;
    font-weight: 500;
    margin: 0 0.5rem;
    transition: color 0.3s;
  }

  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link.active {
    color: #ff6f61 !important;
  }

  /* Buttons style */
  .btn-custom-login {
    background-color: #4fc3f7;
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: 0.5rem 1.25rem;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s;
    margin-left: 0.5rem;
  }

  .btn-custom-login:hover {
    background-color: #3399e6;
    color: #fff;
    transform: translateY(-2px);
  }

  .btn-custom-register {
    background-color: #ff6f61;
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: 0.5rem 1.25rem;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s;
    margin-left: 0.5rem;
  }

  .btn-custom-register:hover {
    background-color: #e65a50;
    color: #fff;
    transform: translateY(-2px);
  }

  .btn-custom-dashboard {
    background-color: #4fc3f7;
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: 0.5rem 1.25rem;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s;
  }

  .btn-custom-dashboard:hover {
    background-color: #3399e6;
    color: #fff;
    transform: translateY(-2px);
  }

  /* Main container styles */
  .main-container {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    padding: 2rem 0;
  }

  /* Card style */
  .welcome-card {
    background-color: #fff;
    border-radius: 1.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    padding: 3rem;
    margin: 2rem 0;
  }

  .welcome-title {
    font-size: 2.5rem;
    font-weight: 600;
    color: #ff6f61;
    margin-bottom: 1rem;
  }

  .welcome-text {
    font-size: 1.125rem;
    color: #555;
    margin-bottom: 2rem;
  }

  /* Call-to-action button */
  .cta-button {
    background-color: #ffcc00;
    color: #222;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    border: none;
  }

  .cta-button:hover {
    background-color: #ffb300;
    color: #222;
    transform: scale(1.05);
    text-decoration: none;
  }

  /* Illustration styles */
  .illustration {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
  }

  .illustration svg {
    width: 100%;
    max-width: 300px;
    height: auto;
  }

  /* Footer styles */
  .footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 2rem 0;
    margin-top: 3rem;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .welcome-title {
      font-size: 2rem;
    }
    
    .welcome-card {
      padding: 2rem;
    }
    
    .auth-buttons {
      margin-top: 1rem;
    }
    
    .auth-buttons .btn {
      margin: 0.25rem;
      display: block;
      width: 100%;
    }
  }
</style>
</head>
<body>

<!-- Navigation using Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">MINISO</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ url('products') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('faq') ? 'active' : '' }}" href="{{ url('faq') }}">FAQs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('privacy') ? 'active' : '' }}" href="{{ url('privacy') }}">Privacy</a>
        </li>
      </ul>
      
      <div class="auth-buttons">
         <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary position-relative me-2">
          🛒 Cart
          @if(session('cart') && count(session('cart')) > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              {{ count(session('cart')) }}
            </span>
          @endif
        </a>
        @if (Route::has('login'))
          @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-custom-dashboard">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-custom-login">Logout</button>
            </form>
          @else
            <a href="{{ route('login') }}" class="btn btn-custom-login">Log in</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="btn btn-custom-register">Register</a>
            @endif
          @endauth
        @endif
      </div>
    </div>
  </div>
</nav>

@if(Request::is('contact'))
    <div class="row">
      <div class="col-12">
        <div class="welcome-card">
          <h1 class="welcome-title" style="text-align: center;">Contact Us</h1>
          <p class="welcome-text text-center">We'd love to hear from you! Get in touch with us using the form below or through our contact information.</p>
          
          <div class="row mt-4">
            <div class="col-lg-8 mx-auto">
              <form action="#" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <div class="text-center">
                  <button type="submit" class="cta-button">Send Message</button>
                </div>
              </form>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-md-4 text-center mb-3">
              <h5>📧 Email</h5>
              <p>hello@miniso-inspired.com</p>
            </div>
            <div class="col-md-4 text-center mb-3">
              <h5>📞 Phone</h5>
              <p>+63 (934) 123-4567</p>
            </div>
            <div class="col-md-4 text-center mb-3">
              <h5>📍 Address</h5>
              <p>PSU Urdaneta<br>San Vicente, Urdaneta City</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <p class="mb-1">&copy; {{ date('Y') }} Miniso Inspired. All rights reserved.</p>
    <p class="mb-0">Made with ♥ for simple, quality living</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>