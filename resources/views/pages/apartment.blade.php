@extends('layouts.main_layout')
@section('content')
    <div class="container">
        <h1>
            [{{$apartment->id}}] -- {{$apartment->title}}
            <a href="{{route('delete',$apartment->id)}}">
                --delete--
            </a>
        </h1>
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
        @foreach ($apartment->sponsors as $apSp)
            <p>
                {{$apSp->sponsor_duration}} durata sponsor
            </p>
        @endforeach
    </div>
@endsection