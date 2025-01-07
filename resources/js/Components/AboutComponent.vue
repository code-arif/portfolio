<script setup>
import { Link } from '@inertiajs/vue3';
import TestimonialComponent from './TestimonialComponent.vue';
</script>

<template>
    <!-- bradcraumb area start -->
    <section class="mh-quates image-bg home-2-img">
        <div class="img-color-overlay">
            <div class="container">
                <div class="section-separator">
                    <div class="col-sm-12 d-flex justify-content-between mt-5">
                        <div>
                            <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"> Know About Me
                            </h4>
                        </div>
                        <div class="d-flex" style="align-items: center; gap: 8px;">
                            <Link href="" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            Home</Link>
                            <div class="wow fadeInUp mid-div" data-wow-duration="0.8s" data-wow-delay="0.4s"> </div>
                            <Link href="" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            About </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about me section start -->
    <section class="mh-about" id="mh-about">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 col-md-4">
                    <div class="mh-service-item shadow-1 dark-bg wow fadeInUp p-4" data-wow-duration="0.8s"
                        data-wow-delay="0.3s">
                        <h4 class="text-center"> Hello , I'm <span style="color:#0bceaf">Ariful Islam</span></h4>
                        <h5 class="text-center pb-4">Web developer</h5>
                        <div class="mh-about-img shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            <img src="https://img.freepik.com/free-vector/young-prince-royal-attire_1308-173447.jpg?t=st=1735968421~exp=1735972021~hmac=1f76bc57091196eb3636a706afba0e7e09c7f9cca90bd684e338a3704b85d4aa&w=740"
                                alt="" class="img-fluid">
                        </div>
                        <div class="mh-home">
                            <div class="mh-header-info text-center">
                                <ul class="">
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><i
                                            class="fa fa-envelope"></i><a href="mailto:">getemail@email.com</a></li>
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><i
                                            class="fa fa-phone"></i><a href="callto:">+12 986 987 7867</a></li>
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s"><i
                                            class="fa fa-map-marker"></i>
                                        <address>37, Pollsatnd, New York, United State</address>
                                    </li>
                                </ul>

                                <ul class="social-icon wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>

                                <a href="#" class="btn btn-fill wow fadeInUp w-100" data-wow-duration="0.8s"
                                    data-wow-delay="0.4s">Downlaod CV <i class="fa fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-8">
                    <div class="mh-about-inner">
                        <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">Lorem ipsum dolor sit
                            amet consectetur adipisicing elit.</h2>
                        <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Hello, I’m a Patrick,
                            web-developer based on Paris.
                            I have rich experience in web site design & building
                            and customization. Also I am good at Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Numquam voluptate voluptas fugiat tempore repellat veritatis, eius est officiis
                            dolorem beatae repellendus eligendi laborum nesciunt inventore?</p>

                        <h2>Working <span style="color:#0bceaf">Experience</span></h2>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mh-about-box wow fadeInUp" data-wow-duration="0.8s "
                                        data-wow-delay="0.3s">
                                        <h4>Web Developer</h4>
                                        <p>2018 - 2020</p>
                                        <p>At <a href="#" style="color: #0bceaf;">Tech Company</a> I was responsible for
                                            developing web. Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            Reiciendis ex aperiam officiis corrupti debitis, id, velit dolorem ducimus
                                            aliquid sed obcaecati quam delectus, ad a! Aliquid, voluptates.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mh-about-tag wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <ul>
                                <li><span>php</span></li>
                                <li><span>html</span></li>
                                <li><span>css</span></li>
                                <li><span>php</span></li>
                                <li><span>wordpress</span></li>
                                <li><span>React</span></li>
                                <li><span>Javascript</span></li>
                            </ul>
                        </div>

                        <TestimonialComponent />
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

.about-bg {
    background: #d1d1d1;
    padding: 30px, 10px, 20px, 10px;
}
</style>
