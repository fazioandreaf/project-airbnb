<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>
    {{-- cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/search.js') }}" ></script>

    <!-- Google Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CDN maps -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps-web.min.js'></script>
    <!-- Turf.js -->
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>

    {{-- <script type='text/javascript' src='../assets/js/mobile-or-tablet.js'></script>
    <link rel='stylesheet' type='text/css' href='../assets/ui-library/index.css'/> --}}

  </head>

  <body>
      <div id="search">

          <header id="header-search">
              <div class="top-header-search">
                  <div class="logo">
                      <a href="{{route('homepage')}}">
                          <img src="{{asset('storage/assets/lg_clr.png')}}" alt="logo-image">
                      </a>
                  </div>
                  <div class="filter">
                          <div>
                              <label for="where">
                                  Scrivi l'indirizzo
                              </label>
                              <input type="text" v-model="where" name="where" placeholder="dove">
                          </div>

                          <div class="wrapper-form-fields first">
                              <label for="number_rooms">
                                  Numeri di stanze
                              </label>
                              <input type="number" v-model="number_rooms" name="number_rooms" placeholder="1">
                          </div>
                          <div>
                              <label for="number_beds">
                                  Numeri di letti
                              </label>
                              <input type="number" v-model="number_beds" name="number_beds" placeholder="1">
                          </div>
                          <div>
                              <a href="#" @click="filter()">

                                  <i class="fas fa-search"></i>
                              </a>
                          </div>
                  </div>
                  <div>
                      @guest
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">
                          {{ __('Diventa un Host') }}
                          </a>
                      @endif
                      <a href="{{ route('login') }}">
                          <i class="fas fa-bars"></i>
                          <i class="fas fa-user"></i>
                      </a>
                      @endguest
                      @auth
                      <a href="#">
                          {{ Auth::user()->name }}
                      </a>
                      <a href="{{ route('logout')}}" onclick="
                          event.preventDefault();
                          document.getElementById('form_logout').submit();"
                      >
                          {{ __('Logout') }}
                      </a>
                      <form id="form_logout" method="POST" action="{{ route('logout') }}">
                          @csrf
                      </form>
                      <div>
                          <a href="{{route('dashboard',Auth::id())}}">
                              Dashboard
                          </a>
                      </div>
                      @endauth
                  </div>
              </div>
              <div class="lower-header-search">
                  {{-- <ul
                  style="display: flex;
                  justify-content: center;">
                      @foreach ($services as $service)
                          <li>
                              <a href="#" @click="activeService($service)">
                                  {{$service-> service}}
                              </a>
                          </li>
                      @endforeach

                  </ul> --}}

                  <ul>
                      <li v-for="elem in allservice"
                      :class="toggle?'':'active'"
                      @click="upservice(elem.id),addclass()">
                          @{{elem.service}}
                      </li>
                  </ul>
              </div>
          </header>
          <main>
              <div class="search-page">

                  <!-- UPPER SECTION STARTS HERE -->
                  <div class="left-section"  style="display: flex; flex-direction:column">
                    @if (count($apartments)>0)
                        @foreach ($apartments as $item)

                        <div v-if="currentapartment.length<1" style="display: flex; height:200px; margin:5px; border-bottom: 1px solid lightgray">
                            <div style="flex-basis: 50%">
                                <img src="{{$item->cover_image}}" alt="immagine stanza" style="width:100%; border-radius:10px" >
                            </div>
                            <div  style="display: flex; flex-direction:column; margin:5px; flex-basis:50%">
                                        {{-- <a href="{{route('apartment', $item->id)}}"> --}}
                                        <a @click="redirect(elem.id)">
                                            <h2>
                                                {{$item->title}}
                                            </h2>
                                        </a>
                                        <div onclick="addlayer({{$item -> longitude}},{{$item -> latitude}},{{$item->id}})"> addlayer</div>
                                        <div onclick="calculateDistance()">
                                            distanza fra i punti
                                        </div>
                                        <div onclick="getLatLng('{{$item -> address}}')">
                                            prova latlng
                                        </div>
                                        <a href="#" onclick="makemarker({{$item -> longitude}},{{$item -> latitude}}),goto({{$item -> longitude}},{{$item -> latitude}})">
                                            {{$item -> address}}
                                        </a>
                                        <span>Area : <span style:"font-weight:bolder">{{$item->area}}  m^2</span></span>
                                        <span>Numberi di posti letto: {{$item->number_beds}}</span>
                                        <span>Numbero di stanze: {{$item->number_rooms}}</span>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div>
                        <span>
                            Non abbiamo trovato nessun apartamento
                        </span>
                    </div>
                    @endif
                        <div else  v-for="elem in currentapartment" style="display: flex; height:200px; margin:5px; border-bottom: 1px solid lightgray">
                            <div style="flex-basis: 50%">
                                <img :src=" elem.cover_image " alt="immagine stanza" style="width:100%; border-radius:10px" >
                            </div>
                            <div  style="display: flex; flex-direction:column; margin:5px; flex-basis:50%">
                                        <a href="{{route('apartment',1)}}" >
                                            <h2>
                                                @{{ elem.title }}
                                            </h2>
                                        </a>
                                        <a href="#" onclick="makemarker(@{{elem.longitude}},@{{elem.latitude}})">
                                            @{{elem.address}}
                                        </a>
                                        <span>Area : <span style:"font-weight:bolder">@{{elem.area}}  m^2</span></span>
                                        <span>Numberi di posti letto: @{{elem.number_beds}}</span>
                                        <span>Numbero di stanze: @{{elem.number_rooms}}</span>
                            {{-- <strong else v-for="i in currentapartment">
                                <a href="{{route('apartment', $item->id)}}">@{{ i.title }}</a><br>
                            </strong> --}}
                            {{-- prove mappa lat long
                                <a href="#" onclick="makemarker(15.06619,37.54305)">Defautl</a>
                                <a href="#" @click="log()">Prova</a>--}}

                            </div>

                        </div>
                        {{-- <ul>
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
                        </ul> --}}

                  </div>
                  <div class="right-section">
                      <div id='map' class='map'></div>
                  </div>
                  </div>

                  <!-- INIZIO PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->
                  <!-- FINE PARTE DI DESTRA CON IMMAGINE GRANDE (CALABRIA)-->

              </div>
          </main>
          <footer>
            @include('pages.components.footer')
          </footer>
      </div>
    <script>
        // esempio di creare una funzione che metta tutti i marker nella mappa
        function makemarker(LNG, LAT){
            var marker = new tt.Marker([{height:10,width:10}])
                            .setLngLat([LNG,LAT])
                            .addTo(map);
        };
        // zoom nella porzione che voglio
        function goto(LNG, LAT){
            var point=[LNG,LAT];
            map.easeTo({center:point,zoom:15})
        };
        function addlayer(LNG, LAT,i){
            console.log('ciao');
            map.on('click', function() {
            map.addLayer({
                'id': 'overlay'+i,
                'type': 'fill',
                'source': {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            'coordinates': [[
                                [LNG -1,LAT +1],
                                [LNG +1,LAT +1],
                                [LNG +1,LAT -1],
                                [LNG -1,LAT -1]
                    //             [15.067560533884222, 38.642288177883556],
                    //   [16.267560533884222, 38.642288177883556],
                    //   [16.267560533884222, 36.442288177883556],
                    //   [15.067560533884222, 36.442288177883556],

                            ]]
                        }
                    }
                },
                'layout': {},
                'paint': {
                    // 'circle-radius': 6,
                    // 'circle-color': '#3a3a3a',
                    // 'circle-stroke-width': 2,
                    // 'circle-stroke-color': '#FFF'
                    'fill-color': '#db356c',
                    'fill-opacity': 0.5,
                    'fill-outline-color': 'black'
                }
            });
            });
            console.log('ciao');
        };

        function calculateDistance() {
            // if (points.length < 2) {
            //     return undefined;
            // }
            var totalDistance = {
                kilometers: 0,
                miles: 0
            };
            // for (var i = 1; i < points.length; ++i) {
                // var fromPoint = points[i - 1];
                // var toPoint = points[i];
                var fromPoint = [15.067560533884222, 38.642288177883556];
                var toPoint = [15.067560533884222, 36.642288177883556];
                var kilometers = turf.distance(fromPoint, toPoint);
                var miles = turf.distance(fromPoint, toPoint, { units: 'miles' });
                totalDistance.kilometers = Math.round((totalDistance.kilometers + kilometers) * 100) / 100;
                totalDistance.miles = Math.round((totalDistance.miles + miles) * 100) / 100;
            // }
            return console.log(totalDistance);
        };

        function getLatLng(prova) {
            console.log(prova);
            let position='';
            // let lon=0;
            ;
            axios.get('https://api.tomtom.com/search/2/geocode/'+ prova+ '.JSON?extendedPostalCodesFor=Str&view=Unified&key=v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC')
            .then( res=> {
                // console.log(res.data);
                position=res.data.results[0].position;
                console.log(position);
                goto(position.lon,position.lat);
                makemarker(position.lon,position.lat);
            })
            .catch(err=> console.log(err));
        };



















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

  </body>

</html>
