<script setup>
import AboutComponent from '@/Components/Front/About/AboutComponent.vue';
import { Head } from '@inertiajs/vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';
</script>

<template>

    <Head>
        <title>Codearif || About</title>
    </Head>

    <FrontLayout>
        <AboutComponent />
    </FrontLayout>
</template>

<style scoped></style>
