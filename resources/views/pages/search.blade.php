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

          <div> <!-- INIZIO PRIMO DIV DI SINISTRA CON MINI-IMMAGINE -->
            <span>
              <a href="#">
                <img src="" alt="immagine-qui">
              </a>
            </span>
          </div> <!-- FINE PRIMO DIV DI SINISTRA CON MINI-IMMAGINE -->

          <div> <!-- INIZIO SECONDO DIV DI DESTRA CON DESCRIZIONE -->
            <span> <!-- Riduce altezza e larghezza-->
              <div> <!-- mette gli span che contiene in colonna -->

                <!-- da qui iniziano le righe "colorate" coi dettagli -->

                <span> <!-- INIZIO (1) -->

                  <div>

                  </div>

                  <div>

                  </div>

                </span> <!-- FINE (1) -->

                <!-- (2) -->
                <span></span>

                <!-- (3) -->
                <span></span>

                <!-- (4) -->
                <span></span>

                <span> <!-- INIZIO (5) -->

                  <div>

                  </div>

                  <div>

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
    </div>
    <!-- FINE PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->

  </div>
@endsection
