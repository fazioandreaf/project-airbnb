<template>
    <div class="wrapper-apartment">
        <div class="apartment-main-infos">
            <h1>
                {{ apartment.title }}
            </h1>
            <span class="apartment-details" @click="showDetails">
                Visualizza dettagli
                <i class="fas fa-chevron-down"></i>
            </span>
        </div>
        <transition name="slide-down">
            <div class="details" v-if="apartmentDetails">
                <ul>
                    <li>
                        <strong>Indirizzo: </strong>
                        {{ apartment.address }}
                    </li>
                    <li>
                        <strong>Numero di stanze: </strong>
                        {{ apartment.number_rooms }}
                    </li>
                    <li>
                        <strong>Bagni: </strong>
                        {{ apartment.number_toiletes }}
                    </li>
                    <li>
                        <strong>Posti letto: </strong>
                        {{ apartment.number_beds }}
                    </li>
                    <li>
                        <strong>M<sup>2</sup>: </strong>
                        {{ apartment.area }}
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        data: function() {

            return {
                test: "hello",
                apartmentDetails: false
            }
        },

        props: {

            apartment: Object
        },

        methods: {

            showDetails: function() {
                
                this.apartmentDetails = !this.apartmentDetails;
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
