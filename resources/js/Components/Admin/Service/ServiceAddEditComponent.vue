<script setup>
import { Link, usePage, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const service = page.props.service || {};
const form = useForm({
    name: service.name || '',
    icon: service.icon || '',
    icon_color_code: service.icon_color_code || '',
    status: service.status ?? 1,
    description: service.description || '',
    id: service.id || '',
});

function saveService() {
    form.post(service.id ? route('update.service', service.id) : route('create.service'), {
        onSuccess: () => {
            if (page.props.flash.status === true) {
                successToast(page.props.flash.message);
                form.reset();
            } else {
                errorToast('Error saving service!');
            }
        },
        onError: (errors) => {
            if(errors.name){
                errorToast(errors.name)
            } else if(errors.icon){
                errorToast(errors.icon)
            } else if(errors.icon_color_code){
                errorToast(errors.icon_color_code)
            } else if(errors.status){
                errorToast(errors.status)
            } else if(errors.description){
                errorToast(errors.description)
            } else {
                errorToast('Error saving service!');
            }
        }
    });
}


</script>

<template>
    <!--bradecramb start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12 mb-1 col-md-6">
                <div class="rounded h-100 p-3" style="background: #191C24;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <h5 class="text-light">{{ form.id ? 'Edit' : 'Add' }} Service</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.service.list')" class="btn btn-sm btn-outline-info">Back to
                            list</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradecrumb end -->

    <!-- portfolio form start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <form @submit.prevent="saveService()">
                        <div class="row">
                            <!-- name -->
                            <div class="form-group col-md-6">
                                <label for="name" class="form-label text-light">Name</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter service name" v-model="form.name" id="name">
                            </div>

                            <!-- icon -->
                            <div class="form-group col-md-6">
                                <label for="icon" class="form-label text-light">Icon class</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter Icon Class" v-model="form.icon" id="icon">
                            </div>

                            <!-- icon color class -->
                            <div class="form-group col-md-6">
                                <label for="icon_color_code" class="form-label text-light">Icon color code</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter icon color code" v-model="form.icon_color_code" id="icon_color_code">
                            </div>

                            <!-- Status -->
                            <div class="form-group col-md-6">
                                <label for="status" class="form-label text-light">Select status</label>
                                <select id="status" v-model="form.status" class="form-control">
                                    <option value="" selected>Select One</option>
                                    <option :value="1">Active</option>
                                    <option :value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- long description -->
                        <div class="form-group">
                            <label for="description" class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark text-light" placeholder="Description"
                                style="height: 200px; resize: none;" v-model="form.description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-info"> {{ form.id ? 'Update' : 'Add' }} Service </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio form end -->
</template>

<style scoped></style>
