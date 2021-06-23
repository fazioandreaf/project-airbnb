<header id="header-search">
    <div id="app">

        <div class="top-header-search">

        <div class="logo">
            <a href="{{route('homepage')}}">
                <img src="{{asset('storage/assets/lg_clr.png')}}" alt="logo-image">
            </a>
        </div>

        <div class="filter">
                <div>
                    <label for="where">
                        Scrivi l'indirizzo
                    </label>
                    <input type="text" id="where" name="where" placeholder="Scrivi l'indirizzo">
                </div>

                <div class="wrapper-form-fields first">
                    <label for="number_rooms">
                        Numeri di stanze
                    </label>
                    <input type="number" id="number_rooms" name="number_rooms" placeholder="1">
                </div>
                <div>
                    <label for="number_beds">
                        Numeri di letti
                    </label>
                    <input type="number" id="number_beds" name="number_beds" placeholder="1">
                </div>
                <div>
                    <label for="guest">
                        Ospiti
                    </label>
                    <input type="number" min=1 id="guest" name="guest" value="1" placeholder="2">
                </div>
                <div>
                    <a href="#" >

                        <i class="fas fa-search"></i>
                    </a>
                </div>
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


        </div>
    </div>

  <!-- SECONDA PARTE DI HEADER-SEARCH -->

  <div class="lower-header-search">

    <ul
    style="display: flex;
    justify-content: center;">
        @foreach ($services as $service)
            <li>
                <a href="#">
                    {{$service-> service}}
                </a>
            </li>
        @endforeach
    </ul>
  </div>

</header>
