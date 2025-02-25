<script setup>
import AboutComponent from '@/Components/Admin/About/AboutComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeAirf || About Admin </title>
    </Head>

    <AdminLayout>
        <AboutComponent/>
    </AdminLayout>
</template>

<style scoped></style>
