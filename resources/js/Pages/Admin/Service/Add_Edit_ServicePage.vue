<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ServiceAddEditComponent from '@/Components/Admin/Service/ServiceAddEditComponent.vue';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Service Save</title>
    </Head>

    <AdminLayout>
        <ServiceAddEditComponent/>
    </AdminLayout>
</template>

<style scoped>

</style>
