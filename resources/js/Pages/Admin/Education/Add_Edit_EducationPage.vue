<script setup>
import EducationAddEditComponent from '@/Components/Admin/Education/EducationAddEditComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Add Edit Degree</title>
    </Head>

    <AdminLayout>
        <EducationAddEditComponent/>
    </AdminLayout>
</template>

<style scoped></style>
