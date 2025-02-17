<script setup>
import TopBarComponent from '@/Components/Admin/Includes/TopBarComponent.vue';
import SideBarComponent from '@/Components/Admin/Includes/SideBarComponent.vue';
import CreateBlogComponent from '@/Components/Admin/CreateBlogComponent.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeAirf || Dashboard</title>
    </Head>

    <div class="container-fluid position-relative d-flex p-0">
        <SideBarComponent />

        <div class="content">
            <TopBarComponent />
            <CreateBlogComponent />
        </div>
    </div>
</template>

<style scoped>

</style>
