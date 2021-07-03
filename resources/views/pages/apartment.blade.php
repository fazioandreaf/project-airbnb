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
            <a href="#">
              {{$apartment->title}}
            </a>
          </h1>
        </div>

        {{-- INIZIO DESCRIZIONE --}}
        <div class="description-apartment">
          <div>
            <span>
              <a href="#">
                {{$apartment->address}}
              </a>
            </span>
          </div>
        </div>
        {{-- FINE DESCRIZIONE --}}

        {{-- _________FINE DESCRIZIONE - INIZIO IMMAGINI___________ --}}

        {{-- INIZIO immagini appartamento --}}
        <div class="apartment-img-container">

          {{-- INIZIO IMMAGINE GRANDE --}}
          <div>
            <a href="#">
              <img class="immagine-grande" src="{{asset('/storage/assets/'.$apartment->cover_image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
            </a>
          </div>
          {{-- FINE IMMAGINE GRANDE --}}

          {{-- INIZIO 4 IMMAGINI --}}
          <div>
            <div>
              <a href="#">
                <img class="immagini-piccole"
                  src="https://source.unsplash.com/375x245/?interior,Room,Home"
                  alt="immagine-qui" style="width: 100%;height: 100%;">
              </a>
            </div>

            <div>
              <a href="#">
                <img class="immagini-piccole"
                  src="https://source.unsplash.com/375x245/?Kitchen,Interior"
                  alt="immagine-qui" style="width: 100%;height: 100%;">
              </a>
            </div>

            <div>
              <a href="#">
                <img class="immagini-piccole"
                  src="https://source.unsplash.com/collection/2048325/375x245"
                  alt="immagine-qui" style="width: 100%;height: 100%;">
              </a>
            </div>

            <div>
              <a href="#">
                <img class="immagini-piccole"
                  src="https://source.unsplash.com/375x245/?Bathroom"
                  alt="immagine-qui" style="width: 100%;height: 100%;">
              </a>
            </div>
          </div>
          {{-- FINE 4 IMMAGINI --}}
        </div>


        {{-- INIZIO SEZIONE DETTAGLI FLAT (SOTTO IMMAGINI) --}}
        <div class="dettagli-flat">

          {{-- INIZIO SEZIONE DI SINISTRA CON ICONE --}}
          <div class="sinistra-dettagli-flat">

            <h2>
              <a href="#">
                TITOLO ANNUNCIO
              </a>
            </h2>

            <ul id="all-four-rows">

              {{-- (1) --}}
              <li class="riga uno">
                <p>{{$apartment->description}}.</p>
              </li>

              {{-- (2) --}}
              <li class="riga due">

                <span>
                  <img src="{{asset('storage/assets/icone_stanze.png')}}" alt="stanze-img">
                  <a href="#">
                    Stanze :
                    {{$apartment->number_rooms}}
                  </a>
                </span>

                <span>
                  <img src="{{asset('storage/assets/icone_letto.png')}}" alt="letto-img" style="width: 50px; height: 50px;">
                  <a href="#">
                    Letti :
                    {{$apartment->number_beds}}
                  </a>
                </span>

                <span>
                  <img src="{{asset('storage/assets/icone_bagno.png')}}" alt="bagno-img" style="width: 50px; height: 50px;">
                  <a href="#">
                    Numero bagni :
                    {{$apartment->number_toiletes}}
                  </a>
                </span>

                <span>
                  <img src="{{asset('storage/assets/icone_area.png')}}" alt="area-img" style="width: 50px; height: 50px;">
                  <a href="#">
                    Area :
                    {{$apartment->area}}mq
                  </a>
                </span>

              </li>

              {{-- (3) --}}
              <li class="riga tre">

                <span>
                  <a href="#">
                    <h3>
                      Servizi extra
                    </h3>
                    <ul class="sub-list">
                      @foreach ($apartment->services as $service)
                        <li>
                          <img src="{{asset('storage/assets/icone_'. $service->service . '.png')}}" alt="servizio-extra" style="width: 40px; height: 40px;">
                          {{$service->service}}
                        </li>
                      @endforeach
                    </ul>
                  </a>
                </span>
              </li>

              {{-- (4) --}}
              <li class="riga quattro">

                <h3>
                  Informazioni utili
                </h3>

                <div class="test">

                  <a href="#">
                    <img src="{{asset('storage/assets/icone_sponsor.png')}}" alt="sponsor-img" style="width: 50px; height: 50px;">
                    @foreach ($apartment->sponsors as $apSp)
                      <p>
                        {{$apSp->sponsor_duration}} ore di sponsor
                      </p>
                    @endforeach
                  </a>

                  <a href="#">
                    <i class="fas fa-pump-soap"></i>
                    <p>
                      Questo host si impegna a seguire la procedura avanzata di pulizia in 5 fasi di BoolB&B.
                    </p>
                  </a>

                </div>
              </li>

            </ul> {{-- FINE OF ALL-FOUR-ROWS --}}

          </div> {{-- FINE SINISTRA DETTAGLI FLATS --}}
          {{-- FINE SEZIONE DI SINISTRA CON ICONE --}}


          {{-- ___INIZIO SEZIONE DI DESTRA___ --}}
          <div class="destra-dettagli-flat">
            <form action="" method="get">
              <span>Scrivi all'host<i class="fas fa-pencil-alt"></i><div>Vedi se ci sono camere disponibili.</div></span>
              <textarea rows="20" cols="30"></textarea>
              <input type="submit" value="Invia">
            </form>
          </div>
          {{-- FINE SEZIONE DI DESTRA --}}

        </div> {{-- FINE DETTAGLI-FLAT (width: 100% height: 600px) --}}

      </div> {{-- ______________ FINE JUMBO CONTAINER __________________ --}}

    </div> {{-- ___JUMBOTRON APARTMENT FINISCE QUI (HEADER PRIMA DI QUESTO)__ --}}

  </div> {{-- _____________________ FINE APARTMENT SAMPLE ______________________ --}}
  @endsection
