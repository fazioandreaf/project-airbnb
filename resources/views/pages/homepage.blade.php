@extends("layouts.main_layout")

@section("content")
<section id="homepage-test">
  <div class="container">
    <h1>
      <a href="{{route('login')}}">
        B-TEAM RULEZ
      </a>
    </h1>
  </div>
</section>
  <ul>
    @foreach ($apartments as $a)
          <li>
            <a href="{{route('apartment',$a->apartment_id)}}">
              {{$a->apartment_id}}
            </a>
          </li>
    @endforeach

  </ul>
@endsection
