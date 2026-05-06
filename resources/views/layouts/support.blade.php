<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Support</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/features.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pricingaction.css') }}">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
</head>
<body>
            <div id="defaultNavbar" class="hidden-navbar">
            @include('layouts.navbar')
        </div>
  <div class="nav-hero">
                <div class="custom-nav">
                    <!-- Logo -->
                    <a class="custom-logo" href="{{ url('/') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        BloomMonie
                    </a>

                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class='bx bx-menu-wider'></i> 
                    </button> --}}
                
                    <!-- Middle Navigation -->
                    <div class="custom-middle">
                        <ul class="custom-menu">
                            <li class="custom-item"><a class="custom-link" href="{{ url('/#business') }}">Business Types</a></li>
                            <li class="custom-item"><a class="custom-link" href="{{ url('/support') }}">24/7 Support</a></li>
                            <li class="custom-item"><a class="custom-link" href="{{ url('/pricing') }}">Pricing</a></li>
                            <li class="custom-item"><a class="custom-link" href="{{ url('/features') }}">Features</a></li>
                        </ul>
                    </div>
                
                    <!-- Right Navigation -->
                    <ul class="custom-right">
                        @guest
                            @if (Route::has('login'))
                                <li class="custom-item">
                                    <a class="custom-link login-button custom-button" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                
                            @if (Route::has('register'))
                                <li class="custom-item">
                                    <a class="custom-link signup-button custom-button" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>        
            </div>
  <!-- General Support Banner -->
<section class="general-support">
  <h1 class="support-title">Our Support Services</h1>
  <h2 class="support-subtitle">Our Pricing Plan is for Businesses of All Sizes</h2>
  <h3 class="support-note">
    Explore all features included in our plans on our <a href="/features">features page</a>.
  </h3>
  <p class="support-description">
    At Bloommonie, we understand the importance of reliable and round-the-clock support 
    for your business. To ensure your peace of mind, we offer 24/7 support, so you can
    focus on running your business while we take care of any technical issue that may arise.
  </p>
</section>

<!-- Support Cards -->
<section class="support-cards">
  <h2 class="support-cards-title">Reach Us Anytime</h2>

  <div class="icon-card-container">

    <!-- WhatsApp -->
    <a href="https://wa.me/2349152150124" target="_blank" class="icon-card whatsapp">
      <i class='bx bxl-whatsapp'></i>
      <span>WhatsApp</span>
    </a>

    <!-- Email -->
    <a href="mailto:support@bloommonie.com
      ?subject=Bloommonie%20Support
      &body=Hello%20Bloommonie%20Support,%0A%0AI%20need%20help%20with..."
      class="icon-card email">
        <i class='bx bx-envelope'></i>
        <span>Email</span>
      </a>


    <!-- Phone -->
    <a href="tel:+2347060837121" class="icon-card phone">
      <i class='bx bx-phone-call'></i>
      <span>Call: 07060837121</span>
    </a>

  </div>
</section>

@extends('layouts.footer')
<script>
          document.addEventListener("DOMContentLoaded", function () {
              let navbar = document.getElementById("defaultNavbar");
              let scrollThreshold = 200; // Change this value for when the navbar should appear
              let lastScrollY = window.scrollY;
              let isNavbarVisible = false; // Track visibility
          
              window.addEventListener("scroll", function () {
                  let currentScrollY = window.scrollY;
          
                  if (currentScrollY > scrollThreshold && !isNavbarVisible) {
                      navbar.classList.add("visible-navbar"); // Slide in
                      isNavbarVisible = true;
                  } 
                  else if (currentScrollY < scrollThreshold && isNavbarVisible) {
                      navbar.classList.remove("visible-navbar"); // Slide out
                      isNavbarVisible = false;
                  }
          
                  lastScrollY = currentScrollY;
              });
          });
        </script>    

              <script>
document.addEventListener('DOMContentLoaded', function () {
  const toggleButton = document.querySelector('.navbar-toggler');
  const middleMenu = document.querySelector('.custom-middle');
  const rightMenu = document.querySelector('.custom-right');

  toggleButton.addEventListener('click', function () {
    middleMenu.classList.toggle('show');
    rightMenu.classList.toggle('show');
  });
});
</script>
</body>
</html>