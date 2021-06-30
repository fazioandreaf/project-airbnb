@extends("layouts.main_layout")

@section("content")

  <div class="contain-main">


  <div class="outer-jumbotron">
    <h3 class="title-outer-jmb">
      Cerca tra i preferiti:
    </h3>

    {{--------------------- INIZIO DANNY SLIDER ----------------------}}
    <div class="danny-slider" id="app">

      <!---__________ FRECCIA SINISTRA __________ -->
      <div class="freccia-sinistra">
        <a href="#">
          <i @click="backwards" class="fas fa-chevron-left"></i>
        </a>
      </div>

      <!---__________ FOTO __________ -->
      <div class="foto" data-options="step: 0; speed: 4000;">
        <img class="picture active" :src="images[activeImg]">
      </div>

      <!---__________ FRECCIA DESTRA __________ -->
      <div class="freccia-destra">
        <a href="#">
          <i @click="forward" class="fas fa-chevron-right"></i>
        </a>
      </div>

    </div>
    {{--------------------- FINE DANNY SLIDER ----------------------}}




    {{-- <ul class="apartment-samples">

      <span>
        <a href="#">
          <i class="fas fa-chevron-left"></i>
        </a>
      </span>

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
      <span>
        <a href="#">
          <i class="fas fa-chevron-right"></i>
        </a>
      </span>
    </ul> --}}

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
