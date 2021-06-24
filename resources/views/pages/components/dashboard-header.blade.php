<header id="dashboard-header">
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
                                Ciao, <span class="username">{{ Auth::user()->firstname }}</span>!
                        </li>
                        <li>
                            <a href="{{ route('homepage') }}">
                                {{ __('Homepage') }}
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
        </div>
    </nav>
</header>