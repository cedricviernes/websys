<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Miniso Inspired Landing</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

<style>
  /* Basic Reset & Font */
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #fef8f6;
    color: #333;
    margin: 0;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  /* Header styles */
  header {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 2rem;
  }

  /* Buttons style */
  a.btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.875rem;
    transition: background-color 0.3s, box-shadow 0.3s;
    margin-left: 1rem;
  }

  .btn-login {
    background-color: #4fc3f7;
    color: #fff;
  }
  .btn-login:hover {
    background-color: #3399e6;
  }

  .btn-register {
    background-color: #ff6f61;
    color: #fff;
  }
  .btn-register:hover {
    background-color: #e65a50;
  }

  /* Main container styles */
  .main-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Card style */
  .card {
    display: flex;
    flex-direction: column-reverse;
    gap: 2rem;
    max-width: 900px;
    width: 100%;
    background-color: #fff;
    border-radius: 1.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    overflow: hidden;
    padding: 2rem;
  }

  @media(min-width: 768px){
    .card {
      flex-direction: row;
    }
  }

  .content {
    flex: 1;
  }

  .content h1 {
    font-size: 2.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #ff6f61;
  }

  .content p {
    font-size: 1.125rem;
    margin-bottom: 2rem;
    color: #555;
  }

  /* Call-to-action button */
  .cta-button {
    background-color: #ffcc00;
    color: #222;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s, transform 0.2s;
  }
  .cta-button:hover {
    background-color: #ffb300;
    transform: scale(1.05);
  }

  /* Illustration / Image container */
  .illustration {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
  }


  .illustration svg {
    width: 300px;
    height: auto;
  }

  /* Footer styles */
  footer {
    margin-top: 2rem;
    text-align: center;
    font-size: 0.75rem;
    color: #999;
  }
</style>
</head>
<body>

<!-- Header with login/register -->
<header>
  @if (Route::has('login'))
    @auth
      <a href="{{ url('/dashboard') }}" class="btn" style="background-color:#4fc3f7; color:#fff; border-radius:50px;">Dashboard</a>
    @else
      <a href="{{ route('login') }}" class="btn btn-login">Log in</a>
      @if (Route::has('register'))
        <a href="{{ route('register') }}" class="btn btn-register">Register</a>
      @endif
    @endauth
  @endif
</header>

<!-- Main Content Card -->
<div class="main-container">
  <div class="card">
    <!-- Text Content -->
    <div class="content">
      <h1>Let's Get Started!</h1>
      <p>Discover a colorful world of fun, quality, and affordability. Join Miniso-inspired shopping now!</p>
      <a href="#" class="cta-button">Get Started</a>
    </div>
    <!-- Illustration -->
    <div class="illustration">
      <!-- Replace with your preferred SVG or image -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
        <circle cx="32" cy="32" r="30" fill="#ff6f61"/>
        <text x="50%" y="55%" text-anchor="middle" font-size="2rem" fill="#fff">🎈</text>
      </svg>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  &copy; {{ date('Y') }} Miniso Inspired. All rights reserved.
</footer>

</body>
</html>