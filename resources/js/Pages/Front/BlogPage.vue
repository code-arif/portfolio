<script setup>
import BlogComponent from '@/Components/BlogComponent.vue';
import { Head } from '@inertiajs/vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';
</script>

<template>

    <Head>
        <title>Codearif || Blog</title>
    </Head>

    <FrontLayout>
        <BlogComponent />
    </FrontLayout>
</template>

<style scoped></style>
