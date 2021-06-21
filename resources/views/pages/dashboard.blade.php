@extends('layouts.main_layout')
@section('content')
    <ul style="background-color: lightgray">
        @foreach ($apartments as $item)

        @endforeach
        <li><strong> Firstname: </strong>
            {{$item ->firstname}}
        </li>
        <li><strong> Lastname: </strong>
            {{$item ->lastname}}
        </li>
        <li><strong> Email:</strong>
            {{$item ->email}}
        </li>
        <li>
            <strong> Date of birth: </strong>
            {{$item ->date_of_birth}}
        </li>
        <li><strong>
            Numbero di case posseduto: </strong>
            <a href="{{route('myapartment',$item->id)}}" style="font-weight:bolder;background-color:green;color:white">

                {{count($apartments)}}
            </a>
        </li>
    </ul>
    <div>
             <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('add',$user->id)}}">add</a>
    </div>



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
