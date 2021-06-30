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
        <a href="{{route('myapartment',Auth::id())}}">
            <button>
                <b>
                    Dashboard 
                </b>
            </button>
        </a>
    </div>
@endsection