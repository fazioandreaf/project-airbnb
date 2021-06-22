@extends("layouts.main_layout")

@section("content")

  <div class="jumbotron">


      <ul>
        <li>
          <a href="{{route('login')}}">
            <h1>BoolB&B</h1>
          </a>
          <span>2021</span>
        </li>

        <li>
          <h2>Ti presentiamo<div>oltre 100 novità</div></h2>
        </li>
      </ul>

      {{-- rotta per la create --}}
      <a href="{{route('add')}}">
        <button style="width: 300px">
          NEW APARTMENT
        </button>
      </a>
  </div>

  <div class="outer-jumbotron">
    <h3>Una casa ovunque nel mondo</h3>
    <ul class="apartment-samples ">
      @foreach ($apartments as $apartment)
      <li class="flags">
        <a href="{{route('apartment', $apartment->id)}}">
          {{ $apartment->id }}
          {{ $apartment->title }}
        </a>
      </li>
      @endforeach
    </ul>
  </div>

  <div>
    <h1>Regalati un Esperienza</h1>
    <p>che il tuo viaggio non sia solo un sogno</p>
  </div>

  <div class="host">
    <h1>Diventa un Host</h1>
    <p>Condividi il tuo spazio per guadagnare in più e cogliere nuove opportunità.</p>
    <button>Scopri di più</button>
  </div>
@endsection
