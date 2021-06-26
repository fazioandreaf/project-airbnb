<template>
    <div class="wrapper-apartment">
        <div class="apartment-main-infos">
            <ul class="infos">
                <li class="apartment-title">
                    <h1 @click="showDetails">
                        {{ apartment.title }}
                        <transition name="rotate">
                            <i class="fas fa-chevron-down arrow" :class="(showApartmentDetails) ? 'rotate' : ''"></i>
                        </transition>
                    </h1>
                </li>
                <li>
                    <slot name="view"></slot>
                </li>
                <li>
                    <slot name="delete"></slot>
                </li>
            </ul>
        </div>
        <transition name="slide-down">
            <div class="details" ref="details" v-if="showApartmentDetails">
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
                    <li>
                        <slot name="edit"></slot>
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
                showApartmentDetails: false,
            }
        },

        props: {

            apartment: Object
        },

        methods: {

            showDetails: function() {
                
                this.showApartmentDetails = !this.showApartmentDetails;
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
