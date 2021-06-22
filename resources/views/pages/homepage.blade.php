@extends("layouts.main_layout")

@section("content")

  <div class="jumbotron">


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
