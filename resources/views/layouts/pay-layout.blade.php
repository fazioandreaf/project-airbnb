<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title></title>
</head>
<body>
    <a href="{{route('homepage')}}">
        <button>
            HomePage
        </button>
    </a>

    @yield('content')

    <footer>
        @include('pages.components.footer')
    </footer>
</body>
</html>