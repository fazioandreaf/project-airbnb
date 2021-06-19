@extends("layouts.main_layout")

@section("content")

<div class="homepage">

  <section id="homepage-test">
    <div class="container">
      <h1>
        <a href="{{route('login')}}">
          THIS IS THE MAIN
        </a>
        <a href="{{route('search')}}">Search advanced</a>
      </h1>
    </div>
    {{-- rotta per la create --}}
    <a href="{{route('add')}}">
      <button style="width: 300px">
        NEW APARTMENT
      </button>
    </a>
  </section>

  <ul class="apartment-samples">
    @foreach ($apartments as $apartment)
      <li>
        <a href="{{route('apartment', $apartment->id)}}">
            {{ $apartment->apartment_id }}
            {{ $apartment->title }}
        </a>
      </li>
    @endforeach

</ul>

  @endsection

</div>
