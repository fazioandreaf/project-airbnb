@extends('layouts.search_layout')
@section('content')
  <main>
    <div class="search-page">

      <div class="left-section"  style="display: flex; flex-direction:column">
        @foreach ($apartments as $item)

          <div v-if="currentapartment.length<1" style="display: flex; height:200px; margin:5px; border-bottom: 1px solid lightgray">

            <div style="flex-basis: 50%">
              <img src="{{$item->cover_image}}" alt="immagine stanza" style="width:100%; border-radius:10px" >
            </div>


            <div  style="display: flex; flex-direction:column; margin:5px; flex-basis:50%">
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

        <div else  v-for="elem in currentapartment" style="display: flex; height:200px; margin:5px; border-bottom: 1px solid lightgray">

          <div style="flex-basis: 50%">
            <img :src=" elem.cover_image " alt="immagine stanza" style="width:100%; border-radius:10px" >
          </div>

          <div  style="display: flex; flex-direction:column; margin:5px; flex-basis:50%">

            <a href="{{route('apartment',1)}}" >
              <h2>@{{ elem.title }}</h2>
            </a>

            <a href="#" onclick="makemarker({{$item -> longitude}},{{$item -> latitude}})">
              @{{elem.address}}
            </a>

            <span>Area : <span style:"font-weight:bolder">@{{elem.area}}  m^2</span></span>
            <span>Numberi di posti letto: @{{elem.number_beds}}</span>
            <span>Numbero di stanze: @{{elem.number_rooms}}</span>

            {{-- <strong else v-for="i in currentapartment">
            <a href="{{route('apartment', $item->id)}}">@{{ i.title }}</a><br>
            </strong> --}}
            {{-- prove mappa lat long
            <a href="#" onclick="makemarker(15.06619,37.54305)">Defautl</a>
            <a href="#" @click="log()">Prova</a>--}}

          </div>

        </div>
          {{-- <ul>
          <li>latitude e longitude </li>
          @foreach ($apartments as $item)
          <li>
          <a href="#"
          onclick="makemarker({{$item -> longitude}},{{$item -> latitude}})"
          style="background-color:lightgray;padding:0.5rem;border-radius:1rem;padding-bottom:2px; ">
          {{$item -> latitude}} {{$item -> longitude}}
          </a>
          </li>
          @endforeach
          </ul> --}}
      </div>

      <div class="right-section">

        <div id='map' class='map'>
        </div>

      </div>

    </div>
  </main>

@endsection
