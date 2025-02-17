<script setup>
import TopBarComponent from '@/Components/Admin/Includes/TopBarComponent.vue';
import SideBarComponent from '@/Components/Admin/Includes/SideBarComponent.vue';
import ProfileEditComponent from '@/Components/Admin/Includes/ProfileEditComponent.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title> CodeAirf || Update Profile</title>
    </Head>

    <div class="container-fluid position-relative d-flex p-0">
        <SideBarComponent />

        <div class="content">
            <TopBarComponent />
            <ProfileEditComponent />
        </div>


    </div>
</template>

<style scoped></style>
