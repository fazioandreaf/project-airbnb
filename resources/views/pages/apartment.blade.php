@extends('layouts.main_layout')
@section('content')
    <div class="container">
        <h1>
            [{{$apartment->id}}] -- {{$apartment->title}}
        </h1>
        <ul>
            <li>
                Stanza :
                {{$apartment->rooms}}
            </li>
            <li>
                Numero letti :
                {{$apartment->bed}}
            </li>
            <li>
                Indirizzo :
                {{$apartment->address}}
            </li>
            <li>
                [{{$apartment->landlord_id}}]
            </li>
        </ul>
    </div>
@endsection