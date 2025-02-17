<script setup>
import FrontLayout from '@/Layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
import ServicesComponent from '@/Components/Front/Service/ServicesComponent.vue';
import HappyClientComponent from '@/Components/Front/Service/AchivementComponent.vue';
</script>

<template>

    <Head>
        <title>CodeArif || Services</title>
    </Head>

    <FrontLayout>
        <ServicesComponent />
        <HappyClientComponent />
    </FrontLayout>
</template>
