<script setup>
import EducationListComponent from '@/Components/Admin/Education/EducationListComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeArif || Admin Education</title>
    </Head>

    <AdminLayout>
        <EducationListComponent/>
    </AdminLayout>
</template>

<style scoped></style>
