<script setup>
import { usePage, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const about = page.props.about || {};
const image = page.props.image || {};

//populated profile form
const form = useForm({
    short_description: about?.short_description || '',
    long_description: about?.long_description || '',
});

//=================about update==================//
function aboutUpdate() {
    form.post(route('update.about', { id: about?.id || '' }), {
        preserveScroll: true,
        onSuccess: () => {
            if (page.props.flash.status === true) {
                successToast(page.props.flash.message);
            } else {
                errorToast('Error Updating About');
            }
        },
        onError: (errors) => {
            if (errors.short_description) {
                errorToast(errors.short_description);
            } else if (errors.long_description) {
                errorToast(errors.long_description);
            } else {
                errorToast('Error Updating About');
            }
        }
    });
}


//========================image upload=====================//
// Form Data
const imgForm = useForm({
    hero_image: '',
    about_image: '',
    logo: ''
});

// Image Preview
const hero_image_preview = ref(image.hero_image ? `/storage/${image.hero_image}` : '/assets/images/placeholder-image.jpg');
const about_image_preview = ref(image.about_image ? `/storage/${image.about_image}` : '/assets/images/placeholder-image.jpg');
const logo_preview = ref(image.logo ? `/storage/${image.logo}` : '/assets/images/placeholder-image.jpg');



// Handle Image Upload
function handleImageUpload(event, imageType) {
    const file = event.target.files[0];
    if (file) {
        imgForm[imageType] = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            if (imageType === 'hero_image') hero_image_preview.value = e.target.result;
            if (imageType === 'about_image') about_image_preview.value = e.target.result;
            if (imageType === 'logo') logo_preview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

// Submit Form
function imageForm() {
    imgForm.post(route('store.image'), {
        preserveScroll: true,
        onSuccess: () => {
            if (page.props.flash.status === true) {
                successToast(page.props.flash.message);
            } else {
                errorToast('Error Saving Image !');
            }
        }, onError: (errors) => {
            if (errors.hero_image) {
                errorToast(errors.hero_image);
            } else if (errors.about_image) {
                errorToast(errors.about_image);
            } else if (errors.logo) {
                errorToast(errors.logo);
            } else {
                errorToast('Error Saving Image !');
            }
        }
    });
}

</script>

<template>
    {{ hero_image_preview }}
    <div class="container-fluid pt-4 px-4 mb-3">
        <div class="row g-4">
            <!-- about form card -->
            <div class="col-sm-12 col-xl-8  col-md-6">
                <div class="rounded p-4" style="background: #191C24;">
                    <h6 class="mb-2 text-white">About</h6>
                    <div class="line-div mb-3"></div>

                    <form @submit.prevent="aboutUpdate()">
                        <div class="form-group">
                            <label for="short_description" class="form-label text-light"> Short Description</label>
                            <textarea class="form-control bg-dark text-light" placeholder="Short Description"
                                id="short_description" style="height: 100px;"
                                v-model="form.short_description"></textarea>
                        </div>

                        <!-- long description -->
                        <div class="form-group">
                            <label for="long_description" class="form-label text-light">Long Description</label>
                            <textarea class="form-control bg-dark text-light" placeholder="Long Description"
                                id="long_description" style="height: 400px; resize: none;"
                                v-model="form.long_description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info w-100"> Save Change </button>
                    </form>
                </div>
            </div>

            <!-- images form -->
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <h6 class="mb-2 text-white">Images</h6>
                    <div class="line-div mb-3"></div>

                    <form @submit.prevent="imageForm">
                        <!-- Hero Image -->
                        <div class="row mb-3" style="background: #000; border-radius: 10px; padding: 10px;">
                            <div class="form-group col-md-12">
                                <label for="hero_image" class="text-light">Hero Image</label>
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="hero_image_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input id="hero_image" type="file" class="form-control-file bg-dark text-light"
                                    @change="handleImageUpload($event, 'hero_image')">
                            </div>
                        </div>

                        <!-- About Image -->
                        <div class="row mb-3" style="background: #000; border-radius: 10px; padding: 10px;">
                            <div class="form-group col-md-12">
                                <label for="about_image" class="text-light">About Image</label>
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="about_image_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input id="about_image" type="file" class="form-control-file bg-dark text-light"
                                    @change="handleImageUpload($event, 'about_image')">
                            </div>
                        </div>

                        <!-- Logo -->
                        <div class="row mb-3" style="background: #000; border-radius: 10px; padding: 10px;">
                            <div class="form-group col-md-12">
                                <label for="logo" class="text-light">Logo</label>
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="logo_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input id="logo" type="file" class="form-control-file bg-dark text-light"
                                    @change="handleImageUpload($event, 'logo')">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.line-div {
    display: inline-block;
    width: 100%;
    height: 1px;
    background-color: rgb(178, 178, 178);
}
</style>
