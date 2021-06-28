const axios = require("axios");

document.addEventListener("DOMContentLoaded", () => {

    window.Vue = require('vue');

    const stats = new Vue({
        el: "#stats",
        data: {
            apartmentId: "",
            views: {},
            messages: {},
            filterType: "month",
            monthViews: [],
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
                    })
                    .catch(error => console.log(error));
            },

            getMessages: function() {
                axios
                    .get("/api/messages/" + this.apartmentId)
                    .then(data => {
                        this.messages = data.data;
                    })
                    .catch(error => console.log(error));
            },

            filter: function(data, type, filter) {

                switch(type) {
                    case "views":
                        this.monthViews = [0,0,0,0,0,0,0,0,0,0,0,0];
                        data.forEach(view => {
                            let splittedDate = view.view_date.split("-");
                            let month = splittedDate[1];
                            console.log(view.view_date);
                            this.monthViews[month-1]++;
                        });
                        console.log(this.monthViews);
                    break;
                    case "messages":
                        data.forEach(message => {
                            console.log(message.created_at);
                        });
                    break;
                }
            },

            createGraph: function(type, filter) {

                let data;
                (type == 'views') ? data = this.views : data = this.messages;
                this.filter(data, type, filter);
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

                const monthsLabel = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'];

                const ctx = document.getElementById('viewsChart');
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: (monthViews) ? monthsLabel : '',
                        datasets: [{
                            label: '# di Visualizzazioni',
                            data: monthViews,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
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