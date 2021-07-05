window.Vue = require('vue');

document.addEventListener('DOMContentLoaded', () => {
  const slider = new Vue({

    el: "#slider",
    data: {
      image: "https://news.cinecitta.com/photo.aspx?s=1&w=850&path=%2Fpublic%2Fnews%2F0069%2F69239%2Fpadre_maronno.jpg",
    },

    methods: {

      forward: function() {
        document.getElementById('slider2').scrollLeft += 220;
        console.log("Forward");
      }, // END OF FORWARD

      backwards: function() {
        document.getElementById('slider2').scrollLeft -= 220;
        console.log("Backwards");
      }, // END OF BACKWARDS

      defaultImage: function(e) {
        e.target.src = this.image;
      }

    }, // END OF methods


  }); // END OF NEW VUE

})
