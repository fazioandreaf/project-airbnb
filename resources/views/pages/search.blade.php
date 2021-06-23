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
            <a href="#" onclick="prova()">Prova</a>
            <ul>
                <li>latitude e longitude </li>
                @foreach ($apartments as $item)
                <li>
                    {{$item -> latitude}} {{$item -> longitude}}
                </li>
                @endforeach
            </ul>

        </div>
      </div>
    </div>

    <!-- INIZIO PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->
    <div class="right-section">
           <div id='map' class='map'></div>
           <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps-web.min.js'></script>
            <script>
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


            // var SEARCH_QUERY = 'Rome';

                // function findGeometry() {
                // tt.services.fuzzySearch({
                //     key: 'v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC',
                //     query: SEARCH_QUERY,
                //     })
                //     .then(getAdditionalData);
                // }
                // map.on('load', findGeometry());
                // function getAdditionalData(fuzzySearchResults) {
                // var geometryId = fuzzySearchResults.results[0].dataSources.geometry.id;
                // tt.services.additionalData({
                //     key: 'v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC',
                //     geometries: [geometryId],
                //     geometriesZoom: 12
                //     })
                //     .then(processAdditionalDataResponse);
                // }
                // function buildLayer(id, data) {
                // return {
                //     'id': id,
                //     'type': 'fill',
                //     'source': {
                //         'type': 'geojson',
                //         'data': {
                //             'type': 'Feature',
                //             'geometry': {
                //                 'type': 'Polygon',
                //                 'coordinates': data
                //             }
                //         }
                //     },
                //     'layout': {},
                //     'paint': {
                //         'fill-color': '#2FAAFF',
                //         'fill-opacity': 0.8,
                //         'fill-outline-color': 'black'
                //     }
                // }
                // }
                // function displayPolygonOnTheMap(additionalDataResult) {
                // var geometryData = additionalDataResult.geometryData.features[0].geometry.coordinates[0];
                // map.addLayer(buildLayer('fill_shape_id', geometryData));
                // return geometryData;
                // }
                // function processAdditionalDataResponse(additionalDataResponse) {
                // if (additionalDataResponse.additionalData && additionalDataResponse.additionalData.length) {
                //     var geometryData = displayPolygonOnTheMap(additionalDataResponse.additionalData[0]);
                // }
                // }
                // function calculateTurfArea(geometryData) {
                // var turfPolygon = turf.polygon(geometryData);
                // var areaInMeters = turf.area(turfPolygon);
                // var areaInKilometers = turf.round(turf.convertArea(areaInMeters, 'meters', 'kilometers'),2);
                // }
                // function calculateTurfArea(geometryData) {
                // var turfPolygon = turf.polygon(geometryData);
                // var areaInMeters = turf.area(turfPolygon);
                // var areaInKilometers = turf.round(turf.convertArea(areaInMeters, 'meters', 'kilometers'),2);
                // var areaInfo = document.getElementById('area-info');
                // areaInfo.innerText = areaInKilometers;
                // }
                // function processAdditionalDataResponse(additionalDataResponse) {
                // if (additionalDataResponse.additionalData && additionalDataResponse.additionalData.length) {
                //     var geometryData = displayPolygonOnTheMap(additionalDataResponse.additionalData[0]);
                //     calculateTurfArea(geometryData);
                // }
                // }



//poligono
    // var markerCoordinates = [
    //   [4.899431, 52.379189],
    //   [4.8255823, 52.3734312],
    //   [4.7483138, 52.4022803],
    //   [4.797049, 52.435065],
    //   [4.885911, 52.320235]
    // ];
    // function drawPointsInsideAndOutsideOfPolygon(geometryData) {
    //   var customInsidePolygonMarkerIcon = 'img/inside_marker.png';
    //   var customOutsideMarkerIcon = 'img/outside_marker.png';
    //   var turfPolygon = turf.polygon(geometryData);
    //   var points = turf.points(markerCoordinates);
    //   var pointsWithinPolygon = turf.pointsWithinPolygon(points, turfPolygon);
    //   markerCoordinates.forEach(function (markerCoordinate) {
    //     const markerElement = document.createElement('div');
    //     markerElement.innerHTML = createMarkerElementInnerHTML(customOutsideMarkerIcon);
    //     pointsWithinPolygon.features.forEach(function (pointWithinPolygon) {
    //       if (markerCoordinate[0] === pointWithinPolygon.geometry.coordinates[0] &&
    //         markerCoordinate[1] === pointWithinPolygon.geometry.coordinates[1]) {
    //           markerElement.innerHTML = createMarkerElementInnerHTML(customInsidePolygonMarkerIcon);
    //       }
    //     });
    //     var marker = new tt.Marker({ element: markerElement}).setLngLat(markerCoordinate);
    //     marker.addTo(map);
    //   });
    // }
    // function processAdditionalDataResponse(additionalDataResponse) {
    //   if (additionalDataResponse.additionalData && additionalDataResponse.additionalData.length) {
    //     var geometryData = displayPolygonOnTheMap(additionalDataResponse.additionalData[0]);
    //     calculateTurfArea(geometryData);
    //     drawPointsInsideAndOutsideOfPolygon(geometryData);
    //   }
    // }


                var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
                var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
                document.body.appendChild(searchBoxHTML);
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
                    console.log(result);
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

// esempio di creare una funzione che metta tutti i marker nella mappa
function prova(){
    var results={
            address:{
                country: "Italia",
                countryCode: "IT",
                countryCodeISO3: "ITA",
                countrySecondarySubdivision: "Catania",
                countrySubdivision: "Sicilia",
                freeformAddress: "Via Fratelli Bandiera 13, 95030 Gravina di Catania",
                localName:"Gravina di Catania",
                municipality: "Gravina di Catania",
                municipalitySubdivision: "Sant'Agata li Battiati",
                postalCode: "95030",
                streetName: "Via Fratelli Bandiera",
                streetNumber: "13",
            },
            boundingBox:{
                btmRightPoint:{
                    lng: 15.07515,
                    lat: 37.53784,
                },
                topLeftPoint:{
                    lng: 15.047,
                    lat: 37.56919,
                },
            },
            dist: 524756.315527082,
            entryPoints:[
                {
                    position:{
                        lat: 37.54219,
                        lng: 15.06746,
                    },
                    type:"main",
                },
            ],
            id: "IT/PAD/p0/5734564",
            position:{
                lat: 15.066353,
                lng:37.542288,
            },
            type: "Point Address",
            viewport:{
                btmRightPoint:{
                    lat: 37.54125,
                    lng: 15.06845,
                },
                topLeftPoint:{
                    lat: 37.54305,
                    lng: 15.06619,
                },
            },
        };
    console.log('ciao');
    // searchMarkersManager.draw([result]);
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
arker.prototype.remove = function () {
                    this.marker.remove();
                    this._map = null;
                };
