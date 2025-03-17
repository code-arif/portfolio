<script setup>
import { Link, usePage, useForm } from '@inertiajs/vue3';

const page = usePage();
const degree = page.props.degree || {};

const form = useForm({
    degree_name: degree.degree_name || '',
    institute_name: degree.institute_name || '',
    start_date: degree.start_date || '',
    end_date: degree.end_date || '',
    gpa: degree.gpa || '',
    cgpa: degree.cgpa || '',
    description: degree.description || '',
    id: degree.id || '',
});

function degreeSave() {
    form.post(degree.id ? route('update.degree', degree.id) : route('create.degree'), {
        onSuccess: () => {
            if (page.props.flash.status === true) {
                successToast(page.props.flash.message);
            } else {
                errorToast('Error saving degree!');
            }
        },
        onError: (errors) => {
            if (errors.degree_name) {
                errorToast(errors.degree_name);
            } else if (errors.institute_name) {
                errorToast(errors.institute_name);
            } else if (errors.start_date) {
                errorToast(errors.start_date);
            } else if (errors.end_date) {
                errorToast(errors.end_date)
            } else if (errors.gpa) {
                errorToast(errors.gpa)
            } else if (errors.cgpa) {
                errorToast(errors.cgpa)
            } else if (errors.description) {
                errorToast(errors.description)
            } else {
                errorToast('Error saving degree!');
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
                            <h5 class="text-light">{{ form.id ? 'Edit' : 'Add' }} Degree</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.degree.list')" class="btn btn-sm btn-outline-info">Back to
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
                    <form @submit.prevent="degreeSave()">
                        <div class="row">
                            <!-- degree name -->
                            <div class="form-group col-md-6">
                                <label for="degree_name" class="form-label text-light">Degree Name</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter degree name" v-model="form.degree_name" id="degree_name">
                            </div>

                            <!-- institute_name -->
                            <div class="form-group col-md-6">
                                <label for="institute_name" class="form-label text-light">Institute Name</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter institute name" v-model="form.institute_name"
                                    id="institute_name">
                            </div>

                            <!-- start_date -->
                            <div class="form-group col-md-6">
                                <label for="start_date" class="form-label text-light">Start date</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Start date"
                                    v-model="form.start_date" id="start_date">
                            </div>

                            <!-- end_date -->
                            <div class="form-group col-md-6">
                                <label for="end_date" class="form-label text-light">End date</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="End date"
                                    v-model="form.end_date" id="end_date">
                            </div>

                            <!-- gpa -->
                            <div class="form-group col-md-6">
                                <label for="gpa" class="form-label text-light">GPA</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="GPA"
                                    v-model="form.gpa" id="gpa">
                            </div>

                            <!-- cgpa -->
                            <div class="form-group col-md-6">
                                <label for="cgpa" class="form-label text-light">CGPA</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="CGPA"
                                    v-model="form.cgpa" id="cgpa">
                            </div>
                        </div>

                        <!-- long description -->
                        <div class="form-group">
                            <label for="description" class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark text-light" placeholder="Description"
                                style="height: 200px; resize: none;" v-model="form.description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-info"> {{ form.id ? 'Update' : 'Add' }} Degree </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio form end -->
</template>

<style scoped></style>
