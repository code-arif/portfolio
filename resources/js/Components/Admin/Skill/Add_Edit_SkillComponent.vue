<script setup>
import { Link, usePage, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const skill = page.props.skill || {};
const form = useForm({
    title: skill.title || '',
    short_description:  skill.short_description || '',
    long_description: skill.long_description || '',
    start_date: skill.start_date || '',
    end_date: skill.end_date || '',
    language_or_key: skill.language_or_key || '',
    category: skill.category || '',
    certificate: skill.certificate || '',
    batch_no: skill.batch_no || '',
    institute: skill.institute || '',
    trainer: skill.trainer || '',
    id: skill.id || '',
});

function skillSave() {
    form.post(skill.id ? route('update.skill', skill.id) : route('create.skill'),{
        onSuccess: () => {
            if(page.props.flash.status === true){
                successToast(page.props.flash.message);
                form.reset();
            } else{
                errorToast('Error saving skill!');
            }
        }
    });
}

const imagePreview = ref(
    'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
);

// Update image preview dynamically
function certificate(event) {
    const file = event.target.files[0];
    if (file) {
        form.certificate = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
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
                            <h5 class="text-light">Add/Edit Skill</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.skill.list.page')" class="btn btn-sm btn-outline-info">Back to
                            list</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradecrumb end -->

    <!-- skill form start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="background: #191C24;">

                    <form @submit.prevent="skillSave()">
                        <!-- title -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="title" class="form-label text-light">Title</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter skill title" v-model="form.title" id="title">
                            </div>
                        </div>


                        <!-- start date and end date -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="start_date" class="form-label text-light">Start Date</label>
                                <input id="start_date" type="text" class="form-control bg-dark text-light" v-model="form.start_date" placeholder="Enter start date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_date" class="form-label text-light">End Date</label>
                                <input id="end_date" type="text" class="form-control bg-dark text-light" v-model="form.end_date" placeholder="Enter end date">
                            </div>
                        </div>

                        <!-- course language, or main keyword -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="language_or_key"
                                    class="form-label text-light">Language/Course/Keyword</label>
                                <input id="language_or_key" type="text" class="form-control bg-dark text-light"
                                    placeholder="Language/ Course/ Keyword" v-model="form.language_or_key">
                            </div>
                        </div>

                        <!-- category and batch no -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="category" class="form-label text-light">Category</label>
                                <input id="category" type="text" class="form-control bg-dark text-light"
                                    placeholder="Category" v-model="form.category">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="batch_no" class="form-label text-light">Batch No</label>
                                <input id="batch_no" type="text" class="form-control bg-dark text-light"
                                    placeholder="Batch No" v-model="form.batch_no">
                            </div>
                        </div>

                        <!-- institute and trainer -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="institute" class="form-label text-light">Institute</label>
                                <input id="institute" type="text" class="form-control bg-dark text-light"
                                    placeholder="Institute Name" v-model="form.institute">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="trainer" class="form-label text-light">Trainer</label>
                                <input id="trainer" type="text" class="form-control bg-dark text-light"
                                    placeholder="Trainer Name" v-model="form.trainer">
                            </div>
                        </div>

                        <!-- course short desciption -->
                        <div class="form-group">
                            <label for="short_description" class="form-label text-light"> Short Description</label>
                            <textarea class="form-control bg-dark text-light" placeholder="Short Description"
                                style="height: 100px;" v-model="form.short_description"></textarea>
                        </div>

                        <!-- long description -->
                        <div class="form-group">
                            <label for="long_description" class="form-label text-light">Long Description</label>
                            <textarea class="form-control bg-dark text-light" placeholder="Long Description"
                                style="height: 200px; resize: none;" v-model="form.long_description"></textarea>
                        </div>

                        <!-- course certification image -->
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label for="certificate" class="text-light">Certificate</label>
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="imagePreview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input id="certificate" type="file" class="form-control-file bg-dark text-light"
                                    @input="certificate">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-info w-100"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- skill form end -->
</template>

<style scoped></style>
