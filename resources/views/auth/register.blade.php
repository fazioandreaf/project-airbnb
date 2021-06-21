@extends('layouts.register-layout')

@section('content')

<section id="register-jumbotron">

    <div class="jumbotron">
        <div class="wrapper-text">
            <h2>
                L'ospitalit&agrave; &egrave; la vera essenza di Danny
            </h2>
        </div>
        <div id="app">
            <carousel-component>
            </carousel-component>
        </div>
    </div>

</section>

<section id="section-register">
    <div class="container">
        {{-- Use __('Type_some_text') when you want a localizated text --}}
        {{-- Rivedere come funziona l'attributo autocomplete --}}
        {{-- Aggiungere la gestione degli errori di Laravel --}}
        <h3>
            {{ __('Registrati') }}
        </h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-wrapper-fields">
                <label for="firstname">
                    {{ __('Nome') }}
                </label>
                <input type="text" name="firstname" id="firstname" name="firstname"  required>
            </div>
            <div class="form-wrapper-fields">
                <label for="lastname">
                    {{ __('Cognome') }}
                </label>
                <input type="text" name="lastname" id="lastname" name="lastname"  required>
            </div>
            <div class="form-wrapper-fields">
                <label for="date_of_birth">
                    {{ __('Data di nascita') }}
                </label>
                <input type="text" name="date_of_birth" id="date_of_birth" name="date_of_birth"  required>
            </div>
            <div class="form-wrapper-fields">
                <label for="email">
                    {{ __('Indirizzo e-mail')}}
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-wrapper-fields">
                <label for="password">
                    {{ __('Password') }}
                </label>
                <input type="password" name="password" required>
            </div>

            <div class="form-wrapper-fields">
                <label for="password-confirm">
                    {{ __('Conferma password') }}
                </label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>

            <div class="form-wrapper-fields">
                <button class="form-button" type="submit">
                    {{ __('Registrati') }}
                </button>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
    </div>
</section>
@endsection
