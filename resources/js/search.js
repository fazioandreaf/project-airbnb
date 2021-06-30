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
            pos1: [],
            pos2: [],
            apartmentrange: [],
            km: []
        },
        mounted: function() {},
        created: function() {
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
            log: function() {
                console.log("mundo");
            },
            addclass: function() {
                this.toggle = !this.toggle;
            },

            openDropdown: function() {

                this.dropdownActive = !this.dropdownActive;
                console.log("LALLERO");
            },

            filter: function() {
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
                            console.log(res.data);
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
            upservice: function(id) {
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
                console.log(address);
                // let lon=0;
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
            addlayer: function(i) {
                if (pos.length < 1) {
                    return alert("Non hai cliccato su nessun appartmanto");
                }
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
                                            [
                                                pos[pos.length - 1].lon - 0.1,
                                                pos[pos.length - 1].lat + 0.1
                                            ],
                                            [
                                                pos[pos.length - 1].lon + 0.1,
                                                pos[pos.length - 1].lat + 0.1
                                            ],
                                            [
                                                pos[pos.length - 1].lon + 0.1,
                                                pos[pos.length - 1].lat - 0.1
                                            ],
                                            [
                                                pos[pos.length - 1].lon - 0.1,
                                                pos[pos.length - 1].lat - 0.1
                                            ]
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
                            "fill-color": "#db356c",
                            "fill-opacity": 0.5,
                            "fill-outline-color": "black"
                        }
                    });
                });
                console.log("ciao");
            },
            calculateDistance: function() {
                // if (points.length < 2) {
                //     return undefined;
                // }
                if (pos.length < 1) {
                    return alert("Non hai cliccato su nessun appartmanto");
                }
                var totalDistance = {
                    kilometers: 0,
                    miles: 0
                };
                // for (var i = 1; i < points.length; ++i) {
                // var fromPoint = points[i - 1];
                // var toPoint = points[i];
                var fromPoint = [pos[0].lon, pos[0].lat];
                var toPoint = [pos[1].lon, pos[1].lat];
                var kilometers = turf.distance(fromPoint, toPoint);
                var miles = turf.distance(fromPoint, toPoint, {
                    units: "miles"
                });
                totalDistance.kilometers =
                    Math.round((totalDistance.kilometers + kilometers) * 100) /
                    100;
                totalDistance.miles =
                    Math.round((totalDistance.miles + miles) * 100) / 100;
                // }
                return totalDistance;
            },
            provdist: function(pos1, pos2) {
                var totalDistance = {
                    kilometers: 0,
                    miles: 0
                };
                var fromPoint = [pos1[0].lon, pos1[0].lat];
                var toPoint = [pos2[0].lon, pos2[0].lat];
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
                        this.pos1.push(res.data.results[0].position);
                        makemarker(this.pos1[0].lon, this.pos1[0].lat);
                        goto(this.pos1[0].lon, this.pos1[0].lat);
                    })
                    .catch(err => console.log(err));
            },
            latlngpos2: function(elem) {
                axios
                    .get(
                        "https://api.tomtom.com/search/2/geocode/" +
                            elem.address +
                            ".JSON?extendedPostalCodesFor=Str&view=Unified&key=v3kCAcjBfYVsbktxmCtOb3CQjgIHZgkC"
                    )
                    .then(res => {
                        if (this.pos2.length > 0) {
                            this.pos2.pop();
                        }
                        this.pos2.push(res.data.results[0].position);
                        tmp = this.provdist(this.pos1, this.pos2);
                        // console.log(this.pos1, this.pos2, tmp);
                        this.km.push(tmp);
                        // console.log(tmp);
                        if (this.km[0].kilometers < 20) {
                            this.pos2[0].distanza = this.km;
                            this.apartmentrange.push(this.pos2);
                        }
                        this.pos2 = [];
                        this.km = [];
                        // console.log(
                        //     "fine then",
                        //     this.pos1,
                        //     this.apartmentrange
                        // );
                    })
                    .catch(err => console.log(err));
            },
            prova: function(elem) {
                this.latlng(elem);
                ar = elem.address.split("-");
                city_target = ar[2];
                for (i = 0; i < this.currentapartment.length - 1; i++) {
                    arr = this.currentapartment[i].address.split("-");
                    city = arr[2];
                    if (
                        city === city_target &&
                        elem.address != this.currentapartment[i].address
                    ) {
                        this.latlngpos2(this.currentapartment[i]);

                    }
                }

                // console.log(this.apartmentrange);
            }
        }
    });
});
