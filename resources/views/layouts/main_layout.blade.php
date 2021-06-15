<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>AirB&B</title>
  </head>

  <body>

    <header>
      @include('pages.components.header')
    </header>

    <main>
      @yield('content')
    </main>

    <footer>
      @include('pages.components.footer')
    </footer>


  </body>

</html>
