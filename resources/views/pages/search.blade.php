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
              <a href="#" style="height: 100%;width: 100%;">
                <img src="{{$apartments[3]->cover_image}}" alt="immagine-qui" style="width: 100%;height: 100%;">
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
                      <a href="#" style="text-align: right">
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
        <div>
            Valori passati dalla ricerca<br>
            <strong>dove</strong>
            {{$request-> where}}<br>
            <strong>check_in</strong>
            {{$request-> check_in}}<br>
            <strong>check_out</strong>
            {{$request-> check_out}}<br>
            <strong>guest</strong>
            {{$request-> guest}}<br>

            @foreach ($services as $item)
            <strong>
                {{$item->service}};
            </strong>
            @endforeach
            {{$apartments[0]}}
            <a href="#" onclick="makemarker(15.06619,37.54305)">Defautl</a>
            <ul>
                <li>latitude e longitude </li>
                @foreach ($apartments as $item)
                <li>
                  <a href="#"
                  onclick="makemarker({{$item -> longitude}},{{$item -> latitude}})"
                  style="background-color:lightgray;padding:0.5rem;border-radius:1rem;padding-bottom:2px; ">
                    {{$item -> latitude}} {{$item -> longitude}}
                  </a>
                </li>
                @endforeach
            </ul>

        </div>
      </div>
    </div>

    <!-- INIZIO PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->
    <div class="right-section">
           <div id='map' class='map'></div>
            <script>
                // esempio di creare una funzione che metta tutti i marker nella mappa
                function makemarker(LNG, LAT){
                    // console.log(LNG, LAT)
                    var marker = new tt.Marker([{height:10,width:10}])
                                    .setLngLat([LNG,LAT])
                                    .addTo(map);
                    console.log('Inserito mark');
                };
                document.addEventListener('DOMContentLoaded',function init(){
                    new Vue({
                        // props:{
                        //     request: Object;
                        // },
                        'el':'#app',
                        'data':{
                            address:"",
                            number_rooms:0,
                            number_beds:0,
                            guest:0,
                        },
                        mounted:function(){
                            console.log('ciao');
                        },
                        'methods':{

                        },
                    });
                });
                var map = tt.map({
                    key: 'v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC',
                    container: 'map',
                    // dragPan: !isMobileOrTablet()
                });
                map.addControl(new tt.FullscreenControl());
                map.addControl(new tt.NavigationControl());
                var options = {
                    searchOptions: {
                        key: 'v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC',
                        language: 'it-IT',
                        limit: 5
                    },
                    autocompleteOptions: {
                        key: 'v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC',
                        language: 'it-IT'
                    }
                };


                var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
                var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
                // document.body.appendChild(searchBoxHTML);
                var map = tt.map({
                    key: 'v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC',
                    container: 'map',
                    center: [12.59, 41.86 ],
                    zoom: 5,
                });
                var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
                var searchMarkersManager = new SearchMarkersManager(map);
                ttSearchBox.on('tomtom.searchbox.resultsfound', handleResultsFound);
                ttSearchBox.on('tomtom.searchbox.resultselected', handleResultSelection);
                ttSearchBox.on('tomtom.searchbox.resultfocused', handleResultSelection);
                ttSearchBox.on('tomtom.searchbox.resultscleared', handleResultClearing);
                map.addControl(ttSearchBox, 'top-left');

                //    handleResultsFound - executes when the search results are found. The event handler clears previously founded results and draws new. After that, it will try to fit drawn results on a vewport by executing fitToViewport method.
                //   handleResultSelection - executes in two cases:
                //        - results were found and a user presses arrow up/down;
                //      - results were found and a user chooses one by clicking on it;
                //    handleResultClearing - executes when a user clicks on "X" button of the SearchBox. As a result, all founded results will be cleared from the map.

                function handleResultsFound(event) {
                    var results = event.data.results.fuzzySearch.results;

                    if (results.length === 0) {
                        searchMarkersManager.clear();
                    }
                    searchMarkersManager.draw(results);
                    fitToViewport(results);
                }
                function handleResultSelection(event) {
                    var result = event.data.result;
                    if (result.type === 'category' || result.type === 'brand') {
                        return;
                    }
                    // console.log(result);
                    searchMarkersManager.draw([result]);
                    fitToViewport(result);
                }
                function fitToViewport(markerData) {
                    if (!markerData || markerData instanceof Array && !markerData.length) {
                        return;
                    }
                    var bounds = new tt.LngLatBounds();
                    if (markerData instanceof Array) {
                        markerData.forEach(function (marker) {
                            bounds.extend(getBounds(marker));
                        });
                    } else {
                        bounds.extend(getBounds(markerData));
                    }
                    map.fitBounds(bounds, { padding: 1000, linear: true });
                }
                function getBounds(data) {
                    var btmRight;
                    var topLeft;
                    if (data.viewport) {
                        btmRight = [data.viewport.btmRightPoint.lng, data.viewport.btmRightPoint.lat];
                        topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat];
                    }
                    return [btmRight, topLeft];
                }
                function handleResultClearing() {
                    searchMarkersManager.clear();
                }


                //After all these predefined steps we can create SearchMarkersManager, which will be responsible for manipulation with a marker.
                // In our example it has draw and clear methods
                function SearchMarkersManager(map, options) {
                    this.map = map;
                    this._options = options || {};
                    this._poiList = undefined;
                    this.markers = {};
                }
                    SearchMarkersManager.prototype.draw = function (poiList) {

                        console.log(poiList);
                        this._poiList = poiList;
                        this.clear();
                        this._poiList.forEach(function (poi) {
                            var markerId = poi.id;
                            var poiOpts = {
                                name: poi.poi ? poi.poi.name : undefined,
                                address: poi.address ? poi.address.freeformAddress : '',
                                distance: poi.dist,
                                classification: poi.poi ? poi.poi.classifications[0].code : undefined,

                                // esempio di position che arriva da result position: Object { lng: 15.08783, lat: 37.50248 }
                                position: poi.position,
                                entryPoints: poi.entryPoints
                            };
                            var marker = new SearchMarker(poiOpts, this._options);
                            marker.addTo(this.map);
                            this.markers[markerId] = marker;
                        }, this);
                    };
                    SearchMarkersManager.prototype.clear = function () {
                        for (var markerId in this.markers) {
                            var marker = this.markers[markerId];
                            marker.remove();
                        }
                        this.markers = {};
                        this._lastClickedMarker = null;
                    };

                //and SearchMarker, which will be responsible for appearance of the marker and providing possibility add/remove it from the map
                function SearchMarker(poiData, options) {
                    this.poiData = poiData;
                    this.options = options || {};
                    this.marker = new tt.Marker({
                        element: this.createMarker(),
                        anchor: 'bottom'
                    });
                    var lon = this.poiData.position.lng || this.poiData.position.lon;
                    this.marker.setLngLat([
                        lon,
                        this.poiData.position.lat
                    ]);
                }
                    SearchMarker.prototype.addTo = function (map) {
                        this.marker.addTo(map);
                        this._map = map;
                        return this;
                    };
                    SearchMarker.prototype.createMarker = function () {
                        var elem = document.createElement('div');
                        elem.className = 'tt-icon-marker-black tt-search-marker';
                        if (this.options.markerClassName) {
                            elem.className += ' ' + this.options.markerClassName;
                        }
                        var innerElem = document.createElement('div');
                        innerElem.setAttribute('style', 'background: white; width: 10px; height: 10px; border-radius: 50%; border: 3px solid black;');

                        elem.appendChild(innerElem);
                        return elem;
                    };
                    SearchMarker.prototype.remove = function () {
                        this.marker.remove();
                        this._map = null;
                    };

                    ttSearchBox.updateOptions({
                        minNumberOfCharacters: 5,
                        showSearchButton: false,
                        labels: {
                            placeholder: 'Scrivi la città'
                        }
                    });
            </script>
    </div>
    <!-- FINE PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->

  </div>
@endsection
