<script setup>
import { ref, onMounted } from 'vue';
import HireMeComponent from './HireMeComponent.vue';

const counters = ref([
    { label: 'Happy Clients', value: 0, target: 120 },
    { label: 'Completed Projects', value: 0, target: 75 },
    { label: 'Working Experience', value: 0, target: 5 },
]);

const animateCounters = () => {
    counters.value.forEach((counter) => {
        let current = 0;
        const step = Math.ceil(counter.target / 100);
        const interval = setInterval(() => {
            current += step;
            if (current >= counter.target) {
                current = counter.target;
                clearInterval(interval);
            }
            counter.value = current;
        }, 50);
    });
};

onMounted(() => {
    animateCounters();
});
</script>

<template>
    <section class="codearif-home image-bg home-2-img" id="codearif-home">
        <div class="img-color-overlay">
            <div class="container">
                <div class="row section-separator">

                    <!-- left content -->
                    <div class="col-lg-6 col-md-12 text-md-start p-3">
                        <div class="codearif-header-info">
                            <div class="codearif-promo wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                                <span>Hello There I'm</span>
                            </div>

                            <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Md. Ariful Islam
                            </h2>
                            <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">Web Developer
                            </h4>
                            <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Aliquam quos saepe molestiae
                                doloribus minus voluptatum. Eius eum doloremque, veritatis perspiciatis suscipit dolores
                                magni repudiandae numquam a ab. Aliquam tempora excepturi nostrum minus laudantium rem
                                dolor repudiandae quas, quibusdam cum asperiores, officiis est voluptate! Quae quas
                                autem ut expedita voluptatum qui!</p>
                        </div>

                        <!-- Counters -->
                        <div class="d-flex flex-wrap justify-content-md-between mt-4 wow fadeInUp"
                            data-wow-duration="0.8s" data-wow-delay="0.5s">
                            <div v-for="(counter, index) in counters" :key="index" class="p-2">
                                <h2>{{ counter.value }} +</h2>
                                <p>{{ counter.label }}</p>
                            </div>
                        </div>

                        <!-- Hire Me Button -->
                        <div class="mt-4">
                            <a href="#" class="btn btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"
                                data-toggle="modal" data-target="#exampleModal"> Hire Me </a>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="col-lg-6 col-md-12 text-center p-3">
                        <div class="hero-img wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                            <div class="img-border">
                                <img src="assets/images/hero.png" alt="Hero Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- hire me modal management -->
    <HireMeComponent />
</template>

<style scoped></style>
