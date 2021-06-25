const { default: Axios } = require("axios");

document.addEventListener("DOMContentLoaded", () => {
    const app = new Vue({
        // props:{
        //     request: Object;
        // },
        el: "#search",
        data: {
            where: "",
            number_rooms: 0,
            number_beds: 0,
            guest: 0,
            currentapartment:[],
        },
        mounted: function() {
            console.log("hola");
        },
        methods: {
            log: function() {
                console.log("mundo");
            },
            filter: function() {
                axios
                    .get("api/filter", {
                        params: {
                            where: this.where,
                            number_rooms: this.number_rooms,
                            number_beds: this.number_beds,
                            guest: this.guest,
                        }
                    })
                    .then(res => {
                        if (res.status == 200) {
                            this.currentapartment=res.data;
                        }
                    })
                    .catch(err => console.log(err));
            }
        }
    });
});
