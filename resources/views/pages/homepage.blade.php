@extends("layouts.main_layout")

@section("content")

<div class="homepage">

  <section id="homepage-test">
    <div class="container">
      <h1>
        <a href="{{route('login')}}">
          THIS IS THE MAIN
        </a>
      </h1>
    </div>
  </section>

  <ul class="apartment-samples">
    @foreach ($apartments as $a)
      <li>
        <a href="{{route('apartment',$a->apartment_id)}}">
          {{$a->apartment_id}}
        </a>
      </li>
    @endforeach
  </ul>

  @endsection

</div>
