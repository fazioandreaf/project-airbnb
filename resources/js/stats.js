const axios = require("axios");
import { Chart, registerables } from 'chart.js';
import { indexOf } from 'lodash';
Chart.register(...registerables);

document.addEventListener("DOMContentLoaded", () => {

    window.Vue = require('vue');

    const stats = new Vue({
        el: "#stats",
        data: {
            apartmentId: "",
            views: {},
            messages: {},
            statsData: {},
            years: [],
            selectedYear: ""
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
                    })
                    .catch(error => console.log(error));
            },

            getMessages: function() {
                axios
                    .get("/api/messages/" + this.apartmentId)
                    .then(data => {
                        this.messages = data.data;
                        console.log(this.messages);
                    })
                    .catch(error => console.log(error));
            },

            // dateSplit: function(data, type) {

            //     let unfiltered = [];
            //     let splittedDate = "";
            //     switch(type) {
            //         case "views":
            //             data.forEach(view => {
            //                 splittedDate = view.view_date.split("-").slice(0,2);
            //                 unfiltered.push(splittedDate);
            //             });
            //         break;
            //         case "messages":
            //             data.forEach(message => {
            //                 splittedDate = message.created_at.split("-").slice(0,2);
            //                 unfiltered.push(splittedDate);
            //             });
            //         break;
            //     }

            //     return unfiltered;
            // },

            // filterDatesByYear: function(unfiltered) {

            //     let filtered = [];
            //     let years = [];
            //     let test = [];
            //     console.log(unfiltered);
                            
            //     // switch(filter) {
            //     //     case 'month':
            //     //         unfiltered.forEach(date => {

            //     //             let month = date[1];
            //     //             filtered.push(month);
            //     //         });
            //     //     break;
            //     //     case 'year':
            //     //         unfiltered.forEach(date => {

            //     //             let year = date[0];
            //     //             filtered.push(year);
            //     //         });
            //     //     break;
            //     // }

            //     return unfiltered
            // },
            
            generateData: function(filtered, filter) {

                let months = [0,0,0,0,0,0,0,0,0,0,0,0];
                let yearsLabels = [];
                let yearsCount = [];

                if(filter == "month") {
                    filtered.forEach(month => months[month-1]++);
                    return months
                } else {
                    filtered.forEach(year => {
                        // Create a label for every year inside the array
                        if(!yearsLabels.includes(year))
                            yearsLabels.push(year);
                    })
                    
                   for(let i=0; i<=yearsLabels.length-1; i++) {

                        let search = yearsLabels[i];
                        
                        let count = filtered.reduce((total,year) => {
                            // n + (true) == n + 1
                            // n + (false) = n + 0
                            return total + (year === search)
                        }, 0);

                        yearsCount.push(count);
                        
                   } 
                   return [yearsLabels, yearsCount]
                }
            },

            getYear: function(year) {
                this.selectedYear = year;
                console.log(this.selectedYear);
                console.log([this.statsData[this.selectedYear]]);
            },

            createGraph: function(type) {
                const monthsLabels = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'];
                (type == 'views') ? this.statsData = this.views : this.statsData = this.messages;
                this.years = Object.keys(this.statsData);
                console.log(this.years);
                // unfiltered = this.dateSplit(data,type);

    
                // unfiltered = this.dateSplit(data, type);
                // filtered = this.filterDates(unfiltered);
                // filtered.sort();
                // result = this.generateData(filtered);

                // Chart.js graph
                // const ctx = document.getElementById('statsChart').getContext('2d');
                // let myChart = new Chart(ctx, {
                //     type: 'bar',
                //     data: {
                //         labels: (filter == "month") ? monthsLabels : yearsLabels,
                //         datasets: [{
                //             label: (type == 'views') ? '# di Visualizzazioni' : '# di Messaggi',
                //             data: (filter == "month") ? result : years,
                //             backgroundColor: [
                //                 'rgba(255, 99, 132, 0.2)',
                //             ],
                //             borderColor: [
                //                 'rgba(255, 99, 132, 1)',
                //             ],
                //             borderWidth: 1
                //         }]
                //     },
                //     options: {
                //         scales: {
                //             y: {
                //                 beginAtZero: true
                //             }
                //         }
                //     }
                // });
            }
        },

        mounted() {

            this.getApartmentId();
            this.getViews();
            this.getMessages();
        }
    })
})