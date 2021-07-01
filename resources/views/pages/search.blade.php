@extends('layouts.search_layout')
@section('content')
    <div class="search-page">

        <div class="left-section">
            @if (count($apartments)>0)
                @foreach ($apartments as $item)
                    <div v-if="currentapartment.length<1" class="row-with-img-text" onload="formarker('ciao')">
                        <div class="sinistra-img">
                            <a href="#">
                                <img src="{{$item->cover_image}}" alt="immagine stanza">
                            </a>
                        </div>
                        <div class="destra-testo">
                            <a href="{{route('apartment', $item->id)}}">
                            {{-- <a @click="redirect(elem.id)"> --}}
                                <h2>{{$item->title}}</h2>
                            </a>
                            <a href="#" onclick="getLatLng('{{$item -> address}}')" @click="addresrange(@{{ elem.title }}))">
                                <strong>Address:</strong>
                                {{$item->address}}
                            </a>

                            <span><strong>Area : </strong><span style:"font-weight:bolder">{{$item->area}}  m^2</span></span>
                            <span><strong>Numberi di posti letto: </strong>{{$item->number_beds}}</span>
                            <span><strong>Numbero di stanze: </strong>{{$item->number_rooms}}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <span>
                        Non abbiamo trovato nessun apartamento
                    </span>
                </div>
            @endif
            <div else  v-for="elem in currentapartment" class="row-with-img-text">
                <div class="sinistra-img">
                    <a href="">
                        <img :src=" elem.cover_image " alt="immagine stanza" style="width:100%; border-radius:10px" >
                    </a>
                </div>
                <div  class="destra-testo">
                    <a href="{{route('apartment',1)}}" >
                        <h2>
                            @{{ elem.title }}
                        </h2>
                    </a>
                    {{-- <a href="#" @click="getLatLng(elem.address)">
                        @{{elem.address}}
                    </a> --}}
                    <a href="#" @click="addresrange(elem)">
                        @{{elem.address}}
                    </a>
                    {{-- <div style="background-color:lightblue" @click="addresrange(elem)">
                        funzione prova
                    </div> --}}


                    <span>Area : <span style:"font-weight:bolder">@{{elem.area}}  m^2</span></span>
                    <span>Numeri di posti letto: @{{elem.number_beds}}</span>
                    <span>Numero di stanze: @{{elem.number_rooms}}</span>

                </div>
            </div>


        </div>
        <div class="right-section">
            <div id='map' class='map'>

        </div>

    </div>

@endsection
