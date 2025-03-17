<script setup>
import PortfolioAddEditComponent from '@/Components/Admin/Portfolio/PortfolioAddEditComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Portfolio Add/Edit</title>
    </Head>

    <AdminLayout>
        <PortfolioAddEditComponent/>
    </AdminLayout>
</template>

<style scoped></style>
