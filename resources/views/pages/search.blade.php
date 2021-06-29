@extends('layouts.search_layout')
@section('content')
  <main>
    <div class="search-page">

      <div class="left-section">
        @foreach ($apartments as $item)

          <div class="row-with-img-text" v-if="currentapartment.length<1">

            <div class="sinistra-img">
              <img src="{{$item->cover_image}}" alt="immagine stanza">
            </div>


            <div class="destra-testo">
              {{-- <a href="{{route('apartment', $item->id)}}"> --}}
              <a @click="redirect(elem.id)">
                <h2>{{$item->title}}</h2>
              </a>

              <a href="#" onclick="makemarker({{$item -> longitude}},{{$item -> latitude}})">
                {{$item->address}}
              </a>

              <span>Area : <span style:"font-weight:bolder">{{$item->area}}  m^2</span></span>
              <span>Numberi di posti letto: {{$item->number_beds}}</span>
              <span>Numbero di stanze: {{$item->number_rooms}}</span>

            </div>

          </div>
        @endforeach

      </div> {{-- FIN DI LEFT-SECTION --}}

      <div class="right-section">

        <div id='map' class='map'>
        </div>

      </div>

    </div>
  </main>

@endsection
