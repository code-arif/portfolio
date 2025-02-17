<script setup>

</script>

<template>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content image-bg ">
                <div class="img-foverlay img-color-overlay" style="border: 1px solid #0bceaf">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hire Me</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class="fa fa-times"></i> </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">

                            <div class="form-group mb-2">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name">
                            </div>

                            <div class="row">
                                <div class="form-group mb-2 col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group mb-2 col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="project">Project Type:</label>
                                <select class="form-control" id="project" name="project">
                                    <option value="website">Website Development</option>
                                    <option value="ecommerce">E-commerce</option>
                                    <option value="custom">Custom Software</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="budget">Budget Range:</label>
                                <input type="text" class="form-control" id="budget" name="budget">
                            </div>
                            <div class="form-group">
                                <label for="deadline">Project Deadline:</label>
                                <input type="date" class="form-control" id="deadline" name="deadline">
                            </div>
                            <div class="form-group">
                                <label for="notes">Additional Notes:</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-fill mr-2">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
