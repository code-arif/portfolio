<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title>POS || 404</title>
    </Head>

    <div id="wrapper">
        <div class="container text-center">
            <h1 class="error-text">404</h1>
            <p class="lead">Page Not Found</p>
            <Link href="/" class="btn btn-primary mt-3">Back to Home</Link>
        </div>
    </div>
</template>

<style scoped>
/* Center the content vertically and horizontally */
#wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f9fc;
}

/* Error text styling */
.error-text {
    font-size: 100px;
    font-weight: bold;
    color: #0bceaf;
    margin-bottom: 10px;
}

/* Paragraph styling */
.lead {
    font-size: 20px;
    color: #6c757d;
}

/* Button styling */
.btn-primary {
    color: #fff;
    background-color: #4e73df;
    border: none;
}

.btn-primary:hover {
    background-color: #375abf;
}
</style>
