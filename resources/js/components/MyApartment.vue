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
                        {{ apartment.address }}
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
