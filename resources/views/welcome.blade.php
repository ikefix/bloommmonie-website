<script>
    const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
</script>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BloomMonie</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">   
         <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">


        <style>
        </style>
    </head>
    <body class="antialiased">
        
        <div id="defaultNavbar" class="hidden-navbar">
            @include('layouts.navbar')
        </div>
        {{-- @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}
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
        <div class="hero">
            <div class="hero-text">
                <h1> Your Cloud-Based POS System – Built for Every Store, Customer, and Location</h1>
                <p>"Track sales and inventory in real time with our cloud-based POS software. Instantly monitor stock across all locations, avoid overselling, and keep your data seamlessly synchronized.
                </p>
                <div class="hero-link">
                    <a class="custom-button trial" href="{{ route('demo.signup') }}">Book a 14 Days Free Trial</a>
                    {{-- <a class="custom-button demo" href=""><b>Book a Demo Now here</b></a> --}}
                </div>
                <small>No Credit Card Required!</small>
            </div>
            <div class="hero-image">
                <img src="{{ url("images/digital-tablet.png") }}" alt="">
            </div>
        </div>
    </div>
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
    <div class="b-color" id="business">
  <div class="business-support">
    <div><h2>BloomPOS can be used in any of the Business</h2></div>
    <div>
      <div class="usecase">
        <button data-business="grocery">Super Market</button>
        <button data-business="fashion">Fashion</button>
        <button data-business="book">Book Store</button>
        <button data-business="pharmacy">Pharmacy Shop</button>
        <button data-business="cosmetics">Hair/Cosmetics</button>
        <button data-business="general">Lot's More</button>
      </div>
    </div>
  </div>

  <div class="business-card" id="businessCard">
    <div class="card-content">
      <div class="text-content">
        <h5 class="green-heading">Business Type</h5>
        <h3 id="businessTitle">Fashion Boutique</h3>
        <p id="businessDescription">
          Fashion boutiques thrive on providing a unique experience…
        </p>
        <p>Get your free trial now and see the difference!</p>
        <a class="businessbtn" href="{{ route('demo.signup') }}">Book a 14 Days Free Trial</a>
      </div>

      <img id="businessImage" src="images/pics.jpg" alt="Fashion Boutique" />
    </div>
  </div>
</div>

@include("layouts.price")

<section class="testimonial-section">
  <div class="testimonial-wrapper">

    <!-- LEFT: TEXT -->
    <div class="testimonial-text">
      <span class="badge">Trusted by Growing Businesses</span>
      <h2>Real Businesses. Real Results.</h2>

      <p class="quote">
        “BloomPOS completely transformed how we run our stores.
        We now track sales across multiple locations in real time,
        prevent stock losses, and close sales faster than ever.”
      </p>

      <div class="testimonial-user">
        <img src="{{asset('images/dakl.png')}}" alt="Customer">
        <div>
          <h4>Omeke Peter</h4>
          <small>Founder, Ogalearn Enterprise</small>
        </div>
      </div>

      <div class="testimonial-stats">
        <div>
          <h3>40%</h3>
          <p>Faster Checkout</p>
        </div>
        <div>
          <h3>99.9%</h3>
          <p>Stock Accuracy</p>
        </div>
        <div>
          <h3>24/7</h3>
          <p>Cloud Access</p>
        </div>
      </div>
    </div>

    <!-- RIGHT: VIDEO -->
    <div class="testimonial-video">
      <div class="video-frame">
        <iframe 
          src="https://www.youtube.com/embed/YOUR_VIDEO_ID"
          title="BloomPOS Testimonial"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      </div>
      <p class="video-caption">Watch how BloomPOS helps businesses scale effortlessly</p>
    </div>

  </div>
</section>

      <div class="calltoaction">
        <div class="cta-text">
          <h1>Let’s Get Started</h1>
          <h1>Start your free trial today and discover the transformative power of our Smart Inventory Management System.</h1>
          <a href="{{ route('demo.signup') }}"><button class="start-free">Reuest a Demo</button></a>
        </div>
      </div>
      <div class="faq-wrapper">
        <div class="faq-intro">
          <h5>Frequently Asked Questions</h5>
          <h1>Do You Have Any Questions?</h1>
          <p>Have questions about BloomMonie? We’ve got you covered. Explore our FAQ section to find answers to common inquiries.</p>
          <a href="#contact"><button class="ask-btn">Ask Your Question</button></a>
        </div>
      
        <div class="faq-columns">
          <div class="faq-item">
            <button class="faq-question">How do I get The software?<span class="icon">+</span></button>
            <div class="faq-answer">You can get the software by Registering on our website and choosing a suitable plan, after that you can make payment and get your Software Access Login sent to you via mail, SMS and WhatsApp.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Is there a yearly plan?<span class="icon">+</span></button>
            <div class="faq-answer">Yes, we offer discounted yearly subscription plans.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Can I cancel at any time?<span class="icon">+</span></button>
            <div class="faq-answer">Yes, you can cancel your subscription anytime with no penalty.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Where can I get help?<span class="icon">+</span></button>
            <div class="faq-answer">You can reach out via our 24/7 support or Chat our  Help Center on WhatsApp +234 09152150124.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Can i get your software as a one time purchase instead of Yearly or monthly subscription?<span class="icon">+</span></button>
            <div class="faq-answer">Yes you can get the software as a one time software customized to your Business brand and need. The price for the one time purchase is on the website at the price section. You can reach us for more information.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Do I need a credit card?<span class="icon">+</span></button>
            <div class="faq-answer">You can start your free trial without a credit card.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question">How do I get started?<span class="icon">+</span></button>
            <div class="faq-answer">Just click "Get Started" on our homepage to begin your setup.</div>
          </div>
        </div>
      </div>

      <section id="contact">
        <div class="contact-container">
          <!-- Left: Form -->
          <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="{{ route('contact.send') }}" method="POST">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="name" required />

              <label for="email">Your Email</label>
              <input type="email" id="email" name="email" required />

              <label for="subject">Subject</label>
              <input type="text" id="subject" name="subject" required />

              <label for="message">Message</label>
              <textarea id="message" name="message" rows="5" required></textarea>

              <button type="submit">Send Message</button>
            </form>
          </div>

          <!-- Right: Text Content -->
          <div class="contact-info">
            <h2>Get in Touch</h2>
            <p>We’d love to hear from you! Whether you have a question about features, pricing, need a demo, or anything else — our team is ready to answer all your questions.</p>
            <p><strong>Email:</strong> info@bloommonie.com</p>
            <p><strong>Phone:</strong> +234 09152150124</p>
            <p><strong>Address:</strong> N0 45 Airport Road Rukpokwu Market Junction, Port Harcourt, Rivers State, Nigeria</p>
          </div>
        </div>
      </section>


      @include('layouts.footer')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const subscriptionForms = document.querySelectorAll('.pricing-card form');

    subscriptionForms.forEach(form => {
        form.addEventListener('submit', function(e) {

            if (!isLoggedIn) {
                e.preventDefault();

                // Stylish popup message
                alert("You must be logged in to continue.\n\nPlease login to proceed with subscription.");

                window.location.href = "/login"; // redirect to login
            }
        });
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
      
      <script>
document.addEventListener("DOMContentLoaded", function () {
  const businessInfo = {
    grocery: {
      title: "Super Market",
      description:
        "Manage your supermarket or provision store with fast checkout, real-time stock updates, and barcode scanning using BloomPOS.",
      image: "images/pics.jpg"
    },
    fashion: {
      title: "Fashion Store",
      description:
        "Fashion stores benefit from easy stock tracking, outfit categorization, and smooth customer checkout with BloomPOS.",
      image: "images/fashion.jpg"
    },
    book: {
      title: "Book Store",
      description:
        "Organize books by category, manage stock, and track sales effortlessly with BloomPOS.",
      image: "images/books.jpg"
    },
    pharmacy: {
      title: "Pharmacy Shop",
      description:
        "BloomPOS helps pharmacies manage prescriptions, medicine stock, and customer records securely.",
      image: "images/pharmacy.jpg"
    },
    cosmetics: {
      title: "Hair & Cosmetics",
      description:
        "Manage beauty products, track fast-selling items, and run your store efficiently with BloomPOS.",
      image: "images/hair.avif"
    },
    general: {
      title: "General Store",
      description:
        "BloomPOS adapts to any business — from gadgets to home items — with flexible inventory tools.",
      image: "images/logo.jpeg"
    }
  };

  const buttons = document.querySelectorAll(".usecase button");
  const titleEl = document.getElementById("businessTitle");
  const descEl = document.getElementById("businessDescription");
  const imgEl = document.getElementById("businessImage");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      // Remove active class
      buttons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      const type = this.getAttribute("data-business");
      const info = businessInfo[type];

      if (info) {
        titleEl.textContent = info.title;
        descEl.textContent = info.description;
        imgEl.src = info.image;
        imgEl.alt = info.title;
      }
    });
  });
});
</script>

        <script>
          const faqButtons = document.querySelectorAll(".faq-question");
        
          faqButtons.forEach(button => {
            button.addEventListener("click", () => {
              // Close all other open questions
              faqButtons.forEach(btn => {
                if (btn !== button) {
                  btn.classList.remove("active");
                  btn.querySelector(".icon").textContent = "+";
                  btn.nextElementSibling.classList.remove("open");
                }
              });
        
              // Toggle current one
              const answer = button.nextElementSibling;
              const icon = button.querySelector(".icon");
        
              button.classList.toggle("active");
              if (answer.classList.contains("open")) {
                answer.classList.remove("open");
                icon.textContent = "+";
              } else {
                answer.classList.add("open");
                icon.textContent = "–";
              }
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
    </body>
</html>
              