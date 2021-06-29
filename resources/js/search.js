const { default: Axios } = require("axios");

document.addEventListener("DOMContentLoaded", () => {
    const app = new Vue({
        el: "#search",
        data: {
            where: "",
            number_rooms: 1,
            number_beds: 1,
            toggle: true,
            currentapartment: [],
            allservice: [],
            activeservice: []
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
                return console.log(totalDistance);
            },
            prova: function(elem) {
                console.log(elem);
                let posizione_elem = pos[pos.length - 1];
                console.log(posizione_elem);
            }
        }
    });
});
