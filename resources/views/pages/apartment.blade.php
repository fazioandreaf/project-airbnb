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
              {{-- <div>ID:[{{$apartment->id}}]</div> --}}
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
                <img class="immagine-grande" src="{{$apartment->cover_image}}" alt="immagine-qui" style="width: 100%;height: 100%;">
              </a>
            </div>
            {{-- FINE IMMAGINE GRANDE --}}

            {{-- INIZIO 4 IMMAGINI --}}
            <div>
              <div>
                <a href="#">
                  <img class="immagini-piccole" src="{{$apartment->cover_image}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                </a>
              </div>

              <div>
                <a href="#">
                  <img class="immagini-piccole" src="{{$apartment->cover_image}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                </a>
              </div>

              <div>
                <a href="#">
                  <img class="immagini-piccole" src="{{$apartment->cover_image}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                </a>
              </div>

              <div>
                <a href="#">
                  <img class="immagini-piccole" src="{{$apartment->cover_image}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                </a>
              </div>
            </div>
            {{-- INIZIO 4 IMMAGINI --}}

            {{-- <img src="{{asset('storage/apartment-img/'.$apartment -> cover_image)}}" alt=""> --}}
          </div>
          {{-- FINE immagini appartamento --}}


          {{-- INIZIO SEZIONE DETTAGLI FLAT (SOTTO IMMAGINI) --}}
          <div class="dettagli-flat">

            {{-- INIZIO SEZIONE DI SINISTRA CON ICONE --}}
            <div class="sinistra-dettagli-flat">

              <h2>
                <a href="#">
                  TITOLO ANNUNCIO
                </a>
              </h2>

              <ul>

                <li>
                  <span>
                    <img src="{{asset('storage/assets/icone_stanze.png')}}" alt="stanze-img" style="width: 50px; height: 50px;">
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
                </li>

                <li>
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
                      {{$apartment->area}}
                    </a>
                  </span>

                </li>

                <li>
                  <a href="#">
                    Servizi extra :
                      @foreach ($apartment->services as $service)
                        {{$service->service}}
                        <img src="{{asset('storage/assets/icone_'. $service->service . '.png')}}" alt="">
                      @endforeach
                  </a>
                </li>

                <li>
                  <img src="{{asset('storage/assets/icone_sponsor.png')}}" alt="sponsor-img" style="width: 50px; height: 50px;">
                  <a href="#">
                    @foreach ($apartment->sponsors as $apSp)
                      <p>
                        {{$apSp->sponsor_duration}} ore di sponsor
                      </p>
                    @endforeach
                  </a>
                </li>

              </ul>

            </div>
            {{-- FINE SEZIONE DI SINISTRA CON ICONE --}}

            {{-- INIZIO SEZIONE DI DESTRA --}}
            <div class="destra-dettagli-flat">
              <form action="" method="get">
                <span>Scrivi all'host<div>Vedi se ci sono camere disponibili.</div></span>
                <textarea rows="20" cols="30"></textarea>
                <input type="submit" value="Submit">
              </form>
            </div>
            {{-- INIZIO SEZIONE DI DESTRA --}}

          </div> {{-- FINE DETTAGLI-FLAT (width: 100% height: 600px) --}}










            <div>
              <h5>FORM INVIO MESSAGGIO
                <a href="{{route('send',$apartment->id)}}"
                  >SUBMIT INVIO MESSAGGIO</a>
                </h5>
            </div>



      </div>
    </div>
        {{-- _________JUMBOTRON FINISCE QUI__________ --}}


    </div>
  @endsection
