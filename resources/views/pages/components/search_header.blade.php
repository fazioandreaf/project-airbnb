<header id="header-search">

  <div class="top-header-search" id="app">

    <div class="logo">
      <a href="{{route('homepage')}}">
        <img src="{{asset('storage/assets/lg_clr.png')}}" alt="logo-image">
      </a>
    </div>

      <div class="filter">

        <div class="dove-andare">
          <label for="where">Dove vuoi andare?</label>
          <input type="text" v-model="where" name="where" placeholder="Roma" value={{$first_search}}>
        </div>

        <div class="wrapper-form-fields first">
          <label for="number_rooms">Numeri di stanze</label>
          <input type="number" v-model="number_rooms" name="number_rooms" placeholder="1">
        </div>

        <div class="numero-letti">
          <label for="number_beds">Numeri di letti</label>
          <input type="number" v-model="number_beds" name="number_beds" placeholder="1">
        </div>

        <div id="lente">
          <a href="#" @click="filtroavanzato()">
            <i class="fas fa-search"></i>
          </a>
        </div>

        <div class="filtrini">
          <a href="#">
            <i class="fas fa-filter"></i>
          </a>
        </div>

      </div> {{-- FINE DI FILTERS --}}

      <div class="has-dropdown" v-on:click.stop="openDropdown">

        <div class="hamburger">
          <i class="fas fa-bars icon"></i>
          <i class="fas fa-user icon"></i>
        </div>

        <!-- Dropdown -->
        <ul class="dropdown" v-on:click.stop v-bind:class="(dropdownActive) ? 'open' : ''">
          <li>
            {{-- Guest View --}}
          @guest
              @if (Route::has('register'))
                <a href="{{ route('register') }}">
                  {{ __('Diventa un Host') }}
                </a>
              @endif
          </li>

          <li>
            <a href="{{ route('login') }}">
              {{ __('Login') }}
            </a>
          @endguest
          </li>

          <li>
          {{-- Logged view --}}
            @auth
            Ciao, <strong>{{ Auth::user()->firstname }}</strong>!
          </li>

          <li>
            <a href="{{ route('dashboard',Auth::id()) }}">
              {{ __('Dashboard') }}
            </a>
          </li>

          <li>
            <a href="{{ route('logout')}}" onclick="
              event.preventDefault();
              document.getElementById('form_logout').submit();"
              >
              {{ __('Logout') }}
            </a>

            <form id="form_logout" method="POST" action="{{ route('logout') }}">
              @csrf
            </form>
              @endauth
          </li>

        </ul> <!-- end dropdown -->
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
