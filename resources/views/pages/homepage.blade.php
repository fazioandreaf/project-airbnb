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
            {{ $apartment->id }}
          {{ $apartment->title }}
        </a>
        @foreach ($apartment -> sponsors as $i)
            </li>
            <div style="color:white">sponsored
                <span>

                    {{$i -> sponsor_duration }}
                </span>
            </div>
        @endforeach
    @endforeach

</ul>

  @endsection

</div>
