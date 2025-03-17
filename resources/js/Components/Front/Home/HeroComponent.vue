<script setup>
import { ref, onMounted } from 'vue';
import HireMeComponent from './HireMeComponent.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

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

//load user profile
const profile = page.props?.profile || {};
const about = page.props?.about || {};
const image = page.props?.image || {};

const hero_image_preview = ref(image.hero_image ? `/storage/${image.hero_image}` : '/assets/images/hero.png');
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
                                <span>Hello, I'm</span>
                            </div>

                            <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ profile?.first_name }} {{ profile?.last_name }}</h2>
                            <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">{{ profile?.designations }}
                            </h4>
                            <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"> {{ about?.short_description }} </p>
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
                    <div class="col-lg-6 col-md-12 text-center p-3 mt-5">
                        <div class="hero-img wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                            <div class="img-border">
                                <img :src="hero_image_preview" alt="Hero Image" class="img-fluid">
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

<style scoped>
/* .hero_image{
    height: 50%;
    width: 50%;
} */
</style>
