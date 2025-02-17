<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <section class="mh-quates image-bg home-2-img">
        <div class="img-color-overlay">
            <div class="container">
                <div style="padding: 50px 0;">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <div>
                            <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"> Get in touch with
                                me !</h4>
                        </div>
                        <div class="d-flex" style="align-items: center; gap: 8px;">
                            <Link href="" class="btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
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

    <div class="container">
        <div class="map-image image-bg col-sm-12">
            <div class="container mt-5">
                <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Contact Me</h3>
                </div>
                <div class="row text">
                    <div class="col-sm-12 col-md-6 contact-address">
                        <div class="col-sm-12 xs-no-padding">
                            <div class="address-item dark-bg shadow-1 media wow fadeInUp" data-wow-duration="0.8s"
                                data-wow-delay="0.2s">
                                <div class="each-icon">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <div class="each-info media-body">
                                    <h4>Address</h4>
                                    <address>
                                        5th Avenue, 34th floor, <br>
                                        New york
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 xs-no-padding">
                            <div class="address-item media dark-bg shadow-1 wow fadeInUp" data-wow-duration="0.8s"
                                data-wow-delay="0.4s">
                                <div class="each-icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="each-info media-body">
                                    <h4>Email</h4>
                                    <a href="mailto:yourmail@email.com">yourmail@email.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 xs-no-padding">
                            <div class="address-item media dark-bg shadow-1 wow fadeInUp" data-wow-duration="0.8s"
                                data-wow-delay="0.6s">
                                <div class="each-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="media-body text-center">
                                    <h4>Phone</h4>
                                    <a href="callto:(880)-8976-987">(+880)-8976-987</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <form>
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <input name="first-name" class="form-control p-3" id="first-name" type="text"
                                        placeholder="First Name" required>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <input name="last-name" class="form-control p-3" id="last-name" type="text"
                                        placeholder="Last Name">
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <input name="email" class="form-control p-3" id="email" type="email" placeholder="Email"
                                        required>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <textarea class="form-control" id="message" name="message" rows="6"
                                        placeholder="Your Message" style="resize: none;"></textarea>
                                </div>

                                <!-- Subject Button -->
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-fill btn-block">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.mid-div {
    width: 5px;
    height: 5px;
    background: #0bceaf;
    padding: 5px;
    border-radius: 50px;
}
</style>
