<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Features</title>
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
<section class="trackfeature">
  <h2 class="feat">FEATURES</h2>
<div class="feature-section">
        <div class="feature-card">
            <img src="images/store.png" alt="">
            <h4>Multi Location Support</h4>
            <p>With the ability to manage multiple store locations seamlessly, keep your inventory synchronized and sales data consolidated in real-time.</p>
        </div>
        <div class="feature-card">
            <img src="images/low-stock.png" alt="">
            <h4>Low Stock Notification</h4>
            <p>Get timely alerts when your inventory levels are running low, helping you restock efficiently and avoid stockouts.</p>
        </div>
        <div class="feature-card">
            <img src="images/barcode-scan.png" alt="">
            <h4>Barcode Support</h4>
            <p>Effortlessly scan and manage products with barcode support, speeding up checkout and inventory processes.</p>
        </div>
        <div class="feature-card">
            <img src="images/transfer.png" alt="image/transfer.png">
            <h4>Stock Transfer</h4>
            <p>Efficiently transfer stock between multiple locations to maintain optimal inventory levels and meet customer demand.</p>
        </div>
        <div class="feature-card">
            <img src="images/expenses.png" alt="">
            <h4>Expense Tracking</h4>
            <p>Keep a detailed record of your business expenses to better manage your budget and improve profitability.</p>
        </div>
        <div class="feature-card">
            <img src="images/invoice.png" alt="">
            <h4>Professional Invoice and Quotation</h4>
            <p>Create and send professional invoices and quotations to your customers with ease, enhancing your business's credibility and efficiency.</p>
        </div>
            <div class="feature-card">
            <img src="images/discount.png" alt="">
            <h4>Discount Management Support</h4>
            <p>Manage discounts effectively to attract customers and boost sales while maintaining profitability.</p>
        </div>
            <div class="feature-card">
            <img src="images/customer.png" alt="">
            <h4>Customer Management</h4>
            <p>Efficiently manage your customer database, track purchase history, and enhance customer relationships to drive repeat business.</p>
        </div>
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