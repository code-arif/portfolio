<script setup>
import ProfileUpdateComponent from '@/Components/Admin/ProfileUpdateComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeAirf || Update Profile</title>
    </Head>

    <AdminLayout>
        <ProfileUpdateComponent/>
    </AdminLayout>
</template>

<style scoped></style>
