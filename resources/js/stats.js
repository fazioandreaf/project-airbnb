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

            dateSplit: function(data, type) {

                let unfiltered = [];
                let splittedDate = "";
                switch(type) {
                    case "views":
                        data.forEach(view => {
                            splittedDate = view.view_date.split("-");
                            unfiltered.push(splittedDate);
                        });
                    break;
                    case "messages":
                        data.forEach(message => {
                            splittedDate = message.created_at.split("-");
                            unfiltered.push(splittedDate);
                        });
                    break;
                }

                return unfiltered;
            },

            filterDates: function(unfiltered, filter) {

                let filtered = [];

                switch(filter) {
                    case 'month':
                        unfiltered.forEach(date => {

                            let month = date[1];
                            filtered.push(month);
                        });
                    break;
                    case 'year':
                        unfiltered.forEach(date => {

                            let year = date[0];
                            filtered.push(year);
                        });
                    break;
                }

                return filtered
            },
            
            generateData: function(filtered, filter) {

                let months = [0,0,0,0,0,0,0,0,0,0,0,0];
                let yearsLabels = [];
                let yearsCount = [];

                if(filter == "month") {
                    filtered.forEach(month => months[month-1]++);
                    console.log(months);
                } else {
                    filtered.forEach(year => {
                        // Create a label for every year inside the array
                        if(!yearsLabels.includes(year))
                            yearsLabels.push(year);
                    })
                    
                   for(let i=0; i<=yearsLabels.length-1; i++) {

                        let search = yearsLabels[i];
                        
                        let count = filtered.reduce((n,year) => {
                            // n + (true) == n + 1
                            // n + (false) = n + 0
                            return n + (year === search)
                        }, 0);

                        yearsCount.push(count);
                   } 

                    console.log(yearsLabels, yearsCount);
                }
            },

            createGraph: function(type, filter) {

                let data;
                let unfiltered;
                let filtered;
                (type == 'views') ? data = this.views : data = this.messages;
                unfiltered = this.dateSplit(data, type, filter);
                filtered = this.filterDates(unfiltered, filter);
                filtered.sort();
                this.generateData(filtered, filter);

                // let months = [0,0,0,0,0,0,0,0,0,0,0,0];
                // filtered.forEach(item => months[item-1]++);
                // console.log(months);
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