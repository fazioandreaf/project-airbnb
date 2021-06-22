<header id="header-search">

  <div class="top-header-search">

    <div>
      <span>
        <a href="{{route('homepage')}}">
          <img src="{{asset('storage/assets/lg_clr.png')}}" alt="logo-image">
        </a>
      </span>
    </div>

    <div>

      <span>
        <a href="#">
          Luogo
        </a>
      </span>

      <span>
        <a href="#">
          Data
        </a>
      </span>

      <span>
        <a href="#">
          Ospiti
        </a>
        <a href="#">
          <i class="fas fa-search"></i>
        </a>
      </span>

    </div>

    <div>
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
            <a href="{{route('dashboard',Auth::id())}}">
                Dashboard
            </a>
        </div>
      @endauth
    </div>

  </div>

  <!-- SECONDA PARTE DI HEADER-SEARCH -->

  <div class="lower-header-search">

    <ul>

      <li>
        <a href="#">
          <p>Prezzo &#160;<i class="fas fa-angle-down"></i></p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Tipo di alloggio &#160;<i class="fas fa-angle-down"></i></p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Lungo la spiaggia</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Piscina</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Cucina</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Parcheggio gratuito</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Aria condizionata</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Animali domestici ammessi</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Lavatrice</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Wi-fi</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Palestra</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Colazione</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Spazio di lavoro</p>
        </a>
      </li>

      <li>
        <a href="#">
          <p>Filtri</p>
        </a>
      </li>

    </ul>

  </div>

</header>
