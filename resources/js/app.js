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
            isShowing: false,
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
            formErrors: [],
            fixedNavbar: false,
        },

        methods: {

            toggleNavbar: function() {

                window.addEventListener("scroll", () => {
                    if(window.scrollY > 100 && window.innerWidth > 420) {
                        this.fixedNavbar = true;
                        console.log("fixed")
                    } else if(window.scrollY == 0) {
                        this.fixedNavbar = false;
                    }
                });
            },

            openDropdown: function() {

                this.dropdownActive = !this.dropdownActive;
            },

            documentCloseDropdown: function() {

                this.dropdownActive = false;
            },
            
            validateEditApartment: function(e) {
                this.formErrors = [];
                const hasNumbers = /\d/;
                const numbers = /^[0-9]+$/;
                const scrollTo = document.getElementById('edit-section');
                let input = [];

                // Apartment Title Validation
                if(!this.title) {
                    this.formErrors.push("Il campo titolo ?? obbligatorio!");
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
                    this.formErrors.push("Il campo numero camere ?? obbligatorio!")
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
                    this.formErrors.push("Il campo numero bagni ?? obbligatorio!");
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
                    this.formErrors.push("Il campo numero letti ?? obbligatorio!");
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
                    this.formErrors.push("Il campo metri quadri ?? obbligatorio!");
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
                    this.formErrors.push("Il campo indirizzo ?? obbligatorio!");
                    input.push("address");
                }

                if(!this.formErrors.length) {
                    return true
                }

                this.classes = input;
                scrollTo.scrollIntoView({behavior: "smooth"});
                console.log(this.formErrors);
                e.preventDefault();
            },

            validateNewApartment: function(e) {

                this.formErrors = [];
                const hasNumbers = /\d/;
                const numbers = /^[0-9]+$/;
                const scrollTo = document.getElementById('apartment_infos');
                let input = [];

                // Apartment Title Validation
                if(!this.title) {
                    this.formErrors.push("Il campo titolo ?? obbligatorio!");
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
                    this.formErrors.push("Il campo numero camere ?? obbligatorio!")
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
                    this.formErrors.push("Il campo numero bagni ?? obbligatorio!");
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
                    this.formErrors.push("Il campo numero letti ?? obbligatorio!");
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
                    this.formErrors.push("Il campo metri quadri ?? obbligatorio!");
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
                    this.formErrors.push("Il campo indirizzo ?? obbligatorio!");
                    input.push("address");
                }

                if(!this.formErrors.length) {
                    return true
                }

                
                this.classes = input;
                scrollTo.scrollIntoView({behavior: "smooth"});
                console.log(this.formErrors);
                e.preventDefault();
            },
            
            validateRegister: function(e) {

                const scrollTo = document.getElementById("section-register");
                const hasNumbers = /\d/;
                const isMailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
                this.formErrors = [];
                const now = Date.now();
                let input = [];

                // Name validation
                if(!this.firstname) {

                    this.formErrors.push("Il campo nome ?? obbligatorio!");
                    input.push("firstname");
                } else if(this.firstname.length > 255) {

                    this.formErrors.push("Hai davvero un nome cos?? lungo?");
                    input.push("firstname");
                }

                if(hasNumbers.test(this.firstname)) {
                    this.formErrors.push("Il nome non pu?? contenere numeri!");
                    input.push("firstname");
                }

                // Lastname validation
                if(!this.lastname) {

                    this.formErrors.push("Il campo cognome ?? obbligatorio!");
                    input.push("lastname");
                } else if(this.lastname.length > 255) {

                    this.formErrors.push("Hai davvero un cognome cos?? lungo?");
                    input.push("lastname");
                }

                if(hasNumbers.test(this.lastname)) {

                    this.formErrors.push("Il cognome non pu?? contenere numeri!");
                    input.push("lastname");
                }

                // Email validation
                if(!isMailValid.test(this.email)) {

                    this.formErrors.push("La mail inserita non ?? valida!");
                    input.push("email");
                } else if(this.email.length > 255) {
                    this.formErrors.push("La mail inserita supera il limite di caratteri consentiti!");
                    input.push("email");
                }

                // Password validation
                if(!this.password) {
                    this.formErrors.push("Il campo password ?? obbligatorio!");
                    input.push("password");
                } else if(this.password.length < 8) {

                    this.formErrors.push("La password deve contenere almeno 8 caratteri!");
                    input.push("password");
                }

                if(this.confirmPassword != this.password) {

                    this.formErrors.push("Le password non corrispondono!");
                    input.push("confirm-password");
                }

                // Date of birth validation
                if(!this.dateOfBirth) {
                    
                    this.formErrors.push("Non hai inserito una data dei nascita valida!");
                    input.push("date_of_birth");
                } else {

                    const date = new Date(this.dateOfBirth).getTime();
                    if (date > now) {

                        this.formErrors.push("Vieni davvero dal futuro?");
                        input.push("date_of_birth");
                    }
                }
                
                if(!this.formErrors.length) {
                    return true
                }

                scrollTo.scrollIntoView({behavior: "smooth"});
                this.classes = input;
                e.preventDefault(); //!important prevents submit realod
            },

            validateLogin: function(e) {

                const scrollTo = document.getElementById("login-section");
                const isMailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
                this.formErrors = [];
                let input = [];

                // Email validation
                if(!isMailValid.test(this.email)) {

                    this.formErrors.push("La mail inserita non ?? valida!");
                    input.push('email');
                }

                // Password validation
                if(!this.password) {
                    this.formErrors.push("Il campo password ?? obbligatorio!");
                    input.push('password');
                } else if(this.password.length < 8) {

                    this.formErrors.push("La password deve contenere almeno 8 caratteri!");
                    this.input.push('password');
                }
            
                if(!this.formErrors.length) {
                    return true
                }

                this.classes = input;
                scrollTo.scrollIntoView({behavior: "smooth"});
                e.preventDefault();
            }
        },

        mounted() {

            this.toggleNavbar();
        },

        created() {

            document.addEventListener('click', this.documentCloseDropdown)
        }
    });

})
