<script setup>
import Add_Edit_SkillComponent from '@/Components/Admin/Skill/Add_Edit_SkillComponent.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeArif || Add/Edit Skill</title>
    </Head>

    <AdminLayout>
        <Add_Edit_SkillComponent/>
    </AdminLayout>
</template>

<style scoped></style>

