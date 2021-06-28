@extends('layouts.main_layout')
@section('content')
    <style>
        #success-message{
            width: 500px;
            margin: 50px auto;
            border: 1px solid black;
            padding: 50px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        button{
            width: 110px;
            height: 35px;
            border-radius: 10px;
            border: none;
            background-color: #f66d9b;
            cursor: pointer;
        }
    </style>

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