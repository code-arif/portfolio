<script setup>
import TopBar from '@/Includes/Admin/TopBar.vue';
import SideBar from '@/Includes/Admin//SideBar.vue';
</script>

<template>
    <div class="container-fluid position-relative d-flex p-0">
        <SideBar/>

        <div class="content">
            <TopBar/>

            <slot>

            </slot>
        </div>
    </div>
</template>

<style scoped>

</style>
