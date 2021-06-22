@extends('layouts.main_layout')
@section('content')
    <div class="container">
        <h1>
            [{{$apartment->id}}] -- {{$apartment->title}}
            {{-- rotta soft-delete --}}
            <a href="{{route('delete',$apartment->id)}}">
                <button>
                    --delete--
                </button>
            </a>
            {{-- rotta per la update --}}
            <a href="{{route('edit',$apartment->id)}}">
                <button>
                --edit--
                </button>
            </a>
        </h1>
                    {{-- form per l'aggiunta sponsor --}}
        <div>
            <form action="{{Route('sponsor_function',$apartment->id)}}" method="get">
                <select name="sponsor_id" id="sponsor_id">
                    @foreach ($sponsors as $sponsor)
                        <option value="{{$sponsor->id}}">
                            {{$sponsor->sponsor_duration}} H
                        </option>
                    @endforeach
                </select>
                <button type="submit">Get</button>
            </form>
        </div>

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
