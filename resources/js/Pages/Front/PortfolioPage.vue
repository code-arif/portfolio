<script setup>
import { Head } from '@inertiajs/vue3';
import PortfolioComponent from '@/Components/PortfolioComponent.vue';
import TestComponent from '@/Components/TestComponent.vue';
import FrontLayout from '@/Layouts/FrontLayout.vue';
</script>

<template>

    <Head>
        <title>Codearif || Portfolio</title>
    </Head>

    <Header />
    <FrontLayout>
        <PortfolioComponent />
    </FrontLayout>

    <!-- <TestComponent /> -->

    <Footer />
</template>

