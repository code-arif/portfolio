<script setup>
import { ref } from 'vue';
// import OwlCarousel from 'vue-owl-carousel';

const options = ref({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    smartSpeed: 450,
    responsive: {
        0: { items: 1 },
        768: { items: 2 },
        1170: { items: 3 }
    }
});
</script>

<template>
    <section class="mh-testimonial" id="mh-testimonial">
        <div class="home-v-img">
            <div class="container">
                <div class="row">
                    <h4>Client Review</h4>
                    <div class="col-sm-12">
                        <OwlCarousel :options="options">
                            <div class="each-client-item" v-for="index in 4" :key="index">
                                <div class="mh-client-item dark-bg black-shadow-1">
                                    <img src="assets/assets/images/c-1.png" alt="" class="img-fluid" />
                                    <p>
                                        Absolute wonderful! I am completely blown away. The very best. I was amazed
                                        at the quality
                                    </p>
                                    <h4>John Mike</h4>
                                    <span>CEO, Author.Inc</span>
                                </div>
                            </div>
                        </OwlCarousel>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.mh-client-item {
    padding: 20px;
    text-align: center;
    border-radius: 10px;
}
</style>
