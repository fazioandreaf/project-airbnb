@extends('layouts.main_layout')
@section('content')
    <div class="container">
        <h1>
            [{{$apartment->id}}] -- {{$apartment->title}}
        </h1>

        <div class="test">
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

        @foreach ($apartment->sponsors as $apSp)
            <p>
                {{$apSp->sponsor_duration}} durata sponsor
            </p>
        @endforeach
        <div>
            <h1>FORM INVIO MESSAGGIO
                <a href="{{route('send',$apartment->id)}}"
                style="background-color:blue; padding:2rem"
                    >SUBMIT INVIO MESSAGGIO</a>
            </h1>
        </div>
    </div>
@endsection
