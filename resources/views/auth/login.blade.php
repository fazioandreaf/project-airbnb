@extends('layouts.main_layout')

@section('content')
    <div class="container">
        {{-- Use __('Type_some_text') when you want a localizated text --}}
        {{-- Rivedere come funziona l'attributo autocomplete --}}
        {{-- Aggiungere la gestione degli errori di Laravel --}}
        <div>{{ __('Login') }}</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="wrapper-form-fields">
                <label for="email">
                    {{ __('E-mail')}}
                </label>
                
                <input type="email" name="email" id="email" value="{{ old('email')}}" autocomplete="email" required>
            </div>

            <div class="wrapper-form-fields">
                <label for="password">
                    {{ __('Password')}}
                </label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="wrapper-form-fields">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}>

                <label for="remember">
                    {{ __('Remember Me')}}
                </label>
            </div>

            <div class="wrapper-form-fields">
                <button type="submit">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
    </div>
@endsection
