<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ServicesListComponent from '@/Components/Admin/Service/ServicesListComponent.vue';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Services List</title>
    </Head>

    <AdminLayout>
        <ServicesListComponent/>
    </AdminLayout>
</template>

<style scoped>

</style>
