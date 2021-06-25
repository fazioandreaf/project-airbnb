@extends('layouts.main_layout')
@section('content')
<div style="height:500px">

    pagina dello sponsor

    <form action="{{Route('form_pay')}}" method="get">
        @csrf
        @method('get')
        
        <div style="text-align: center">
            <div style="margin-top: 20px">
                <h2>
                    {{$apartment->title}}
                </h2>
                <div style="display: none">
                    <label for="apartment_id"></label>
                    <input type="number" name="apartment_id" id="apartment_id" value="{{$apartment->id}}">
                </div>
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
