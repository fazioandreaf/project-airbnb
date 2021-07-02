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

            messaggio:"hello world",

            labelActive: "profile-infos",
            dropdownActive: false,
            formErrors: [],
            firstname: null,
            lastname: null,
            dateOfBirth: null,
            email: null,
            password: null,
            confirmPassword: null,
            title: null,
            description: null,
            rooms: null,
            toiletes: null,
            beds: null,
            area: null,
            address: null,

            classes: [],

            formErrors: []
        },

        methods: {

            openDropdown: function() {

                this.dropdownActive = !this.dropdownActive;
            },

            documentCloseDropdown: function() {

                this.dropdownActive = false;
            },

            validateNewApartment: function(e) {

                this.formErrors = [];
                const hasNumbers = /\d/;
                const numbers = /^[0-9]+$/;
                const scrollTo = document.getElementById('apartment_infos');
                let input = [];

                // Apartment Title Validation
                if(!this.title) {
                    this.formErrors.push("Il campo titolo è obbligatorio!");
                    input.push("title");
                    
                } else if(this.title.length < 4) {
                    this.formErrors.push("Il campo titolo deve avere almeno 4 caratteri!");
                    input.push("title");
                } else if(this.title.length > 128) {
                    this.formErrors.push("Hai superato il limite di 128 caratteri per il campo titolo!");
                    input.push("title");
                }

                // Description Validation
                if(this.description && this.description.length < 22) {
                    this.formErrors.push("Il campo descrizione deve avere almeno 22 caratteri!");
                    input.push("description");
                }

                // Rooms validation
                if(!this.rooms) {
                    this.formErrors.push("Il campo numero camere è obbligatorio!")
                    input.push("number_rooms");
                } else if(!numbers.test(this.rooms)) {
                    this.formErrors.push("Il campo numero camere deve essere numerico!");
                    input.push("number_rooms");
                } else if(this.rooms < 1) {
                    this.formErrors.push("Il tuo appartamento deve avere almeno 1 stanza!");
                    input.push("number_rooms");
                }

                // Bathrooms validation
                if(!this.toiletes) {
                    this.formErrors.push("Il campo numero bagni è obbligatorio!");
                    input.push("number_toiletes");
                } else if(!numbers.test(this.toiletes)) {
                    this.formErrors.push("Il campo numero bagni deve essere numerico!");
                    input.push("number_toiletes");
                } else if(this.toiletes < 1) {
                    this.formErrors.push("Il tuo appartamento deve avere almeno 1 bagno!");
                    input.push("number_toiletes");
                }

                // Beds validation
                if(!this.beds) {
                    this.formErrors.push("Il campo numero letti è obbligatorio!");
                    input.push("number_beds");
                } else if(!numbers.test(this.beds)) {
                    this.formErrors.push("Il campo numero letti deve essere numerico!");
                    input.push("number_beds");
                } else if(this.beds < 1) {
                    this.formErrors.push("Il tuo appartamento deve avere almeno 1 letto!");
                    input.push("number_beds");
                }

                // Area validation
                if(!this.area) {
                    this.formErrors.push("Il campo metri quadri è obbligatorio!");
                    input.push("area");
                } else if(!numbers.test(this.area)) {
                    this.formErrors.push("Il campo metri quadri deve essere numerico!");
                    input.push("area");
                } else if(this.area < 1) {
                    this.formErrors.push("Devi avere almeno un metro quadro di spazio!");
                    input.push("area");
                }

                // Address validation
                if(!this.address) {
                    this.formErrors.push("Il campo indirizzo è obbligatorio!")
                }

                if(!this.formErrors.length) {
                    return true
                }

                
                this.classes = input;
                console.log(this.classes);
                scrollTo.scrollIntoView({behavior: "smooth"});
                console.log(this.formErrors);
                e.preventDefault();
            },
            
            validateRegister: function(e) {

                const hasNumbers = /\d/;
                const isMailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
                this.formErrors = [];
                const now = Date.now();

                // Name validation
                if(!this.firstname) {

                    this.formErrors.push("Il campo nome è obbligatorio!");
                } else if(this.firstname.length > 128) {

                    this.formErrors.push("Hai davvero un nome così lungo?")
                }

                if(hasNumbers.test(this.firstname)) {
                    this.formErrors.push("Il nome non può contenere numeri!")
                }

                // Lastname validation
                if(!this.lastname) {

                    this.formErrors.push("Il campo cognome è obbligatorio!")
                } else if(this.lastname.length > 128) {

                    this.formErrors.push("Hai davvero un cognome così lungo?")
                }

                if(hasNumbers.test(this.lastname)) {

                    this.formErrors.push("Il cognome non può contenere numeri!")
                }

                // Email validation
                if(!isMailValid.test(this.email)) {

                    this.formErrors.push("La mail inserita non è valida!")
                }

                // Password validation
                if(!this.password) {
                    this.formErrors.push("Il campo password è obbligatorio!")
                } else if(this.password.length < 8) {

                    this.formErrors.push("La password deve contenere almeno 8 caratteri!")
                }
                
                if(this.confirmPassword != this.password) {

                    this.formErrors.push("Le password non corrispondono!")
                }

                // Date of birth validation
                if(!this.dateOfBirth) {
                    
                    this.formErrors.push("Non hai inserito una data dei nascita valida!")
                } else {
                    
                    const date = new Date(this.dateOfBirth).getTime();
                    if (date > now) 
                    this.formErrors.push("Vieni davvero dal futuro?")
                }
                
                if(!this.formErrors.length) {
                    return true
                }

                e.preventDefault(); //!important prevents submit realod
            },

            validateLogin: function(e) {

                const isMailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
                this.formErrors = [];

                // Email validation
                if(!isMailValid.test(this.email)) {

                    this.formErrors.push("La mail inserita non è valida!")
                }

                // Password validation
                if(!this.password) {
                    this.formErrors.push("Il campo password è obbligatorio!")
                } else if(this.password.length < 8) {

                    this.formErrors.push("La password deve contenere almeno 8 caratteri!")
                }
            
                if(!this.formErrors.length) {
                    return true
                }

                e.preventDefault();
            }
        },

        created() {

            document.addEventListener('click', this.documentCloseDropdown)
        }
    });

})
