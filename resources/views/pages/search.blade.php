@extends('layouts.search_layout')
@section('content')
  <div class="search-page">

    <!-- UPPER SECTION STARTS HERE -->
    <div class="left-section">
      <div>
        <ul> <!-- INIZIO parte superiore con "riepilogo" -->

          <li>
            <a href="#">
              <p>Oltre (numero) alloggi · (data qui) · (numero) ospite</p>
            </a>
          </li>

          <li>
            <a href="#">
              <h2>(Città): alloggi</h2>
            </a>
          </li>

          <li id="scopri-di-piu">
            <a href="#">
              <p>Prima di prenotare, verifica la presenza di eventuali restrizioni di viaggio legate alla pandemia di COVID-19.&#160;</p>
            </a>
            <a href="#">
              <p>Scopri di più</p>
            </a>
          </li>

        </ul> <!-- FINE parte superiore con "riepilogo" -->

        <!-- _________________SECONDA SEZIONE________________________ -->

        <figure> <!-- INIZIO - QUESTA è la parte di sinistra con immagine e descrizione -->

          <div style='margin: 30px 0px'> <!-- INIZIO PRIMO DIV DI SINISTRA CON MINI-IMMAGINE -->
            <span id="immagine-bordo">
              <a href="#">
                <img src="" alt="immagine-qui">
              </a>
            </span>
          </div> <!-- FINE PRIMO DIV DI SINISTRA CON MINI-IMMAGINE -->

          <div style='margin: 30px 0px'> <!-- INIZIO SECONDO DIV DI DESTRA CON DESCRIZIONE -->
            <span> <!-- Riduce altezza e larghezza-->
              <div> <!-- mette gli span che contiene in colonna -->

                <!-- da qui iniziano le righe "colorate" coi dettagli -->

                <span> <!-- INIZIO (1) -->

                  <div>
                    <a href="#">
                      <h4>Descrizione annuncio qui 1</h4>
                    </a>
                  </div>

                  <div>
                    <a href="#">
                      <i class="far fa-heart"></i>
                    </a>
                  </div>

                </span> <!-- FINE (1) -->

                <!-- (2) -->
                <span>
                  <div>
                    <a href="#">
                      <h4>Descrizione annuncio qui 2</h4>
                    </a>
                  </div>
                </span>

                <!-- (3) -->
                <span>
                  <div>
                    <a href="#">
                      <h4>Descrizione annuncio qui 3</h4>
                    </a>
                  </div>
                </span>

                <!-- (4) -->
                <span>
                  <div>
                    <a href="#">
                      <h4>Descrizione annuncio qui 4</h4>
                    </a>
                  </div>
                </span>

                <span> <!-- INIZIO (5) -->

                  <div id="div1-span5">
                    <div>
                      <a href="#">
                        <i class="fas fa-star"></i>
                        <p>(voto)(numero recensioni)</p>
                      </a>
                    </div>
                  </div>

                  <div id="div2-span5">
                    <div>
                      <a href="#">
                        <p>(prezzo)€/notte</p>
                        <p>(prezzo scontato)€</p>
                      </a>
                    </div>
                  </div>

                </span> <!-- FINE (5) -->

                <!-- Qui FINISCONO le righe "colorate" coi dettagli -->

              </div>
            </span>
          </div> <!-- FINE SECONDO DIV DI DESTRA CON DESCRIZIONE -->

        </figure> <!-- FINE - QUESTA è la parte di sinistra con immagine e descrizione -->
      </div>
    </div>

    <!-- INIZIO PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->
    <div class="right-section">
      <!-- <img src="{{asset('storage/assets/calabria-test.jpg')}}" alt="calabria"> -->
    </div>
    <!-- FINE PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->

  </div>
@endsection
