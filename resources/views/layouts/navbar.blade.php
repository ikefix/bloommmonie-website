<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <div class="con-name">
            <a class="navbar-brand custom-logo" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.jpeg') }}" 
                     alt="Bloommonie Logo" 
                     class="logomobile" 
                     style="height:40px;">
            </a>

            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="{{ __('Toggle navigation') }}">

                <i class='bx bx-menu-wider'></i>
            </button>
        </div>

        <!-- COLLAPSE START -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Middle Navigation -->
            <div class="custom-middle">
                <ul class="custom-menu">
                    <li class="custom-item">
                        <a class="custom-link" href="{{ url('/#business') }}">
                            Business Types
                        </a>
                    </li>

                    <li class="custom-item">
                        <a class="custom-link" href="{{ url('/support') }}">
                            24/7 Support
                        </a>
                    </li>

                    {{-- <li class="custom-item">
                        <a class="custom-link" href="{{ url('/pricing') }}">
                            Pricing
                        </a>
                    </li> --}}

                    <li class="custom-item">
                        <a class="custom-link" href="{{ url('/features') }}">
                            Features
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Right Navigation -->
            <ul class="custom-right">

                @guest

                    <li class="custom-item">
                        <a class="custom-link login-button custom-button"
                           href="https://bloommonie.store">
                            Login
                        </a>
                    </li>

                    <li class="custom-item">
                        <a class="custom-link signup-button custom-button"
                           href="https://bloommonie.store">
                            Register
                        </a>
                    </li>

                @else

                    <li class="nav-item dropdown drop-nav">

                        <a id="navbarDropdown"
                           class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">

                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end"
                             aria-labelledby="navbarDropdown">

                            <a class="dropdown-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">

                                Logout
                            </a>

                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST"
                                  class="d-none">

                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest

            </ul>

        </div>
        <!-- COLLAPSE END -->

    </div>
</nav>


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