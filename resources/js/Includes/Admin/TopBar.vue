<script setup>
import { router } from '@inertiajs/vue3';

const logout = () => {
    router.post(route('admin.logout'));
}
</script>

<template>
    <nav class="navbar sticky-top px-4 py-0" style="background: #191C24">
        <div class="d-flex justify-content-end align-items-center w-100">
            <div class="nav-item p-2">
                <button class="btn btn-sm logout-btn" @click="logout"> Logout <i class="fa fa-sign-out" aria-hidden="true"></i></button>
            </div>
        </div>
    </nav>
</template>

<style scoped></style>
