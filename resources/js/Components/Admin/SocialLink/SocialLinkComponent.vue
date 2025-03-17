<script setup>
import { usePage, useForm } from '@inertiajs/vue3';

const list = usePage();
const social_links = list.props.social_links || {};

//populated profile form
const form = useForm({
    // id: social_links.id || '',
    linkedin: social_links?.linkedin || '',
    facebook: social_links?.facebook || '',
    github: social_links?.github || '',
    twitter: social_links?.twitter || '',
    instagram: social_links?.instagram || '',
    fiverr: social_links?.fiverr || '',
    upwork: social_links?.upwork || '',
    freelancer: social_links?.freelancer || '',
});

//update profile
function saveLinks() {
    form.post(route('update.social.links', { id: social_links?.id || '' }), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message);
            } else {
                errorToast('Error Updating Links');
            }
        },
        onError: (errors) => {
            if (errors.linkedin) {
                errorToast(errors.linkedin)
            } else if (errors.facebook) {
                errorToast(errors.facebook)
            } else if (errors.github) {
                errorToast(errors.github)
            } else if (errors.twitter) {
                errorToast(errors.twitter)
            } else if (errors.instagram) {
                errorToast(errors.instagram)
            } else if (errors.fiverr) {
                errorToast(errors.fiverr)
            } else if (errors.upwork) {
                errorToast(errors.upwork)
            } else if (errors.freelancer) {
                errorToast(errors.freelancer)
            } else {
                errorToast('Error Updating');
            }
        }
    });
}

</script>

<template>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- profile form card -->
            <div class="col-sm-12 col-xl-12 mb-3 col-md-6">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <h6 class="mb-2 text-white">Social Links</h6>
                    <div class="line-div mb-3"></div>

                    <form @submit.prevent="saveLinks()">
                        <div class="row">
                            <!-- linkedin -->
                            <div class="form-group col-md-6">
                                <label for="linkedin" class="form-label text-light">Linkedin</label>
                                <input type="text" class="form-control bg-dark text-light" placeholder="Linkedin"
                                    id="linkedin" v-model="form.linkedin">
                            </div>

                            <!-- facebook -->
                            <div class="form-group col-md-6">
                                <label for="facebook" class="form-label text-light">Facebook</label>
                                <input type="text" class="form-control bg-dark text-light" id="facebook"
                                    placeholder="Facebook" v-model="form.facebook">
                            </div>

                            <!-- github -->
                            <div class="form-group col-md-6">
                                <label for="github" class="form-label text-light">Github</label>
                                <input type="text" class="form-control bg-dark text-light" id="github"
                                    placeholder="Github" v-model="form.github">
                            </div>

                            <!-- twitter -->
                            <div class="form-group col-md-6">
                                <label for="twitter" class="form-label text-light">Twitter</label>
                                <input type="text" class="form-control bg-dark text-light" id="twitter"
                                    placeholder="Twitter" v-model="form.twitter">
                            </div>

                            <!-- instagram -->
                            <div class="form-group col-md-6">
                                <label for="instagram" class="form-label text-light">Instagram</label>
                                <input type="text" class="form-control bg-dark text-light" id="instagram"
                                    placeholder="Instagram" v-model="form.instagram">
                            </div>

                            <!-- fiverr -->
                            <div class="form-group col-md-6">
                                <label for="fiverr" class="form-label text-light">Fiverr</label>
                                <input type="text" class="form-control bg-dark text-light" id="fiverr"
                                    placeholder="Fiverr" v-model="form.fiverr">
                            </div>

                            <!-- upwork -->
                            <div class="form-group col-md-6">
                                <label for="upwork" class="form-label text-light">Upwork</label>
                                <input type="text" class="form-control bg-dark text-light" id="upwork"
                                    placeholder="Upwork" v-model="form.upwork">
                            </div>

                            <!-- freelancer -->
                            <div class="form-group col-md-6">
                                <label for="freelancer" class="form-label text-light">Freelancer</label>
                                <input type="text" class="form-control bg-dark text-light" id="freelancer"
                                    placeholder="Freelancer" v-model="form.freelancer">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info w-100"> Submit </button>
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
