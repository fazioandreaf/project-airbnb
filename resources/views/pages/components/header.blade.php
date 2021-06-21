<div class="outer-container">

  <div class="bigger-header">

    <div> <!-- Questo div è header con logo/diventaHost/Login -->

      <span>
        <a href="{{route('homepage')}}">
          <img src="{{asset('storage/assets/lg_color0.png')}}" alt="logo-image">
        </a>
      </span>

      <span>
        <!-- LOGIN NO BOOTSTRAP - DA IMPLEMENTARE <UL><LI> ESSENDO UN MENU -->
        @guest
          @if (Route::has('register'))
            <a href="{{ route('register') }}">
              {{ __('Diventa un Host') }}
            </a>
          @endif

          <a href="{{ route('login') }}">
            <i class="fas fa-bars"></i>
            <i class="fas fa-user"></i>
          </a>
        @endguest
        @auth
          <a href="#">
            {{ Auth::user()->name }}
          </a>
          <a href="{{ route('logout')}}" onclick="
              event.preventDefault();
              document.getElementById('form_logout').submit();"
          >
              {{ __('Logout') }}
          </a>

          <form id="form_logout" method="POST" action="{{ route('logout') }}">
              @csrf
          </form>
          <div>
              <a href="{{route('dashboard',3)}}">
                  Dashboard
              </a>
          </div>
        @endauth
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

          <a href="{{route('search')}}">
            <i class="fas fa-search"></i>
          </a>

        </div>

      </div> <!-- FINE Navbar1 (width 70%)-->

    </div> <!-- FINE div in header con la navbar1 (width 100%)-->

  </div> <!-- END OF BIGGER HEADER -->

</div> <!-- END OF OUTER CONTAINER -->
