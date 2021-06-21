@extends('layouts.main_layout')
@section('content')
<div
style="display: flex;
justify-content:center">

    <div
    style="display:flex; flex-basis:50%; flex-wrap: wrap;
    height:400px;background-color:green;color:white;overflow: scroll;">
        Inserimento di card che fanno comparire gli appartament disponibili, come boolflix
        @foreach ($apartments as $item)
            <div
                style="margin:5px;background-color:lightgrey; flex-basis:20%">
                <strong>title: </strong>{{$item->title}}
                <strong>number_rooms: </strong>{{$item->number_rooms}}
                <strong>number_toiletes: </strong>{{$item->number_toiletes}}
                <strong>number_beds: </strong>{{$item->number_beds}}
                <strong>area: </strong>{{$item->area}}
                <strong>address: </strong>{{$item->address}}
            </div>
        @endforeach
    </div>
    <div
    style="display: flex-basis:50%;
    height:400px;background-color:purple;color:white">
        show maps
    </div>
</div>
@endsection
