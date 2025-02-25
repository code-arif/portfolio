<script setup>
import { usePage, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const about = page.props.about || {};

//populated profile form
const form = useForm({
    short_description: about?.short_description || '',
    long_description: about?.long_description || '',
});

//image handle
const image_one_preview = ref(
    'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
);
const image_two_preview = ref(
    'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
);

// Update image preview dynamically
function image_one(event) {
    const file = event.target.files[0];
    if (file) {
        form.image_one = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            image_one_preview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
function image_two(event) {
    const file = event.target.files[0];
    if (file) {
        form.image_two = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            image_two_preview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

</script>

<template>
    <div class="container-fluid pt-4 px-4 mb-3">
        <div class="row g-4">
            <!-- about form card -->
            <div class="col-sm-12 col-xl-8  col-md-6">
                <div class="rounded p-4" style="background: #191C24;">
                    <h6 class="mb-4 text-white">About</h6>
                    <form @submit.prevent="about()">
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
                        <button type="submit" class="btn btn-outline-info w-100"> Submit </button>
                    </form>
                </div>
            </div>

            <!-- images form -->
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <h6 class="mb-4 text-white">Images</h6>
                    <form @submit.prevent="">
                        <div class="row mb-3" style="background: #000; border-radius: 10px ; padding: 10px;">
                            <div class="form-group col-md-12">
                                <label for="hero_image" class="text-light">Hero Image</label>
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="image_one_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input id="hero_image" type="file" class="form-control-file bg-dark text-light" @input="image_one">
                            </div>
                        </div>
                        <div class="row mb-3" style="background: #000; border-radius: 10px ; padding: 10px;">
                            <div class="form-group col-md-12">
                                <label for="about_image" class="text-light">About Image</label>
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="image_two_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input id="about_image" type="file" class="form-control-file bg-dark text-light" @input="image_two">
                            </div>
                        </div>
                        <div class="row mb-3" style="background: #000; border-radius: 10px ; padding: 10px;">
                            <div class="form-group col-md-12">
                                <label for="logo" class="text-light">Logo</label>
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="image_two_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input id="logo" type="file" class="form-control-file bg-dark text-light" @input="image_two">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-info w-100"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
