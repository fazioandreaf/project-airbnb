@extends('layouts.main_layout')
@section('content')
<div style="height:500px">

    pagina dello sponsor

    <form action="{{Route('sponsor_function',$apartment->id)}}" method="get"
        enctype="multipart/form-data">
        @csrf
        @method('get')
        
        <div style="text-align: center">
            <div style="margin-top: 20px">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$apartment->title}}" required>
            </div>
            <h2 style="margin: 20px">
                Sponsors
            </h2>
            <div>
                @foreach ($sponsors as $sponsor)
                    <div>
                        <label for="sponsor_id">{{$sponsor->sponsor_duration}} Ore al costo di: {{$sponsor->price}}</label>
                        <input type="checkbox" name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}"
                            @foreach ($apartment->sponsors as $checkedsponsor)
                                @if ($checkedsponsor->id == $sponsor->id)
                                    checked
                                @endif
                            @endforeach
                        >
                    </div>
                @endforeach
            </div>
            <button type="submit">Invia</button>
        </div>
    </form>
</div>
@endsection
