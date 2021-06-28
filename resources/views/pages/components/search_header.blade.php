<header id="header-search">

  <div class="top-header-search">

    <div class="logo">
      <a href="{{route('homepage')}}">
        <img src="{{asset('storage/assets/lg_clr.png')}}" alt="logo-image">
      </a>
    </div>

      <div class="filter">

        <div>
          <label for="where">Dove vuoi andare?</label>
          <input type="text" v-model="where" name="where" placeholder="Roma">
        </div>

        <div class="wrapper-form-fields first">
          <label for="number_rooms">Numeri di stanze</label>
          <input type="number" v-model="number_rooms" name="number_rooms" placeholder="1">
        </div>

        <div>
          <label for="number_beds">Numeri di letti</label>
          <input type="number" v-model="number_beds" name="number_beds" placeholder="1">
        </div>

        <div>
          <a href="#" @click="filter()">
            <i class="fas fa-search"></i>
          </a>
        </div>

      </div> {{-- FINE DI FILTERS --}}

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

  </div> {{-- FINE DI top-header-search --}}

    <div class="lower-header-search">
      <ul>
        <li v-for="elem in allservice" @click="upservice(elem.id)">
          @{{elem.service}}
        </li>
      </ul>
    </div>

</header>
