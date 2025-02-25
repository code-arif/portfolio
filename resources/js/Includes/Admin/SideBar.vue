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
                    <h6 class="mb-0" style="color: #0bceaf;">{{ authUserProfile?.first_name ?? 'Ariful Islam' }} {{
                        authUserProfile?.last_name }}</h6>
                    <span style="color: antiquewhite;">{{ authUserProfile?.designations ?? 'Web Developer' }}</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <Link :href="route('show.admin.dashbaord')" class="nav-item nav-link"
                    :class="{ 'active': route().current('show.admin.dashbaord') }"><i
                    class="fa fa-tachometer mr-2"></i>Dashboard</Link>

                <!-- profile -->
                <Link :href="route('show.profile')" class="nav-item nav-link"
                    :class="{ 'active': route().current('show.profile') }">
                <i class="fa fa-user mr-2"></i>Profile
                </Link>

                <!-- about -->
                <Link :href="route('show.manage.about.page')" class="nav-item nav-link"
                    :class="{ 'active': route().current('show.manage.about.page') }">
                    <i class="fa fa-user-plus mr-2"></i>About
                </Link>

                <Link :href="route('show.skill.list.page')" class="nav-item nav-link" :class="{ 'active': route().current('show.skill.list.page') }"><i class="fa fa-pencil-square mr-2"></i>Skills</Link>
               
                <Link href="" class="nav-item nav-link"><i class="fa fa-graduation-cap mr-2"></i>Portfolio</Link>

                <Link href="/blog-create" class="nav-item nav-link" :class="{ 'active': $page.url === '/blog-create' }">
                <i class="fa fa-book mr-2"></i>Blog</Link>
       
                <Link href="" class="nav-item nav-link"><i class="fa fa-building mr-2"></i>Service</Link>
            </div>
        </nav>
    </div>
</template>

<style scoped></style>
