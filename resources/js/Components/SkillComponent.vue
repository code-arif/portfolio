<script setup>
import DesignCertificateComponent from './Certificate/DesignCertificateComponent.vue';
import DevelopmentCertificateComponent from './Certificate/DevelopmentCertificateComponent.vue';
</script>
<template>
    <div class="codearif-about-inner">
        <h4 class="mt-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">My <span
                style="color:#0bceaf">Skills</span></h4>
        <div class="row mt-4">
            <div class="col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                <div class="card text-white">
                    <div class="card-body">
                        <h5>Responsive <span style="color:#0bceaf">Web Design</span>
                        </h5>
                        <p><small class="text-muted">2005-2008</small></p>
                        <p>Hello,
                            I’m a Patrick, <a style="color: #0bceaf;" href="">CodersTrust</a>
                            web-developer based on Paris.
                        </p>

                        <div class="codearif-about-tag">
                            <ul>
                                <li><span>Wordpress Customization</span></li>
                                <li><span>HTML</span></li>
                                <li><span>CSS</span></li>
                                <li><span>JS</span></li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-fill" data-fancybox data-src="#web-design-cerificate-modal"> View Certificate </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                <div class="card text-white">
                    <div class="card-body">
                        <h5 class="card-title">Advance <span style="color:#0bceaf">Web
                                Development</span>
                        </h5>
                        <p><small class="text-muted">2005-2008</small></p>
                        <p>Hello,
                            I’m a Patrick, <a style="color: #0bceaf;" href="">OSTAD</a>
                            web-developer based on Paris.
                        </p>

                        <div class="codearif-about-tag">
                            <ul>
                                <li><span>PHP</span></li>
                                <li><span>PHP OOP</span></li>
                                <li><span>Laravel</span></li>
                                <li><span>HTML</span></li>
                                <li><span>CSS</span></li>
                                <li><span>JS</span></li>
                                <li><span>Vue.js</span></li>
                                <li><span>MySQL</span></li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-fill" data-fancybox data-src="#web-dev-cerificate-modal"> View Certificate </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <DesignCertificateComponent />
    <DevelopmentCertificateComponent />
</template>

<style scoped>
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
</style>
