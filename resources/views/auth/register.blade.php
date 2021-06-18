@extends('layouts.main_layout')

@section('content')

<div class="container">
    {{-- Use __('Type_some_text') when you want a localizated text --}}
    {{-- Rivedere come funziona l'attributo autocomplete --}}
    {{-- Aggiungere la gestione degli errori di Laravel --}}
    <div>
        {{ __('Register') }}
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-wrapper-fields">
            <label for="firstname">
                {{ __('firstName') }}
            </label>
            <input type="text" name="firstname" id="firstname" name="firstname"  required>
        </div>
        <div class="form-wrapper-fields">
            <label for="lastname">
                {{ __('lastname') }}
            </label>
            <input type="text" name="lastname" id="lastname" name="lastname"  required>
        </div>
        <div class="form-wrapper-fields">
            <label for="date_of_birth">
                {{ __('date_of_birth') }}
            </label>
            <input type="text" name="date_of_birth" id="date_of_birth" name="date_of_birth"  required>
        </div>
        <div class="form-wrapper-fields">
            <label for="email">
                {{ __('Email Address')}}
            </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-wrapper-fields">
            <label for="password">
                Password
            </label>
            <input type="password" name="password" required>
        </div>

        <div class="form-wrapper-fields">
            <label for="password-confirm">
                {{ __('Confirm Password') }}
            </label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <div class="form-wrapper-fields">
            <button type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>

@endsection
