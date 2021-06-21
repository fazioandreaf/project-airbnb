@extends("layouts.main_layout")

@section("content")

  <div class="jumbotron">
    <section>
<<<<<<< HEAD

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
    </section>
  </div>

=======

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
        <button>
          NEW APARTMENT
        </button>
      </a>

    </section>
  </div>

>>>>>>> Danny7
  <div class="outer-jumbotron">
    <ul class="apartment-samples">
      @foreach ($apartments as $apartment)
      <li>
        <a href="{{route('apartment', $apartment->id)}}">
          {{ $apartment->id }}
          {{ $apartment->title }}
        </a>
      </li>
      @endforeach
    </ul>
<<<<<<< HEAD

    {{-- rotta per la create --}}
    <a href="{{route('add')}}">
      <button style="width: 300px">
        NEW APARTMENT
      </button>
    </a>


  </section>
</div>

<div class="outer-jumbotron">
  <ul class="apartment-samples">
    @foreach ($apartments as $apartment)
    <li>
      <a href="{{route('apartment', $apartment->id)}}">
        {{ $apartment->id }}
        {{ $apartment->title }}
      </a>
    </li>
    @endforeach
  </ul>
</div>

=======
  </div>
>>>>>>> Danny7
@endsection
