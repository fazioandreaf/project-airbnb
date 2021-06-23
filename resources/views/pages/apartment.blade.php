@extends('layouts.apartment_layout')
@section('content_apartment')

    {{-- DANNY --}}
    <div class="container" id="apartment-sample">

      {{-- _________ HEADER INIZIA QUI__________ --}}
      <nav>
        <div class="basic-header">

          <div>
            <span>
              <a href="{{route('homepage')}}">
                <img src="{{asset('storage/assets/lg_clr.png')}}" alt="logo-image">
              </a>
            </span>
          </div>

          <div>

            <span id="barra-ricerca">
              <a href="#">
                Inizia la ricerca
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

      </div> {{-- FINE BASIC HEADER--}}
    </nav> {{-- FINE NAV--}}
    {{-- _________ HEADER FINISCE QUI__________ --}}

    {{-- _________JUMBOTRON INIZIA QUI__________ --}}

      <div class="jumbotron-apartment">

        <div id="jumbo-container">

          <div class="titolo">
            <h1>
              {{-- <div>ID:[{{$apartment->id}}]</div> --}}
              {{$apartment->title}}
            </h1>
          </div>


          {{-- <div class="test">
            <img src="{{asset('storage/apartment-img/'.$apartment -> cover_image)}}" alt="">
          </div>

          <ul>
            <li>
              Stanza :
              {{$apartment->number_rooms}}
            </li>
            <li>
              Numero letti :
              {{$apartment->number_beds}}
            </li>
            <li>
              numero bagni :
              {{$apartment->number_toiletes}}
            </li>
            <li>
              Indirizzo :
              [{{$apartment->address}}]
            </li>
            <li>
              area :
              {{$apartment->area}}
            </li>
          </ul>

          <ul>
            @foreach ($apartment->services as $service)
              <li>
                {{$service->service}}
              </li>
            @endforeach
          </ul>

          <h5>
            @foreach ($apartment->sponsors as $apSp)
              <p>
                {{$apSp->sponsor_duration}} durata sponsor
              </p>
            @endforeach
          </h5>

          <div>
            <h5>FORM INVIO MESSAGGIO
              <a href="{{route('send',$apartment->id)}}"
                >SUBMIT INVIO MESSAGGIO</a>
            </h5>
          </div> --}}

        </div>

      </div>
        {{-- _________JUMBOTRON FINISCE QUI__________ --}}


    </div>
  @endsection
