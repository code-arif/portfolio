<script setup>
import ProfileUpdateComponent from '@/Components/Admin/Profile/ProfileUpdateComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Profile</title>
    </Head>

    <AdminLayout>
        <ProfileUpdateComponent/>
    </AdminLayout>
</template>

<style scoped></style>
