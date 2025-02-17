<script setup>
import { Head } from '@inertiajs/vue3';
import HeroComponent from '@/Components/Front/HeroComponent.vue';
import FrontLayout from '@/Layouts/FrontLayout.vue';
</script>

<template>
    <Head>
        <title>Codearif || Home</title>
    </Head>

    <FrontLayout>
        <HeroComponent />
    </FrontLayout>

</template>
