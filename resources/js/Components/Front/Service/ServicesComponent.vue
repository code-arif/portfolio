<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const services = page.props.services || [];
</script>

<template>
    <!-- bradcraumb area start -->
    <section class="mh-quates image-bg home-2-img">
        <div class="img-color-overlay">
            <div class="container">
                <div style="padding: 50px 0;">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <div>
                            <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"> How types of works
                                we do ?
                            </h4>
                        </div>
                        <div class="d-flex" style="align-items: center; gap: 8px;">
                            <Link href="/" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            Home</Link>
                            <div class="wow fadeInUp mid-div" data-wow-duration="0.8s" data-wow-delay="0.4s"> </div>
                            <Link href="" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            Serives </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- main content area start -->
    <section class="codearif-service">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 text-center section-title wow fadeInUp" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">
                    <h2>What I do ??</h2>
                </div>
                
                <div class="col-sm-4" v-for="service in services" :key="service.id">
                    <div class="codearif-service-item shadow-1 wow fadeInUp" data-wow-duration="0.8s"
                        data-wow-delay="0.3s">
                        <!-- Dynamic color binding using :style -->
                        <i :class="service.icon" :style="{color: service.icon_color_code}"></i>
                        <h3>{{ service?.name }}</h3>
                        <p>
                            {{ service?.description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.mid-div {
    width: 5px;
    height: 5px;
    background: #0bceaf;
    padding: 5px;
    border-radius: 50px;
}

.codearif-service-item {
    transition: background-color 0.3s ease, color 0.3s ease;
    padding: 20px;
    border-radius: 5px;
    cursor: pointer;
}

.codearif-service-item:hover,
.codearif-service-item:active {
    background-color: #0bceaf;
    color: white;
}

.codearif-service-item:hover i,
.codearif-service-item:active i {
    color: white;
}

.codearif-service-item:hover h3,
.codearif-service-item:active h3,
.codearif-service-item:hover p,
.codearif-service-item:active p {
    color: white;
}
</style>
