<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import SocialLinkComponent from '@/Components/Admin/SocialLink/SocialLinkComponent.vue';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Social Links</title>
    </Head>

    <AdminLayout>
        <SocialLinkComponent/>
    </AdminLayout>
</template>

<style scoped>

</style>
