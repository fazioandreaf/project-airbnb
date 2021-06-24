@extends("layouts.main_layout")

@section("content")

  <div class="contain-main">


  <div class="outer-jumbotron">
    <h3 class="title-outer-jmb">
      Cerca tra i preferiti:
    </h3>
    <ul class="apartment-samples">
      @foreach ($apartments as $apartment)
      <li>
        <div class="flags">
          <a href="{{route('apartment', $apartment->id)}}">
            {{ $apartment->id }}
            {{ $apartment->title }}
          </a>
          
        </div>
        
      </li>
      @endforeach
    </ul>

  <div class="section-host" >
    
    <div class="host">
      <h1 class="h1-host">
        Diventa un Host
      </h1>
      <p class="p-host">
        Condividi il tuo Spazio per guadagnare in più e Cogliere Nuove Opportunità.
      </p>
      <button class="btn-host_hmpages" >
        Scopri di più
      </button>
    </div>
  </div>

  </div>

  
@endsection
