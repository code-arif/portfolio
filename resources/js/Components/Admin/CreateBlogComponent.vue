<script setup>

</script>

<template>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <div class="mb-3">
                        <label class="text-light">Title</label>
                        <input type="text" class="form-control bg-dark text-light" placeholder="Enter blog title">
                    </div>
                    <div class="mb-3">
                        <label class="text-light">Description</label>
                        <textarea class="form-control bg-dark text-light" placeholder="Blog Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="text-light">Blog featured image</label>
                        <input type="file" class="form-control-file bg-dark text-light"
                            placeholder="Blog featured image">
                    </div>

                    <div class="mb-3">
                        <label class="text-light">Blog featured image</label>

                        <QuillEditor theme="snow" :toolbar="[
                            [{ header: [1, 2, 3, 4, 5, 6, false] }], // Header levels
                            [{ font: [] }], // Font family
                            [{ size: ['small', false, 'large', 'huge'] }], // Font size
                            ['bold', 'italic', 'underline', 'strike'], // Formatting buttons
                            [{ color: [] }, { background: [] }], // Text and background colors
                            [{ script: 'sub' }, { script: 'super' }], // Subscript and superscript
                            [{ list: 'ordered' }, { list: 'bullet' }], // Lists
                            [{ indent: '-1' }, { indent: '+1' }], // Indentation
                            [{ align: [] }], // Alignment options
                            ['blockquote', 'code-block'], // Blockquote and code block
                            ['link', 'image', 'video'], // Media options
                            ['clean'] // Clear formatting
                        ]" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
