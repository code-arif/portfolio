<script setup>
import PortfolioListComponent from '@/Components/Admin/Portfolio/PortfolioListComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Portfolio</title>
    </Head>

    <AdminLayout>
        <PortfolioListComponent/>
    </AdminLayout>
</template>

<style scoped></style>
