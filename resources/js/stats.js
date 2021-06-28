const axios = require("axios");

document.addEventListener("DOMContentLoaded", () => {

    window.Vue = require('vue');

    const stats = new Vue({
        el: "#stats",
        data: {
            apartmentId: "",
            views: {},
            monthViews: [0,0,0,0,0,0,0,0,0,0,0,0],
        },

        methods: {

            getApartmentId: function() {

                const url = window.location.href;
                const params = url.split("/");
                const id = parseInt(params[params.length -1]);
                this.apartmentId = id;  
            },

            getViews: function() {

                axios
                    .get("/api/views/" + this.apartmentId)
                    .then(data => {
                        this.views = data.data;
                        console.log(this.views);
                        this.filterByMonth(this.views);
                    })
                    .catch(error => console.log(error));
            },

            getMessages: function() {
                axios
                    .get("/api/messages/" + this.apartmentId)
                    .then(data => {
                        console.log(data)
                    })
                    .catch(error => console.log(error));
            },

            filterByMonth: function(views) {
                views.forEach(view => {
                    console.log(view.view_date);
                    let splittedDate = view.view_date.split("-");
                    let month = splittedDate[1];
                    this.monthViews[month-1]++;
                });

                this.createStats(this.monthViews);
            },

            createStats: function(monthViews) {

                const ctx = document.getElementById('myChart');
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'],
                        datasets: [{
                            label: '# di Messaggi',
                            data: monthViews,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        },

        mounted() {

            this.getApartmentId();
            this.getViews();
            this.getMessages();
        }
    })
})