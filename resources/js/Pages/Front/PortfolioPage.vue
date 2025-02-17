<script setup>
import { Head } from '@inertiajs/vue3';
import PortfolioComponent from '@/Components/Front/Portfolio/PortfolioComponent.vue';
import FrontLayout from '@/Layouts/FrontLayout.vue';
</script>

<template>

    <Head>
        <title>Codearif || Portfolio</title>
    </Head>

    <FrontLayout>
        <PortfolioComponent />
    </FrontLayout>
</template>

