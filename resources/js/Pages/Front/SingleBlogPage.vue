<script setup>
import { Head } from '@inertiajs/vue3';
import SingleBlogComponent from '@/Components/Front/Blog/SingleBlogComponent.vue';
import FrontLayout from '@/Layouts/FrontLayout.vue';
</script>

<template>

    <Head>
        <title>Codearif || Single Blog</title>
    </Head>

    <FrontLayout>
        <SingleBlogComponent />
    </FrontLayout>
</template>
