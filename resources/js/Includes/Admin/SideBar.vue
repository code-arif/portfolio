<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const authUser = page.props?.authUser?.authenticatedUser;
const authUserProfile = page.props?.authUser?.userProfile;
</script>

<template>
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar">
            <a href="" class="navbar-brand mx-4 mb-3">
                <h3 style="color: #0bceaf;"><i class="fa fa-user-edit me-2"></i>CodeArif</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle"
                        src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_640.png" alt=""
                        style="width: 40px; height: 40px; border: 2px solid #0bceaf;">
                </div>
                <div class="ms-3 ml-2">
                    <h6 class="mb-0" style="color: #0bceaf;">{{ authUserProfile?.first_name ?? 'Ariful Islam' }}</h6>
                    <span style="color: antiquewhite;">{{ authUserProfile?.designations ?? 'Web Developer' }}</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <Link :href="route('show.admin.dashbaord')" class="nav-item nav-link"
                    :class="{ 'active': route().current('show.admin.dashbaord') }">
                    <i class="fa fa-desktop mr-2" aria-hidden="true"></i> Dashboard</Link>

                <!-- profile -->
                <Link :href="route('show.add.edit.profile')" class="nav-item nav-link"
                    :class="{ 'active': route().current('show.add.edit.profile') }">
                <i class="fa fa-user mr-2"></i>Profile
                </Link>

                <!-- about -->
                <Link :href="route(['show.add.edit.about'])" class="nav-item nav-link"
                    :class="{ 'active': route().current('show.add.edit.about') }">
                    <i class="fa fa-book mr-2" aria-hidden="true"></i>About
                </Link>

                <!-- skills -->
                <Link :href="route('show.skill.list')" class="nav-item nav-link" :class="{ 'active': route().current('show.skill.list') }"><i class="fa fa-pencil-square mr-2"></i>Skills</Link>
               
                <!-- education -->
                <Link :href="route('show.degree.list')" class="nav-item nav-link" :class="{ 'active': route().current('show.degree.list') }"><i class="fa fa-graduation-cap mr-2"></i>Education</Link>
               
                <!-- portfolio -->
                <Link :href="route('show.portfolio.list')" class="nav-item nav-link" :class="{'active': route().current('show.portfolio.list')}"><i class="fa fa-building-o mr-2" aria-hidden="true"></i>Portfolio</Link>

                <!-- social link -->
                <Link :href="route('show.social.links')" class="nav-item nav-link"
                    :class="{ 'active': route().current('show.social.links') }">
                    <i class="fa fa-share-square mr-2" aria-hidden="true"></i>Social Link
                </Link>

                <!-- services -->
                <Link :href="route('show.service.list')" class="nav-item nav-link" :class="{'active' : route().current('show.service.list')}"><i class="fa fa-globe mr-2" aria-hidden="true"></i>Service</Link>

                <Link href="/blog-create" class="nav-item nav-link" :class="{ 'active': $page.url === '/blog-create' }">
                <i class="fa fa-book mr-2"></i>Blog</Link>
            </div>
        </nav>
    </div>
</template>

<style scoped></style>
