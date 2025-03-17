<script setup>
import { Link, usePage, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const portfolio = page.props.portfolio || {};
const form = useForm({
    title: portfolio.title || '',
    category: portfolio.category || '',
    language_or_key: portfolio.language_or_key || '',
    status: portfolio.status || '',
    short_description: portfolio.short_description || '',
    long_description: portfolio.long_description || '',
    github_url: portfolio.github_url || '',
    live_url: portfolio.live_url || '',
    image: portfolio.image || '',
    featured_image: portfolio.featured_image || '',
    id: portfolio.id || '',
});

function portfolioSave() {
    form.post(portfolio.id ? route('update.portfolio', portfolio.id) : route('create.portfolio'), {
        onSuccess: () => {
            if (page.props.flash.status === true) {
                successToast(page.props.flash.message);
                form.reset();
            } else {
                errorToast('Error saving portfolio!');
            }
        },
        onError: (errors) => {
            if (errors.title) {
                errorToast(errors.title);
            } else if (errors.language_or_key) {
                errorToast(errors.language_or_key);
            } else if (errors.short_description) {
                errorToast(errors.short_description);
            } else if (errors.long_description) {
                errorToast(errors.long_description);
            } else if (errors.github_url) {
                errorToast(errors.github_url);
            } else if (errors.live_url) {
                errorToast(errors.live_url);
            } else if (errors.image) {
                errorToast(errors.image);
            } else if (errors.featured_image) {
                errorToast(errors.featured_image);
            } else {
                errorToast('Error saving portfolio!');
            }
        }
    });
}


//image preview
const imagePreview = ref(portfolio.image ? `/storage/${portfolio.image}` : '/assets/images/placeholder-image.jpg');

// Update image preview dynamically
function image(event) {
    const image = event.target.files[0];
    if (image) {
        form.image = image;
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(image);
    }
}

//featured image preview
const featuredImagePreview = ref(portfolio.featured_image ? `/storage/${portfolio.featured_image}` : '/assets/images/placeholder-image.jpg');

function featuredImage(event) {
    const featured_image = event.target.files[0];
    if (featured_image) {
        form.featured_image = featured_image;
        const reader = new FileReader();
        reader.onload = (e) => {
            featuredImagePreview.value = e.target.result;
        };
        reader.readAsDataURL(featured_image);
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
                            <h5 class="text-light">{{ form.id ? 'Edit' : 'Add' }} Portfolio</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.portfolio.list')" class="btn btn-sm btn-outline-info">Back to
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
                    <form @submit.prevent="portfolioSave()">
                        <!-- title and category -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title" class="form-label text-light">Title</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter project title" v-model="form.title" id="title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category" class="form-label text-light">Category</label>
                                <input type="text" class="form-control bg-dark text-light"
                                    placeholder="Enter project category" v-model="form.category" id="category">
                            </div>
                        </div>

                        <!-- course language, or main keyword and status -->
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="language_or_key"
                                        class="form-label text-light">Language/Course/Keyword</label>
                                    <input id="language_or_key" type="text" class="form-control bg-dark text-light"
                                        placeholder="Language/ Course/ Keyword" v-model="form.language_or_key">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="statue" class="form-label text-light">Select Status</label>
                                    <select class="form-control" id="status" v-model="form.status">
                                        <option :value="1">Active</option>
                                        <option :value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- github url live url -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="github_url" class="form-label text-light">Github Link</label>
                                <input id="github_url" type="text" class="form-control bg-dark text-light"
                                    v-model="form.github_url" placeholder="Enter project github link">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="live_url" class="form-label text-light">Live Link</label>
                                <input id="live_url" type="text" class="form-control bg-dark text-light"
                                    v-model="form.live_url" placeholder="Enter porject live link">
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

                        <!-- project featured_image, image and video -->
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="col-md-4"
                                style="background: #000; border-radius: 10px ; padding: 10px 20px; flex-basis: 32%;">
                                <div class="form-group">
                                    <label for="featured_image" class="text-light">Project Freatured Image</label>
                                    <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                        <img :src="featuredImagePreview" alt="Preview thumbnail image" class="img-fluid"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="featured_image" type="file" class="form-control-file bg-dark text-light"
                                        @input="featuredImage">
                                </div>
                            </div>
                            <div class="col-md-4"
                                style="background: #000; border-radius: 10px ; padding: 10px 20px; flex-basis: 32%;">
                                <div class="form-group">
                                    <label for="image" class="text-light">Project Image</label>
                                    <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                        <img :src="imagePreview" alt="Preview full image" class="img-fluid"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="image" type="file" class="form-control-file bg-dark text-light"
                                        @input="image">
                                </div>
                            </div>
                            <div class="col-md-4"
                                style="background: #000; border-radius: 10px ; padding: 10px 20px; flex-basis: 32%;">
                                <div class="form-group">
                                    <label for="image" class="text-light">Project Video</label>
                                    <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                        <img :src="imagePreview" alt="Preview full image" class="img-fluid"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="image" type="file" class="form-control-file bg-dark text-light"
                                        @input="image">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info"> {{ form.id ? 'Update' : 'Add' }} portfolio </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio form end -->
</template>

<style scoped></style>
