@extends('layouts.minimal-layout')
@section('content')

    <div id="success-message">
        <h3>
            Transaction successful.
        </h3>
        <p>
            <strong>
                The ID is: {{$idTransaction}}
            </strong>
        </p>
        <a href="{{route('homepage')}}">
            <button>
                <b>
                    HomePage
                </b>
            </button>
        </a>
    </div>
@endsection