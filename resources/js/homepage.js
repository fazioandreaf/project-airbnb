document.addEventListener("DOMContentLoaded", () => {

    window.Vue = require('vue');
    
    const slider = new Vue({
        el: "#slider",
        data: {
            test: "Hello world!"
        }
    })
});