<script setup>

</script>

<template>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <h6 class="mb-4 text-white">Profile</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <img class="img-fluid rounded" src="assets/images/profile.png" alt="Profile 1"
                                style="width: 20%; height: 20%; border: 2px solid aqua;">
                        </div>
                        <div>
                            <img class="img-fluid rounded" src="assets/images/profile.png" alt="Profile 2"
                                style="width: 20%; height: 20%; border: 2px solid aqua;">
                        </div>
                    </div>
                    <form action="">
                        <div class="mb-3">
                            <input type="email" class="form-control bg-dark text-white" placeholder="name@example.com">
                            <label>Email address</label>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-control">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here"
                                style="height: 150px;"></textarea>
                            <label>Comments</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
