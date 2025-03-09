<script setup>
import { usePage, useForm } from '@inertiajs/vue3';

const list = usePage();
const profile = list.props.profile || {};

//populated profile form
const form = useForm({
    user_id: profile.id,
    first_name: profile?.first_name || '',
    last_name: profile?.last_name || '',
    designations: profile?.designations || '',
    phone: profile?.phone || '',
    additional_phone: profile?.additional_phone || '',
    additional_email: profile?.additional_email || '',
    secondary_email: profile?.secondary_email || '',
    address: profile?.address || '',
    bio: profile?.bio || '',
});

//update profile
function profileUpdate() {
    form.post(route('update.profile', { id: profile.id}), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message)
            } else {
                errorToast('Error Updating Profile');
            }
        },
    });
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
            <div class="col-sm-12 col-xl-8 mb-3 col-md-6">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <h6 class="mb-4 text-white">Profile</h6>
                    <form @submit.prevent="profileUpdate()">
                        <!-- first_name, last_name, designation -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="form-label text-light">First Name</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="First Name"
                                    v-model="form.first_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name" class="form-label text-light">Last Name</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="First Name"
                                    v-model="form.last_name">
                            </div>
                        </div>

                        <!-- designations -->
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
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
                            <div class="form-group col-md-6">
                                <label for="additional_email" class="form-label text-light">Additional Email</label>
                                <input type="email" class="form-control bg-dark text-light"
                                    placeholder="Additional Email" v-model="form.additional_email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="secondary_email" class="form-label text-light">Secondary Email</label>
                                <input type="email" class="form-control bg-dark text-light"
                                    placeholder="Secondary Email" v-model="form.secondary_email">
                            </div>
                        </div>

                        <!-- bio and address -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="bio" class="form-label text-light">Bio</label>
                                <textarea class="form-control bg-dark text-light" placeholder="Bio"
                                    style="height: 70px; resize: none;" v-model="form.bio"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bio" class="form-label text-light">Address</label>
                                <textarea class="form-control bg-dark text-light" placeholder="Address"
                                    style="height: 70px; resize: none;" v-model="form.address"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info w-100"> Submit </button>
                    </form>
                </div>
            </div>

            <!-- password reset form -->
            <div class="col-sm-12 col-md-6 col-xl-4">
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
                        <button type="submit" class="btn btn-info w-100"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
