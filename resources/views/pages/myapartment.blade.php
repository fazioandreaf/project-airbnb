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
                <i class="fas fa-plus"></i>
            </a>
        </div>

        @foreach ($apartments as $apartment)
            <my-apartment :apartment="{{ $apartment }}">
                <template v-slot:view>
                    <a class="button-link" href="{{ route('apartment', $apartment->id) }}">
                        Visualizza
                    </a>
                </template>
                <template v-slot:delete>
                    <a class="button-link" href="{{ route('delete', $apartment->id) }}">
                        Elimina
                    </a>
                </template>
                <template v-slot:edit>
                    <a class="button-link" href="{{ route('edit', $apartment->id) }}">
                        Modifica
                    </a>
                </template>
            </my-apartment>
        @endforeach
    </div>
</section>

@endsection
