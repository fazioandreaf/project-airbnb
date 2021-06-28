const { default: Axios } = require("axios");

document.addEventListener("DOMContentLoaded", () => {
    const app = new Vue({
        // props:{
        //     request: Object;
        // },
        el: "#search",
        data: {
            where: "",
            number_rooms: 1,
            number_beds: 1,
            currentapartment: [],
            allservice: [],
            activeservice: []
        },
        mounted: function() {},
        created: function() {
            // console.log('hola');
            axios
                .get("api/service")
                .then(res => {
                    if (res.status == 200) {
                        this.allservice = res.data;
                        // console.log(this.allservice);
                    }
                })
                .catch(err => console.log(err));
        },
        methods: {
            log: function() {
                console.log("mundo");
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
            // service:function(){
            // // console.log("hola");
            // axios
            //     .get("api/service")
            //     .then(res => {
            //         if (res.status == 200) {
            //             this.allservice = res.data;
            //             // console.log(this.allservice);
            //         }
            //     })
            //     .catch(err => console.log(err));

            // }
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
            }
        }
    });
});
