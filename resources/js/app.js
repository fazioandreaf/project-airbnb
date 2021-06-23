/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

document.addEventListener('DOMContentLoaded', () => {
    const app = new Vue({
        el: '#app',
        data: {

            registerErrors: [],
            firstname: null,
            lastname: null,
            dateOfBirth: null,
            email: null,
            password: null,
            confirmPassword: null,
        },

        methods: {

            validateRegister: function(e) {

                const hasNumbers = /\d/;
                const isMailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
                this.registerErrors = [];

                // Name validation
                if(!this.firstname) {

                    this.registerErrors.push("Il nome è un campo obbligatorio!");
                } else if(this.firstname.length > 10) {

                    this.registerErrors.push("Hai davvero un nome così lungo?")
                } 

                if(hasNumbers.test(this.firstname)) {
                    this.registerErrors.push("Il nome non può contenere numeri!")
                }

                // Lastname validation
                if(!this.lastname) {

                    this.registerErrors.push("Il campo cognome è un campo obbligatorio!")
                } else if(this.lastname.length > 10) {

                    this.registerErrors.push("Hai davvero un cognome così lungo?")
                }

                if(hasNumbers.test(this.lastname)) {

                    this.registerErrors.push("Il cognome non può contenere numeri!")
                }

                // Email validation
                if(!isMailValid.test(this.email)) {
                    
                    this.registerErrors.push("La mail inserita non è valida!")
                }

                // Password validation
                if(this.password.length < 8) {

                    this.registerErrors.push("La password deve contenere almeno 8 caratteri!")
                }

                if(this.confirmPassword != this.password) {

                    this.registerErrors.push("Le password non corrispondono!")
                }

                if(!this.registerErrors.length) {
                    return true
                }

                e.preventDefault(); //!important prevents submit realod
            }
        }
    });

})

