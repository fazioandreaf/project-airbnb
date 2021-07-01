@extends("layouts.main_layout")
@section("content")
  <div class="contain-main">


    <div class="outer-jumbotron">

      <h3 class="title-outer-jmb">
        Cerca tra i preferiti:
      </h3>

      <div class="slider-main" id="slider" v-cloak>

        <span>
          <i @click="backwards" class="fas fa-chevron-left"></i>
        </span>

        <ul class="apartment-samples" id="slider2">

          @foreach ($apartments as $apartment)
            <li>
              <div class="flags">
                <a href="{{route('apartment', $apartment->id)}}">
                  <img src="{{asset('/storage/assets/'.$apartment->cover_image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                  {{-- {{ $apartment->id }}
                  {{ $apartment->title }} --}}
                </a>
              </div>
            </li>

          @endforeach

        </ul>

        <span>
          <i @click="forward" class="fas fa-chevron-right"></i>
        </span>

      </div> {{-- end of slider-main --}}



      <div class="section-host" >

        <div class="host">

          <h1 class="h1-host">
            Diventa un Host
          </h1>

          <p class="p-host">
            Condividi il tuo Spazio per guadagnare in più e Cogliere Nuove Opportunità.
          </p>

          <a href="{{ route('register')}}" class="btn-host_hmpages">
            Scopri di più
          </a>


        </div>
      </div>

    </div>

  </div>
@endsection
