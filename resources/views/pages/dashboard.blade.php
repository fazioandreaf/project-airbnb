@extends('layouts.main_layout')
@section('content')
    <ul>
        @foreach ($apartments as $item)

        @endforeach
        <li>
            {{$item ->firstname}}
        </li>
        <li>
            {{$item ->lastname}}
        </li>
        <li>
            {{$item ->email}}
        </li>
        <li>
            {{$item ->date_of_birth}}
        </li>
        <li>
            {{count($apartments)}}
        </li>
    </ul>



    {{-- <ul>
        <li>
            {{$apartment -> title}}
        </li>
        <li>
            {{$apartment -> number_rooms}}
        </li>
        <li>
            {{$apartment -> number_toiletes}}
        </li>
        <li>
            {{$apartment -> number_beds}}
        </li>
        <li>
            {{$apartment -> area}}
        </li>
        <li>
            {{$apartment -> address}}
        </li>
        <li>
            {{$apartment -> latitude}}
        </li>
        <li>
            {{$apartment -> longitude}}
        </li>
        <img src="{{$apartment -> cover_image}}" alt="">

    </ul> --}}
@endsection
