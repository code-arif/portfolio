<script setup>
import { Link } from '@inertiajs/vue3';
import SingleProjectSlideComponent from './SingleProjectSlideComponent.vue';
</script>

<template>
    <!-- bradcraumb -->
    <section class="mh-quates image-bg home-2-img">
        <div class="img-color-overlay">
            <div class="container">
                <div style="padding: 50px 0;">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <div>
                            <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"> Explore my
                                portfolio
                            </h4>
                        </div>
                        <div class="d-flex" style="align-items: center; gap: 8px;">
                            <Link href="" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            Home</Link>
                            <div class="wow fadeInUp mid-div" data-wow-duration="0.8s" data-wow-delay="0.4s"> </div>
                            <Link href="" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            Portfolio </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- portfolio section -->
    <section class="codearif-portfolio" id="codearif-portfolio">
        <div class="container">
            <div class="row section-separator">
                <div class="section-title col-sm-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                    <h3 class="text-center">My All Project Is Here</h3>
                </div>
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="https://img.freepik.com/free-vector/handling-order-processing-illustration_335657-517.jpg?t=st=1737738386~exp=1737741986~hmac=a4d404ad58726078f48142104d8164cfff1a87c22d83eae678ee8b5af7113858&w=740" class="img-fluid img-cover" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-fill">Live Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/images/b-1.jpg" class="img-fluid img-cover" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-fill">Live Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/images/b-1.jpg" class="img-fluid img-cover" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-fill">Live Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/images/b-1.jpg" class="img-fluid img-cover" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-fill">Live Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/images/b-1.jpg" class="img-fluid img-cover" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-fill">Live Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/images/b-1.jpg" class="img-fluid img-cover" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-fill">Live Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- recently finished projects -->
    <!-- <SingleProjectSlideComponent /> -->

</template>

<style scoped>
.mid-div {
    width: 5px;
    height: 5px;
    background: #0bceaf;
    padding: 5px;
    border-radius: 50px;
}

.img-cover {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.row {
    margin: 0;
}
</style>
