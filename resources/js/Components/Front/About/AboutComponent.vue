<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const profile = page.props?.profile || {};
const image = page.props?.image || {};
const about = page.props?.about || {};
const social_link = page.props?.social_link || {};
const skills = page.props?.skills || [];

// Corrected computed property
const language_or_keys = computed(() => {
    return skills.flatMap(skill => skill.language_or_key ? skill.language_or_key.split(', ') : []);
});


const about_image_preview = ref(image.about_image ? `/storage/${image.about_image}` : '/assets/images/hero.png');
</script>

<template>
    <!-- bradcraumb area start -->
    <section class="mh-quates image-bg home-2-img">
        <div class="img-color-overlay">
            <div class="container">
                <div style="padding: 50px 0;">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <div>
                            <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">  Know About Me
                            </h4>
                        </div>
                        <div class="d-flex" style="align-items: center; gap: 8px;">
                            <Link href="/" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
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
    <section class="codearif-about" id="codearif-about">
        <div class="container">
            <div class="row section-separator">
                <!-- about card -->
                <div class="col-sm-12 col-md-4">
                    <div class="codearif-service-item shadow-1 wow fadeInUp p-4" data-wow-duration="0.8s"
                        data-wow-delay="0.3s">
                        <h4 class="text-center"> Hello , I'm <span style="color:#0bceaf">{{ profile.first_name }} {{
                            profile.last_name }}</span></h4>
                        <h5 class="text-center">{{ profile.designations }}</h5>
                        <div class="shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            <img :src="about_image_preview" alt="" class="img-fluid">
                        </div>
                        <div class="codearif-home">
                            <div class="codearif-header-info text-center">
                                <ul class="">
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><i
                                            class="fa fa-envelope"></i><a href="mailto:">{{ profile.additional_email
                                            }}</a></li>
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><i
                                            class="fa fa-phone"></i><a href="callto:">+880 {{ profile.phone }}</a></li>
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s"><i
                                            class="fa fa-map-marker"></i>
                                        <address>{{ profile.address }}</address>
                                    </li>
                                </ul>

                                <ul class="social-icon wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">
                                    <li><a v-if="social_link?.facebook" :href="social_link?.facebook" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a v-if="social_link?.github" :href="social_link?.github" target="_blank"><i
                                                class="fa fa-github"></i></a></li>
                                    <li><a v-if="social_link?.linkedin" :href="social_link?.linkedin" target="_blank"><i
                                                class="fa fa-linkedin"></i></a></li>
                                </ul>

                                <a href="#" class="btn btn-fill wow fadeInUp w-100" data-wow-duration="0.8s"
                                    data-wow-delay="0.4s">Downlaod CV <i class="fa fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- long description and bio -->
                <div class="col-sm-12 col-md-8">
                    <div class="codearif-about-inner">
                        <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{
                            about?.long_description }}</p>
                        <!-- bio -->
                        <div>
                            <blockquote class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{
                                profile?.bio }}</blockquote>
                        </div>
                    </div>

                    <!-- working skills start -->
                    <div class="codearif-about-inner">
                        <h4 class="mt-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">My <span
                                style="color:#0bceaf">Skills</span></h4>

                        <div class="row mt-4">
                            <div class="col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-duration="0.8s"
                                data-wow-delay="0.3s" v-for="(skill, index) in skills" :key="index">
                                <div class="card text-white">
                                    <div class="card-body">
                                        <h5>{{ skill?.prefix }} <span style="color:#0bceaf">{{ skill?.title }}</span>
                                        </h5>
                                        <p><small class="text-muted"> {{ skill?.start_date }} - {{ skill?.end_date
                                        }}</small></p>
                                        <p><a style="color: #0bceaf;" :href="skill?.institute_website"
                                                target="_blank">{{ skill?.institute_name }}</a>
                                            {{ skill?.short_description }}
                                        </p>

                                        <div class="codearif-about-tag">
                                            <ul>
                                                <!-- Loop through language_or_keys for each skill -->
                                                <li v-for="(lang, langIndex) in skill.language_or_key.split(', ')"
                                                    :key="langIndex">
                                                    <span>{{ lang }}</span>
                                                </li>
                                            </ul>
                                        </div>

                                        <a href="#" class="btn btn-fill" data-fancybox
                                            data-src="#web-design-cerificate-modal"> View
                                            Certificate </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- web design certificate modal -->
                    <div class="codearif-portfolio-modal" id="web-design-cerificate-modal">
                        <div class="container">
                            <div class="row codearif-portfolio-modal-inner">
                                <div class="col-sm-4">
                                    <h2>Wrap - A campanion plugin</h2>
                                    <p>Wrap is a clean and elegant Multipurpose Landing Page Template.
                                        It will fit perfectly for Startup, Web App or any type of Web Services.
                                        It has 4 background styles with 6 homepage styles. 6 pre-defined color scheme.
                                        All variations are organized separately so you can use / customize the template
                                        very easily.
                                    </p>

                                    <p>It is a clean and elegant Multipurpose Landing Page Template.
                                        It will fit perfectly for Startup, Web App or any type of Web Services.
                                        It has 4 background styles with 6 homepage styles. 6 pre-defined color scheme.
                                        All variations are organized separately so you can use / customize the template
                                        very easily.
                                    </p>
                                    <div class="codearif-about-tag">
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
                                    <a href="#" class="btn btn-fill">Live Demo</a>
                                </div>
                                <div class="col-sm-8">
                                    <div class="codearif-portfolio-modal-img">
                                        <img src="https://img.freepik.com/free-vector/gradient-elegant-certificate-template_23-2148973721.jpg?t=st=1736939277~exp=1736942877~hmac=bea221168ec27b88b502dd10b2500bc0ecc652db1fd3cd2eeb15a41f57b9d443&w=1380"
                                            alt="Certificate" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education skills start -->
                    <div class="codearif-about-inner">
                        <h4 class="mt-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">Educational<span
                                style="color:#0bceaf"> Experience</span></h4>
                        <div class="row mt-4">
                            <div class="col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-duration="0.8s"
                                data-wow-delay="0.3s">
                                <div class="card text-white">
                                    <div class="card-body">
                                        <h5>Responsive <span style="color:#0bceaf">Web Design</span>
                                        </h5>
                                        <p><small class="text-muted">2005-2008</small></p>
                                        <p>Hello,
                                            I’m a Patrick, <a style="color: #0bceaf;" href="">CodersTrust</a>
                                            web-developer based on Paris.
                                            I have rich experience in web site design & building
                                            and customization. Also I am good at Lorem ipsum dolor sit amet consectetur
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-duration="0.8s"
                                data-wow-delay="0.3s">
                                <div class="card text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Advance <span style="color:#0bceaf">Web
                                                Development</span>
                                        </h5>
                                        <p><small class="text-muted">2005-2008</small></p>
                                        <p>Hello,
                                            I’m a Patrick, <a style="color: #0bceaf;" href="">OSTAD</a>
                                            web-developer based on Paris.
                                            I have rich experience in web site design & building
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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

.card-body h5 {
    margin-bottom: 8px;
}

.card-body p {
    margin-bottom: 6px;
}

.codearif-about-tag ul {
    padding-left: 0;
    margin-bottom: 8px;
    list-style-type: none;
}

.codearif-about-tag ul li {
    display: inline-block;
    margin-right: 8px;
}

.btn-fill {
    margin-top: 10px;
}

blockquote {
    position: relative;
    padding: 15px;
    font-size: 18px;
    color: #333;
    display: inline-block;
    font-weight: bold;
}

blockquote::before,
blockquote::after {
    content: "";
    position: absolute;
    width: 20px;
    height: 20px;
    border-width: 4px;
    border-style: solid;
    border-radius: 5px;
}

blockquote::before {
    top: 0;
    left: 0;
    border-color: #6effc9 transparent transparent #6effc9;
}

blockquote::after {
    bottom: 0;
    right: 0;
    border-color: transparent #6effc9 #6effc9 transparent;
}
</style>
