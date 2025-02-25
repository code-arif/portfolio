<script setup>
import SkillListComponent from '@/Components/Admin/Skill/SkillListComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeAirf || Admin Skill</title>
    </Head>

    <AdminLayout>
        <SkillListComponent/>
    </AdminLayout>
</template>

<style scoped></style>
