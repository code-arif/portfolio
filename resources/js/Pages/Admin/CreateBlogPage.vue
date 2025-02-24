<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import CreateBlogComponent from '@/Components/Admin/CreateBlogComponent.vue';
</script>

<template>
    <Head>
        <title> CodeAirf || Create Blog</title>
    </Head>

    <AdminLayout>
        <CreateBlogComponent/>
    </AdminLayout>
</template>

<style scoped>

</style>
