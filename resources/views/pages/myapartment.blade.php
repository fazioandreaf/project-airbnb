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

        <div>
            @foreach ($apartments as $apartment)
            <my-apartment :apartment="{{ $apartment }}">
                <template v-slot:view>
                    <a class="button-link" href="{{ route('apartment', $apartment->id) }}">
                        Visualizza
                        <i class="fas fa-eye"></i>
                    </a>
                </template>
                <template v-slot:delete>
                    <a class="button-link delete" href="{{ route('delete', $apartment->id) }}">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </template>
                <template v-slot:edit>
                    <a class="button-link" href="{{ route('edit', $apartment->id) }}">
                        Modifica
                        <i class="fas fa-edit"></i>
                    </a>
                </template>
                <template v-slot:statistic>
                    <a class="button-link" href="{{ route('statistic', $apartment->id) }}">
                        Statistiche
                        <i class="fas fa-chart-bar"></i>
                    </a>
                </template>
                <template v-slot:sponsor>
                    <a class="button-link" href="{{ route('sponsor', $apartment->id) }}">
                        Sponsor
                        <i class="fas fa-euro-sign"></i>
                    </a>
                </template>
            </my-apartment>
            <a href="{{ route('edit_image', $apartment->id) }}">
                <button>
                    edit image
                </button>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection