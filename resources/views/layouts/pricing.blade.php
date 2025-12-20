<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pricing</title>
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
    <section class="pricing-section">
     
<style>

    .pricing-container{
        display:flex;
        gap:1rem;
        justify-content:center;
        align-items:stretch;
    }

    @media(max-width:767px){
        
    .pricing-container{
        align-items:center;
    }
    }
</style>
<section class="pricing-section">
    <h2 style="text-align:center; color:#f10ade;">Choose Your Plan</h2>

    <div class="billing-toggle" style="margin-bottom: 1rem; display:flex; align-items:center; justify-content:center; gap:1rem; color:#f10ade; font-weight:bold;">
        <label class="switch">
            <input type="checkbox" id="billingToggle" checked>
            <span class="slider" style="background:#f10ade;"></span>
        </label>
        <span id="billingLabel">Yearly</span>
        <span>Get discount for yearly purchases!</span>
    </div>

    <div class="pricing-container">

        <!-- Free Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            display:flex;
            flex-direction:column;
        ">
            <h3 style="color:#f10ade;">Free</h3>
            <p class="price" data-ngn-month="7500" data-ngn-year="70000">₦70,000/yr</p>

            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>1 User</li>
                <li>1 store/location</li>
                <li>Max Product 500</li>
                <li>Sales Report</li>
                <li>Stock Adjustment</li>
                <li>Report Download</li>
                <li>24/7 Support</li>
            </ul>

            <div style="margin-top:auto;">
                <a href="{{ route('register') }}" class="button"
                   style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px; display:inline-block;">
                    Get Started
                </a>
            </div>
        </div>

        <!-- Lite Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            background:#fff0ff;
            display:flex;
            flex-direction:column;
        ">
            <h3 style="color:#f10ade;">Lite</h3>
            <p class="price" data-ngn-month="10000" data-ngn-year="100000">₦100,000/yr</p>

            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>Unlimited Users</li>
                <li>2 store/Location</li>
                <li>Unlimited Products</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking</li>
                <li>24/7 Support</li>
            </ul>

            <div style="margin-top:auto;">
                <form action="{{ route('paystack.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="10000000">
                    <input type="hidden" name="plan" value="lite">
                    <button type="submit" class="button"
                        style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px;">
                        Start Free Trial
                    </button>
                </form>
            </div>
        </div>

        <!-- Business Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            display:flex;
            flex-direction:column;
        ">
            <h3 style="color:#f10ade;">Business</h3>
            <p class="price" data-ngn-month="15000" data-ngn-year="150000">₦150,000/yr</p>

            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>Unlimited Users</li>
                <li>2 store/Location</li>
                <li>Unlimited Products</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking</li>
                <li>Discount Management Support</li>
                <li>Customer Management</li>
                <li>Profit & Loss Statement</li>
                <li>Barcode Support</li>
                <li>24/7 Support</li>
            </ul>

            <div style="margin-top:auto;">
                <form action="{{ route('paystack.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="15000000">
                    <input type="hidden" name="plan" value="business">
                    <button type="submit" class="button"
                        style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px;">
                        Contact Sales
                    </button>
                </form>
            </div>
        </div>

        <!-- Enterprise Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            background:#fff0ff;
            display:flex;
            flex-direction:column;
        ">
            <h3 style="color:#f10ade;">Enterprise</h3>
            <h3>₦1,000,000</h3>

            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>Unlimited Users</li>
                <li>2 store/Location</li>
                <li>Unlimited Products</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking</li>
                <li>Discount Management Support</li>
                <li>Customer Management</li>
                <li>Profit & Loss Statement</li>
                <li>Barcode Support</li>
                <li>24/7 Support</li>
            </ul>

            <div style="margin-top:auto;">
                <form action="{{ route('paystack.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="100000000">
                    <input type="hidden" name="plan" value="enterprise">
                    <button type="submit" class="button"
                        style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px;">
                        Request Demo
                    </button>
                </form>
            </div>
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
           



<script>
    const toggle = document.getElementById('billingToggle');
    const label = document.getElementById('billingLabel');
    const currencySelector = document.getElementById('currencySelector');
    const prices = document.querySelectorAll('.price');
    const forms = document.querySelectorAll('form');

    const exchangeRates = {
        NGN: 1,
        USD: 1 / 1300,
        EUR: 1 / 1100
    };

    const currencySymbols = {
        NGN: '₦',
        USD: '$',
        EUR: '€'
    };

    function updatePrices() {
        const isYearly = toggle.checked;
        const currency = currencySelector.value;
        const rate = exchangeRates[currency];
        const symbol = currencySymbols[currency];

        prices.forEach((price, index) => {
            const monthly = parseFloat(price.dataset.ngnMonth);
            const yearly = parseFloat(price.dataset.ngnYear);
            const amount = isYearly ? yearly : monthly;
            const amountInSelectedCurrency = amount * rate;

            price.innerHTML = `${symbol}${amountInSelectedCurrency.toLocaleString(undefined, { minimumFractionDigits: 0 })}${isYearly ? '/yr' : '/mo'}`;

            // Update hidden amount input (in NGN Kobo)
            const form = price.parentElement.querySelector('form');
            if (form) {
                let amountInput = form.querySelector('input[name="amount"]');
                if (currency === "NGN") {
                    amountInput.value = (amount * 100).toFixed(0); // Kobo
                } else {
                    amountInput.value = Math.round(amountInSelectedCurrency * 100); // USD cents etc
                }
            }
        });

        label.textContent = isYearly ? 'Yearly' : 'Monthly';
    }

    toggle.addEventListener('change', updatePrices);
    currencySelector.addEventListener('change', updatePrices);
    updatePrices();
</script>
