<script setup>
import { Head, Link } from '@inertiajs/vue3';
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
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3 style="color:#0bceaf;">CodeArif</h3>
                            <h3 style="color:#0bceaf;">Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <Link type="submit" href="/dashboard" class="btn btn-fill py-3 w-100 mb-4">Sign In</Link>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
</template>

<style scoped></style>
