<header class="landing-header">
    <img src="{{ asset('storage/assets/wallpaper2.webp') }}">
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li id="wrapper-logo">
                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('storage/assets/lg_color0_bianco.png')}}" alt="Logo BoolBnB">
                    </a>
                </li>
                <li class="has-dropdown">
                    <div class="hamburger">
                        <i class="fas fa-bars icon"></i>
                        <i class="fas fa-user icon"></i>
                    </div>
                    <!-- Dropdown -->
                    <ul class="dropdown">
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
                </li>
            </ul>

            <div class="wrapper-search-bar">
                <form class="search-bar" action="{{ route('search') }}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="wrapper-form-fields first">
                        <label for="where">
                            Dove
                        </label>
                        <input type="text" id="where" name="where" placeholder="Dove vuoi andare?">
                    </div>
                    <div class="wrapper-form-fields last">
                        <button type="submit" class="search">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div class="wrapper-new-apartment">
        <h1>
            Bool B&amp;B
        </h1>
        <p class="apartment-text">
            2021 <br>
            Ti presentiamo oltre 100 novità
        </p>
        <a href="{{ route('add') }}" role="button" class="button-link">
            Aggiungi un appartamento
        </a>
    </div>
</header>
