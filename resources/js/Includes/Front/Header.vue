<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

const isMobileNavActive = ref(false);
const profileData = ref(null);
const socialLinks = ref(null);

const toggleMobileNav = () => {
    isMobileNavActive.value = !isMobileNavActive.value;
};

const closeMobileNavOnLinkClick = () => {
    if (isMobileNavActive.value) {
        isMobileNavActive.value = false;
    }
};

onMounted(async () => {
    try {
        const response = await axios.get('/get-profile');
        if (response.data.length > 0) {
            profileData.value = response.data[0]; 
        }
        if (response.data.length > 1) {
            socialLinks.value = response.data[1];
        }
    } catch (error) {
        console.error('Error fetching profile data:', error);
    }

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
                        <a class="contact-line" v-if="profileData" :href="'mailto:' + profileData.additional_email">
                            {{ profileData.additional_email }}
                        </a>
                    </i>
                    <i class="fa fa-whatsapp d-flex align-items-center ml-4">
                        <span class="contact-line" v-if="profileData">
                            +880 {{ profileData.phone }}
                        </span>
                    </i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a v-if="socialLinks?.facebook" :href="socialLinks.facebook" target="_blank" class="facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a v-if="socialLinks?.github" :href="socialLinks.github" target="_blank" class="github">
                        <i class="fa fa-github"></i>
                    </a>
                    <a v-if="socialLinks?.linkedin" :href="socialLinks.linkedin" target="_blank" class="linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>
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
                            <Link :href="route('show.about')" :class="{ 'active': route().current('show.about') }">About
                            </Link>
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
