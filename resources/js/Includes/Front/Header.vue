<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const isMobileNavActive = ref(false);

const toggleMobileNav = () => {
    isMobileNavActive.value = !isMobileNavActive.value;
};

const closeMobileNavOnLinkClick = () => {
    if (isMobileNavActive.value) {
        isMobileNavActive.value = false;
    }
};

onMounted(() => {
    const navLinks = document.querySelectorAll('#navmenu a');
    navLinks.forEach(link => {
        link.addEventListener('click', closeMobileNavOnLinkClick);
    });
});
</script>

<template>
    <header id="header" :class="{ 'mobile-nav-active': isMobileNavActive }" class="header sticky-top">
        <!-- Topbar Section -->
        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="fa fa-envelope d-flex align-items-center">
                        <a class="contact-line" href="mailto:contact@example.com">contact@example.com</a>
                    </i>
                    <i class="fa fa-whatsapp d-flex align-items-center ml-4">
                        <span class="contact-line">+1 5589 55488 55 (Whatsapp)</span>
                    </i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="github"><i class="fa fa-github"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>

        <!-- Branding Section -->
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <Link href="/" class="logo d-flex align-items-center">
                <h1 class="sitename">CodeArif</h1>
                </Link>

                <!-- Navigation Menu -->
                <nav id="navmenu" class="navmenu">
                    <ul :class="{ 'd-block': isMobileNavActive, 'd-none': !isMobileNavActive }">
                        <li>
                            <Link href="/" :class="{ 'active': $page.url === '/' }">Home</Link>
                        </li>
                        <li>
                            <Link :href="route('show.about')" :class="{ 'active': route().current('show.about') }">About</Link>
                        </li>
                        <li>
                            <Link href="/portfolio" :class="{ 'active': $page.url === '/portfolio' }">Portfolio</Link>
                        </li>
                        <li>
                            <Link href="/services" :class="{ 'active': $page.url === '/services' }">Services</Link>
                        </li>
                        <li>
                            <Link href="/blog" :class="{ 'active': $page.url === '/blog' }">Blog</Link>
                        </li>
                        <li>
                            <Link href="/contact" :class="{ 'active': $page.url === '/contact' }">Contact</Link>
                        </li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none fa" :class="isMobileNavActive ? 'fa-times' : 'fa-bars'"
                        @click="toggleMobileNav"></i>
                </nav>
            </div>
        </div>
    </header>
</template>

<style scoped>

</style>
