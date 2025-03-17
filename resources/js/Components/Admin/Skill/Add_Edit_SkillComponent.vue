<script setup>
import { Link, usePage, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const skill = page.props.skill || {};
const form = useForm({
    prefix: skill.prefix || '',
    title: skill.title || '',
    preposition: skill.preposition || '',
    suffix: skill.suffix || '',
    conjunction: skill.conjunction || '',
    short_description: skill.short_description || '',
    long_description: skill.long_description || '',
    start_date: skill.start_date || '',
    end_date: skill.end_date || '',
    language_or_key: skill.language_or_key || '',
    category: skill.category || '',
    certificate_image: skill.certificate_image || '',
    certificate_link: skill.certificate_link || '',
    progress_certificate: skill.progress_certificate || '',
    batch_no: skill.batch_no || '',
    batch_name: skill.batch_name || '',
    student_id: skill.student_id || '',
    institute_name: skill.institute_name || '',
    institute_branch: skill.institute_branch || '',
    institute_website: skill.institute_website || '',
    trainer_name: skill.trainer_name || '',
    id: skill.id || '',
});

function skillSave() {
    form.post(skill.id ? route('update.skill', skill.id) : route('create.skill'), {
        onSuccess: () => {
            if (page.props.flash.status === true) {
                successToast(page.props.flash.message);
                form.reset();
            } else {
                errorToast('Error saving skill!');
            }
        },
        onError: (errors) => {
            if (errors.prefix) {
                errorToast(errors.prefix);
            } else if (errors.title) {
                errorToast(errors.title);
            } else if (errors.preposition) {
                errorToast(errors.preposition);
            } else if (errors.suffix) {
                errorToast(errors.suffix);
            } else if (errors.conjunction) {
                errorToast(errors.conjunction);
            } else if (errors.short_description) {
                errorToast(errors.short_description);
            } else if (errors.long_description) {
                errorToast(errors.long_description);
            } else if (errors.start_date) {
                errorToast(errors.start_date);
            } else if (errors.end_date) {
                errorToast(errors.end_date);
            } else if (errors.language_or_key) {
                errorToast(errors.language_or_key);
            } else if (errors.category) {
                errorToast(errors.category);
            } else if (errors.certificate_image) {
                errorToast(errors.certificate_image);
            } else if (errors.certificate_link) {
                errorToast(errors.certificate_link);
            } else if (errors.progress_certificate) {
                errorToast(errors.progress_certificate);
            } else if (errors.batch_no) {
                errorToast(errors.batch_no);
            } else if (errors.batch_name) {
                errorToast(errors.batch_name);
            } else if (errors.student_id) {
                errorToast(errors.student_id);
            } else if (errors.institute_name) {
                errorToast(errors.institute_name);
            } else if (errors.institute_branch) {
                errorToast(errors.institute_branch);
            } else if (errors.institute_website) {
                errorToast(errors.institute_website);
            } else if (errors.trainer_name) {
                errorToast(errors.trainer_name);
            } else {
                errorToast('Error saving skill!');
            }
        }
    });
}

//preview image
const certificateImagePreview = ref(skill.certificate_image ? `/storage/${skill.certificate_image}` : '/assets/images/placeholder-image.jpg');
const progressCertificatePreview = ref(skill.progress_certificate ? `/storage/${skill.progress_certificate}` : '/assets/images/placeholder-image.jpg');

// Update image preview dynamically
function certificateImage(event) {
    const file = event.target.files[0];
    if (file) {
        form.certificate_image = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            certificateImagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

// Update image preview dynamically
function progressCertificate(event) {
    const p_file = event.target.files[0];
    if (p_file) {
        form.progress_certificate = p_file;
        const reader = new FileReader();
        reader.onload = (e) => {
            progressCertificatePreview.value = e.target.result;
        };
        reader.readAsDataURL(p_file);
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
                            <h5 class="text-light">{{ form.id ? 'Edit' : 'Add' }} Skill</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.skill.list')" class="btn btn-sm btn-outline-info">Back to
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
                        <div class="row">
                            <!-- prefix -->
                            <div class="form-group col-md-6">
                                <label for="prefix" class="form-label text-light">Prefix</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter skill prefix" v-model="form.prefix" id="prefix">
                            </div>

                            <!-- title -->
                            <div class="form-group col-md-6">
                                <label for="title" class="form-label text-light">Title</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter skill title" v-model="form.title" id="title">
                            </div>

                            <!-- preposition -->
                            <div class="form-group col-md-4">
                                <label for="preposition" class="form-label text-light">Preposition</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter skill preposition" v-model="form.preposition" id="preposition">
                            </div>

                            <!-- suffix -->
                            <div class="form-group col-md-4">
                                <label for="suffix" class="form-label text-light">Suffix</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter skill suffix" v-model="form.suffix" id="suffix">
                            </div>

                            <!-- conjunction -->
                            <div class="form-group col-md-4">
                                <label for="conjunction" class="form-label text-light">Conjunction</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter skill conjunction" v-model="form.conjunction" id="conjunction">
                            </div>
                        </div>

                        <!-- start date and end date -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="start_date" class="form-label text-light">Start Date</label>
                                <input id="start_date" type="text" class="form-control bg-dark text-light"
                                    v-model="form.start_date" placeholder="Enter start date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_date" class="form-label text-light">End Date</label>
                                <input id="end_date" type="text" class="form-control bg-dark text-light"
                                    v-model="form.end_date" placeholder="Enter end date">
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
                            <div class="form-group col-md-3">
                                <label for="category" class="form-label text-light">Category</label>
                                <input id="category" type="text" class="form-control bg-dark text-light"
                                    placeholder="Category" v-model="form.category">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="batch_no" class="form-label text-light">Batch No</label>
                                <input id="batch_no" type="text" class="form-control bg-dark text-light"
                                    placeholder="Batch No" v-model="form.batch_no">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="batch_name" class="form-label text-light">Batch Name</label>
                                <input id="batch_name" type="text" class="form-control bg-dark text-light"
                                    placeholder="Batch Name" v-model="form.batch_name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="student_id" class="form-label text-light">Student ID</label>
                                <input id="student_id" type="text" class="form-control bg-dark text-light"
                                    placeholder="Student ID" v-model="form.student_id">
                            </div>
                        </div>

                        <!-- institute_name, institute_branch, institute_website, trainer_name -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="institute_name" class="form-label text-light">Institute Name</label>
                                <input id="institute_name" type="text" class="form-control bg-dark text-light"
                                    placeholder="Institute Name" v-model="form.institute_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="institute_branch" class="form-label text-light">Institute Branch</label>
                                <input id="institute_branch" type="text" class="form-control bg-dark text-light"
                                    placeholder="Institute Branch" v-model="form.institute_branch">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="institute_website" class="form-label text-light">Institute Website</label>
                                <input id="institute_website" type="text" class="form-control bg-dark text-light"
                                    placeholder="Institute Website" v-model="form.institute_website">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="trainer" class="form-label text-light">Trainer Name</label>
                                <input id="trainer" type="text" class="form-control bg-dark text-light"
                                    placeholder="Trainer Name" v-model="form.trainer_name">
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

                        <!-- course certification_image and progress_certificate image -->
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="col-md-6"
                                style="background: #000; border-radius: 10px ; padding: 10px 20px; flex-basis: 49%;">
                                <div class="form-group">
                                    <label for="certificate_image" class="text-light"> Certification Image</label>
                                    <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                        <img :src="certificateImagePreview" alt="Preview certificate image"
                                            class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="certificate_image" type="file"
                                        class="form-control-file bg-dark text-light" @input="certificateImage">
                                </div>

                                <div class="form-group">
                                    <label for="certificate_link" class="form-label text-light"> Certificate
                                        Link</label>
                                    <input id="certificate_link" type="text" class="form-control bg-dark text-light"
                                        placeholder="Certificate Link" v-model="form.certificate_link">
                                </div>
                            </div>
                            <div class="col-md-6"
                                style="background: #000; border-radius: 10px ; padding: 10px 20px; flex-basis: 49%;">
                                <div class="form-group">
                                    <label for="progress_certificate" class="text-light"> Progress Certificate
                                        Image</label>
                                    <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                        <img :src="progressCertificatePreview" alt="Preview progress certificate image"
                                            class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="progress_certificate" type="file"
                                        class="form-control-file bg-dark text-light" @input="progressCertificate">
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-info"> {{ form.id ? 'Update' : 'Add' }} Skill </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- skill form end -->
</template>

<style scoped></style>
