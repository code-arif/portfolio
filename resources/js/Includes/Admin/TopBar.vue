<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <nav class="navbar sticky-top px-4 py-0" style="background: #191C24">
        <div class="d-flex justify-content-end align-items-center w-100">
            <div class="nav-item p-2">
                <Link class="btn logout-btn" href="/login"> Logout <i class="fa fa-sign-out" aria-hidden="true"></i></Link>
            </div>
        </div>
    </nav>
</template>

<style scoped></style>
