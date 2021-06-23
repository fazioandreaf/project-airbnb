<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CDN maps -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
    <!-- Turf.js -->
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>

    <style>
        #polygon-info-box {
  font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
  position: fixed;
  top: 10px;
  right: 10px;
  padding: 10px;
  margin: 10px;
  z-index: 1100;
  background-color: white;
  box-shadow: rgba(0, 0, 0, 0.45) 2px 2px 2px 0px;
}

#polygon-info-box label {
  font-size: 1.3em;
  font-weight: bold;
  line-height: 2;
}

#polygon-info-box span {
  font-size: 1.2em;
}

#polygon-info-box {
  text-align: right;
}
    </style>
  </head>

  <body>
    <!-- <header> -->
      @include('pages.components.search_header')
    <!-- </header> -->

    <main>
      @yield('content')
    </main>

    <footer>
      @include('pages.components.footer')
    </footer>

  </body>

</html>
