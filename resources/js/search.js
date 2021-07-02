const { default: Axios } = require("axios");

document.addEventListener("DOMContentLoaded", () => {
    const app = new Vue({
        el: "#search",
        data: {
            dropdownActive: false,
            where: "",
            number_rooms: 1,
            number_beds: 1,
            toggle: true,
            currentapartment: [],
            allservice: [],
            activeservice: [],
            pos1: {},
            pos2: {},
            apartmentrange: [],
            km: 0
        },
        mounted: function() {},
        created: function() {
            setTimeout(() => {
                this.filtro();
            }, 5000);
            axios
                .get("api/service")
                .then(res => {
                    if (res.status == 200) {
                        this.allservice = res.data;
                    }
                })
                .catch(err => console.log(err));
        },
        methods: {
            addclass: function() {
                this.toggle = !this.toggle;
            },
            openDropdown: function() {
                this.dropdownActive = !this.dropdownActive;
            },
            filtro: function() {
                removeMarkerr();
                this.activeservice = [];
                axios
                    .get("api/filter", {
                        params: {
                            where: this.where,
                            number_rooms: this.number_rooms,
                            number_beds: this.number_beds
                        }
                    })
                    .then(res => {
                        if (res.status == 200) {
                            if (res.data.length == 0) {
                                return (this.currentapartment = [
                                    { title: "Nessun appartamento trovato" }
                                ]);
                            }
                            this.currentapartment = res.data;
                        }
                    })
                    .catch(err => console.log(err));
            },
            filtroavanzato: function() {
                removeMarkerr();

                this.activeservice = [];
                axios
                    .get("api/filter", {
                        params: {
                            where: this.where,
                            number_rooms: this.number_rooms,
                            number_beds: this.number_beds
                        }
                    })
                    .then(res => {
                        if (res.status == 200) {
                            if (res.data.length == 0) {
                                return (this.currentapartment = [
                                    { title: "Nessun appartamento trovato" }
                                ]);
                            };

                            axios.get('https://api.tomtom.com/search/2/search/'+ res.data[0].address+ '.JSON?key=v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC')
                                .then(
                                    res=>{
                                        var point=[res.data.results[0].position.lon,res.data.results[0].position.lat];
                                        map.easeTo({center:point,zoom:10});
                                        makemarker(res.data.results[0].position.lon, res.data.results[0].position.lat)
                                    })
                                .catch(err=> console.log(err))};
                            this.currentapartment = res.data;
                        }
                    )
                    .catch(err => console.log(err));
            },

            upservice: function(id) {
                removeMarkerr();
                this.currentapartment = [];
                if (!this.activeservice.includes(id)) {
                    this.activeservice.push(id);
                } else {
                    index = this.activeservice.indexOf(id);
                    this.activeservice.splice(index, 1);
                }
                console.log(this.activeservice);
                axios
                    .get("api/upservice", {
                        params: {
                            service: this.activeservice,
                            where: this.where,
                            number_rooms: this.number_rooms,
                            number_beds: this.number_beds
                        }
                    })
                    .then(res => {
                        console.log(res.data);
                        if (res.data.length == 0) {
                            return (this.currentapartment = [
                                { title: "Nessun appartamento trovato" }
                            ]);
                        }
                        this.currentapartment = res.data;
                    })
                    .catch(err => console.log(err));
            },
            redirect: function(id) {
                window.location.href = "apartments" + id;
            },
            getLatLng: function(address) {
                axios
                    .get(
                        "https://api.tomtom.com/search/2/geocode/" +
                            address +
                            ".JSON?extendedPostalCodesFor=Str&view=Unified&key=v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC"
                    )
                    .then(res => {
                        // console.log(res.data);
                        if (pos.length > 1) {
                            let tmp = pos[1];
                            pos = [tmp];
                        }
                        pos.push(res.data.results[0].position);
                        console.log(pos);
                        goto(pos[pos.length - 1].lon, pos[pos.length - 1].lat);
                        makemarker(
                            pos[pos.length - 1].lon,
                            pos[pos.length - 1].lat
                        );
                    })
                    .catch(err => console.log(err));
            },
            addlayer: function(i, pos) {
                console.log("ciao");
                map.on("click", function() {
                    map.addLayer({
                        id: "overlay" + i,
                        type: "fill",
                        source: {
                            type: "geojson",
                            data: {
                                type: "Feature",
                                geometry: {
                                    type: "Polygon",
                                    coordinates: [
                                        [
                                            [pos.lon - 0.001, pos.lat + 0.001],
                                            [pos.lon + 0.001, pos.lat + 0.001],
                                            [pos.lon + 0.001, pos.lat - 0.001],
                                            [pos.lon - 0.001, pos.lat - 0.001]
                                            //             [15.067560533884222, 38.642288177883556],
                                            //   [16.267560533884222, 38.642288177883556],
                                            //   [16.267560533884222, 36.442288177883556],
                                            //   [15.067560533884222, 36.442288177883556],
                                        ]
                                    ]
                                }
                            }
                        },
                        layout: {},
                        paint: {
                            // 'circle-radius': 6,
                            // 'circle-color': '#3a3a3a',
                            // 'circle-stroke-width': 2,
                            // 'circle-stroke-color': '#FFF'
                            "fill-color": "#12a19a",
                            "fill-opacity": 0.5,
                            "fill-outline-color": "black"
                        }
                    });
                });
                console.log("ciao");
            },
            distcustom: function(pos1, pos2) {
                var totalDistance = {
                    kilometers: 0,
                    miles: 0
                };
                var fromPoint = [pos1.lon, pos1.lat];
                var toPoint = [pos2.lon, pos2.lat];
                // console.log(fromPoint, toPoint);
                var kilometers = turf.distance(fromPoint, toPoint);
                var miles = turf.distance(fromPoint, toPoint, {
                    units: "miles"
                });
                totalDistance.kilometers =
                    Math.round((totalDistance.kilometers + kilometers) * 100) /
                    100;
                totalDistance.miles =
                    Math.round((totalDistance.miles + miles) * 100) / 100;
                return totalDistance;
            },
            latlng: function(elem) {
                axios
                    .get(
                        "https://api.tomtom.com/search/2/geocode/" +
                            elem.address +
                            ".JSON?extendedPostalCodesFor=Str&view=Unified&key=v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC"
                    )
                    .then(res => {
                        this.pos1 = {
                            lat: res.data.results[0].position.lat,
                            lon: res.data.results[0].position.lon
                        };
                        makemarker(this.pos1.lon, this.pos1.lat);
                        goto(this.pos1.lon, this.pos1.lat);
                    })
                    .catch(err => console.log(err));
            },
            latlngcustom: function(elem) {
                axios
                    .get(
                        "https://api.tomtom.com/search/2/geocode/" +
                            elem.address +
                            ".JSON?extendedPostalCodesFor=Str&view=Unified&key=k1fTAPbKkU0oOi0V5dHOHuW4J0oAMIy4"
                    )
                    .then(res => {
                        if (this.pos2.length > 0) {
                            this.pos2 = {};
                        }
                        this.pos2 = {
                            lat: res.data.results[0].position.lat,
                            lon: res.data.results[0].position.lon
                        };
                        tmp = this.distcustom(this.pos1, this.pos2);
                        // console.log(this.pos1, this.pos2, tmp);
                        this.km = tmp.kilometers;

                        // console.log('km',this.km, 'pos1', this.pos1, 'pos2', this.pos2);
                        if (this.km < 20) {
                            this.pos2.address = elem.address;
                            this.pos2.area = elem.area;
                            this.pos2.cover_image = elem.cover_image;
                            this.pos2.created_at = elem.created_at;
                            this.pos2.deleted_at = elem.deleted_at;
                            this.pos2.id = elem.id;
                            this.pos2.number_beds = elem.number_beds;
                            this.pos2.number_rooms = elem.number_rooms;
                            this.pos2.number_toiletes = elem.number_toiletes;
                            this.pos2.title = elem.title;
                            this.pos2.updated_at = elem.updated_at;
                            this.pos2.user_id = elem.user_id;
                            this.pos2.km = this.km;
                            this.apartmentrange.push(this.pos2);
                        }
                        this.pos2 = {};
                        this.km = 0;
                        // console.log(this.apartmentrange);
                    })
                    .catch(err => console.log(err));
            },
            addresrange: function(elem) {
                removeMarkerr();
                this.latlng(elem);
                ar = elem.address.split("-");
                city_target = ar[2];
                addlayer(elem.id, this.pos1);
                for (i = 0; i < this.currentapartment.length - 1; i++) {
                    arr = this.currentapartment[i].address.split("-");
                    city = arr[2];
                    if (
                        city === city_target
                        //  &&
                        // elem.address != this.currentapartment[i].address
                    )
                        this.latlngcustom(this.currentapartment[i]);
                }
                setTimeout(() => {
                    this.apartmentrange.sort(function(a, b) {
                        return a.km - b.km;
                    });
                    this.currentapartment = this.apartmentrange;
                    this.apartmentrange = [];
                    console.log(
                        "time3",
                        this.apartmentrange,
                        this.currentapartment
                    );
                }, 1000);
            }
        }
    });
});
