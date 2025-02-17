<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar">
            <a href="" class="navbar-brand mx-4 mb-3">
                <h3 style="color: #0bceaf;"><i class="fa fa-user-edit me-2"></i>CodeArif</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_640.png" alt="" style="width: 40px; height: 40px; border: 2px solid #0bceaf;">
                </div>
                <div class="ms-3 ml-2">
                    <h6 class="mb-0" style="color: #0bceaf;">Ariful Islam</h6>
                    <span style="color: antiquewhite;">Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <Link href="/dashboard" class="nav-item nav-link" :class="{'active' : $page.url === '/dashboard'}"><i
                        class="fa fa-tachometer mr-2"></i>Dashboard</Link>
                <Link href="/profile" class="nav-item nav-link"><i class="fa fa-user mr-2"></i>Profile</Link>
                <Link href="/blog-create" class="nav-item nav-link" :class="{'active' : $page.url === '/blog-create'}"><i class="fa fa-book mr-2"></i>Blog</Link>
                <Link href="" class="nav-item nav-link"><i class="fa fa-graduation-cap mr-2"></i>Portfolio</Link>
                <Link href="" class="nav-item nav-link"><i class="fa fa-user-plus mr-2"></i>About</Link>
                <Link href="" class="nav-item nav-link"><i class="fa fa-building mr-2"></i>Service</Link>
            </div>
        </nav>
    </div>
</template>

<style scoped></style>
