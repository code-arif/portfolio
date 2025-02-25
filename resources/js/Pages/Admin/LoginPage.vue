<script setup>
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';
const page = usePage();
const form = useForm({
    email: 'ariful@gmail.com',
    password: '1111',
});

function AdminLogin(){
    form.post(route('admin.login'),{
        onSuccess: () => {
            if(page.props.flash.status === true){
                successToast(page.props.flash.message);
                form.reset();
            }else{
                errorToast(page.props.flash.message);
            }
        },
        onError: (errors) => {
            if(errors.email){
                errorToast(errors.email);
            } else if(errors.password){
                errorToast(errors.password);
            } else{
                errorToast('Invalid credentials');
            }

        }
    });
}
</script>

<template>

    <Head>
        <title> CodeAirf || Login</title>
    </Head>

    <div class="container-fluid position-relative d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="rounded p-4 p-sm-5 my-4 mx-3 shadow-1">
                        <form @submit.prevent="AdminLogin">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 style="color:#0bceaf;">CodeArif</h3>
                                <h3 style="color:#0bceaf;">Sign In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" placeholder="Email" v-model="form.email" />
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" placeholder="Password"
                                    v-model="form.password">
                            </div>
                            <button type="submit" class="btn btn-fill w-100 mb-4">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
</template>

<style scoped></style>
