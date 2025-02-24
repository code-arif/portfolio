<script setup>
import { usePage, useForm, Link } from '@inertiajs/vue3';
import { ref } from 'vue';


const list = usePage();
const profile = list.props.profile || {};

//populated profile form
const form = useForm({
    user_id: profile.id,
    first_name: profile.profile?.first_name || '',
    last_name: profile.profile?.last_name || '',
    designations: profile.profile?.designations || '', // Ensure this matches the backend
    phone: profile.profile?.phone || '',
    additional_phone: profile.profile?.additional_phone || '',
    main_email: profile?.email || '',
    additional_email: profile.profile?.additional_email || '',
    secondary_email: profile.profile?.secondary_email || '',
    address: profile.profile?.address || '',
    short_description: profile.profile?.short_description || '',
    long_description: profile.profile?.long_description || '',
    linkedin: profile.profile?.linkedin || '',
    facebook: profile.profile?.facebook || '',
    github: profile.profile?.github || '',
    twitter: profile.profile?.twitter || '',
    instagram: profile.profile?.instagram || '',
    fiverr: profile.profile?.fiverr || '',
    upwork: profile.profile?.upwork || '',
    freelancer: profile.profile?.freelancer || '',
    bio: profile.profile?.bio || '',
    image_one: profile.profile?.image_one || '',
    image_two: profile.profile?.image_two || ''
});

//update profile
function profileUpdate() {
    form.post(route('update.profile', { username: profile?.username }), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message)
            } else {
                errorToast('Error Updating Profile');
            }

        },
    });
}

const image_one_preview = ref(
    profile.profile?.image_one ? `/storage/${profile.profile?.image_one}` : 'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
);
const image_two_preview = ref(
    profile.profile?.image_two ? `/storage/${profile.profile?.image_two}` : 'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
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


// populated password form
const passwordForm = useForm({
    email: profile.email,
    current_password: '',
});
</script>

<template>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- profile form card -->
            <div class="col-sm-12 col-xl-9">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <h6 class="mb-4 text-white">Profile</h6>
                    <form @submit.prevent="profileUpdate()">
                        <!-- first_name, last_name, designation -->
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="first_name" class="form-label text-light">First Name</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="First Name"
                                    v-model="form.first_name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="first_name" class="form-label text-light">Last Name</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="First Name"
                                    v-model="form.last_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name" class="form-label text-light">Designations</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Designation"
                                    v-model="form.designations">
                            </div>
                        </div>

                        <!-- phone, additional phone -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="phone" class="form-label text-light">Phone</label>
                                <input type="tel" class="form-control bg-dark text-light" placeholder="Phone"
                                    v-model="form.phone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="additional_phone" class="form-label text-light">Additional Phone</label>
                                <input type="tel" class="form-control bg-dark text-light" placeholder="Additional Phone"
                                    v-model="form.additional_phone">
                            </div>
                        </div>

                        <!-- main_email, additional_email, secondary-email -->
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="main_email" class="form-label text-light">Main Email</label>
                                <input type="email" class="form-control bg-dark text-light" placeholder="Main Email"
                                    v-model="form.main_email" disabled readonly />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="additional_email" class="form-label text-light">Additional Email</label>
                                <input type="email" class="form-control bg-dark text-light"
                                    placeholder="Additional Email" v-model="form.additional_email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="secondary_email" class="form-label text-light">Secondary Email</label>
                                <input type="email" class="form-control bg-dark text-light"
                                    placeholder="Secondary Email" v-model="form.secondary_email">
                            </div>
                        </div>

                        <!-- social and marketplace links -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="linkedin" class="form-label text-light">LinkedIn</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="LinkedIn"
                                    v-model="form.linkedin">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="facebook" class="form-label text-light">Facebook</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Facebook"
                                    v-model="form.facebook">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="github" class="form-label text-light">Github</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Github"
                                    v-model="form.github">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="twitter" class="form-label text-light">Twitter</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Twitter"
                                    v-model="form.twitter">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="instagram" class="form-label text-light">Instagram</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Instagram"
                                    v-model="form.instagram">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fiverr" class="form-label text-light">Fiverr</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Fiverr"
                                    v-model="form.fiverr">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="upwork" class="form-label text-light">Upwork</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="UpWork"
                                    v-model="form.upwork">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="freelancer" class="form-label text-light">Freelancer</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Freelancer"
                                    v-model="form.freelancer">
                            </div>
                        </div>

                        <!-- bio and address -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="bio" class="form-label text-light">Bio</label>
                                <textarea class="form-control bg-dark text-light" placeholder="Bio"
                                    style="height: 50px; resize: none;" v-model="form.bio"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bio" class="form-label text-light">Address</label>
                                <textarea class="form-control bg-dark text-light" placeholder="Address"
                                    style="height: 50px; resize: none;" v-model="form.address"></textarea>
                            </div>
                        </div>

                        <!-- short description -->
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


                        <div class="row">
                            <div class="form-group col-md-6">
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="image_one_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                    <img :src="image_two_preview" alt="Image Preview" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="file" class="form-control-file bg-dark text-light"
                                    @input="image_one">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="file" class="form-control-file bg-dark text-light"
                                    @input="image_two">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-light w-100"> Submit </button>
                    </form>
                </div>
            </div>

            <!-- password reset form -->
            <div class="col-sm-12 col-xl-3">
                <div class="rounded p-4" style="background: #191C24;">
                    <h6 class="mb-4 text-white">Password</h6>
                    <form @submit.prevent="">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input v-model="passwordForm.email" type="email" class="form-control bg-dark text-light"
                                    placeholder="Email" disabled readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control bg-dark text-light"
                                    placeholder="Old Password">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control bg-dark text-light"
                                    placeholder="New Password">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control bg-dark text-light"
                                    placeholder="Confirm Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-light w-100"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
