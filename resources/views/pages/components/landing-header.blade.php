<header class="landing-header">
    <img src="{{ asset('storage/assets/wallpaper2.webp') }}">
    <nav class="navbar">
        <ul class="nav-links">
            <li>
                <a href="{{ route('homepage') }}">
                    <img src="{{ asset('storage/assets/lg_color0.png')}}" alt="Logo BoolBnB">
                </a>
            </li>
            <li>
                {{-- Guest View --}}
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
                {{-- Logged view --}}
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
            </li>
            <li>
                <a href="{{ route('dashboard',Auth::id()) }}">
                    Dashboard
                </a>
            </li>
                @endauth
        </ul>
    </nav>
</header>