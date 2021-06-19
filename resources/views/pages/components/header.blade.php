<div class="outer-container">

  <div class="bigger-header">

    <div> <!-- Questo div è header con logo/diventaHost/Login -->

      <span>
        <a href="{{route('homepage')}}">
          <img src="{{asset('storage/assets/lg_color0.png')}}" alt="logo-image">
        </a>
      </span>

      <span>
        <a href="{{route('register')}}">
          Diventa un host
        </a>

        <a href="{{route('login')}}">
          <i class="fas fa-bars"></i>
          <i class="fas fa-user"></i>
        </a>

      </span>

    </div>
        <div id="app">

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


    <div> <!-- INIZIO div in header con la navbar1 (width 100%)-->
      <div class="navbar1"> <!-- INIZIO Navbar1 (width 70%)-->

        <div>
          <a href="#">
            <h3>Dove</h3>
            <p>Dove vuoi andare?</p>
          </a>
        </div>

        <div>
          <a href="#">
            <h3>Check-In</h3>
            <p>Aggiungi data</p>
          </a>
        </div>

        <div>
          <a href="#">
            <h3>Check-Out</h3>
            <p>Aggiungi data</p>
          </a>
        </div>

        <div>

          <a href="#">
            <h3>Ospiti</h3>
            <p>Aggiungi ospiti</p>
          </a>

          <a href="#">
            <i class="fas fa-search"></i>
          </a>

        </div>

      </div> <!-- FINE Navbar1 (width 70%)-->

    </div> <!-- FINE div in header con la navbar1 (width 100%)-->

  </div> <!-- END OF BIGGER HEADER -->

</div> <!-- END OF OUTER CONTAINER -->
