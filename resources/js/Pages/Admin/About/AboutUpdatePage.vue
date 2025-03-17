<script setup>
import AboutUpdateComponent from '@/Components/Admin/About/AboutUpdateComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeAirf || About Admin </title>
    </Head>

    <AdminLayout>
        <AboutUpdateComponent/>
    </AdminLayout>
</template>

<style scoped></style>
