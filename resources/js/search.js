const { default: Axios } = require("axios");

document.addEventListener("DOMContentLoaded", () => {
    const app = new Vue({
        // props:{
        //     request: Object;
        // },
        el: "#app",
        data: {
            address: "",
            number_rooms: 0,
            number_beds: 0,
            guest: 0
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
                    .post("api/filter", {
                        params: {
                            address: "catania"
                        }
                    })
                    .then(res => {
                        if (res.status == 200) {
                            console.log("update");
                        }
                    })
                    .catch(err => console.log(err));
            }
        }
    });
});
