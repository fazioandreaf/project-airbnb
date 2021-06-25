@extends("layouts.minimal-layout")
@section("content")

<section id="my-apartments">
    <div class="container">
        <div class="wrapper-user-add">
            <h1>
                <span class="username"> 
                    {{ $user->firstname }} {{ $user->lastname}}
                </span>
                - I tuoi appartamenti 
            </h1>
            <a class="button-link" href="{{ route('add')}}">
                Aggiungi un appartamento
                <i class="fas fa-plus-square"></i>
            </a>
        </div>

        @foreach ($apartments as $apartment)
            <my-apartment :apartment="{{ $apartment }}">
            </my-apartment>
            <a href="{{ route('apartment', $apartment->id) }}">
                Visualizza l'appartmanto
            </a>
        @endforeach
    </div>
</section>

@endsection
