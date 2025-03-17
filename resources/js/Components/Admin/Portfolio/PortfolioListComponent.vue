<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const Header = [
    { text: "No", value: "no" },
    { text: "Featured Image", value: "featured_image" },
    { text: "Image", value: "image" },
    { text: "Title", value: "title" },
    { text: "Category", value: "category" },
    { text: "Github", value: "github_url", width: 100 },
    { text: "Live", value: "live_url", width: 100 },
    { text: "Language or Key", value: "language_or_key", width: 150 },
    { text: "Status", value: "status" },
    { text: "Action", value: "action", width: 20 },
];

// Transform data for table
const Item = computed(() => {
    return page.props.portfolios?.map((portfolio, index) => ({
        no: index + 1,
        featured_image: portfolio.featured_image ? portfolio.featured_image : '',
        image: portfolio.image ? portfolio.image : '',
        title: portfolio.title ? portfolio.title : '',
        category: portfolio.category ? portfolio.category : '',
        github_url: portfolio.github_url ? portfolio.github_url : '',
        live_url: portfolio.live_url ? portfolio.live_url : '',
        language_or_key: portfolio.language_or_key ? portfolio.language_or_key : '',
        status: portfolio.status == 1 ? 'Active' : 'Inactive',
        id : portfolio.id
    }));
});

//======================change porject status ======================//
const toggleStatus = (id, currentStatus) => {
    if (confirm("Are you sure you want to change status?")) {
        const newStatus = currentStatus === "Active" ? 0 : 1;

        router.post(route("change.status.portfolio", {
            id: id
        }), {
            status: newStatus
        }, {
            preserveScroll: true,
            onSuccess: () => {
                successToast(page.props.flash.message);
            },
            onError: () => {
                errorToast(page.props.flash.message);
            }
        });
    }
}

</script>

<template>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- profile form card -->
            <div class="col-sm-12 col-xl-12 mb-1 col-md-6">
                <div class="rounded h-100 p-3" style="background: #191C24;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <h5 class="text-light">Projects</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.add.edit.portfolio')" class="btn btn-sm btn-outline-info">Add
                            Portfolio</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="background: #191C24;">
                    <div class="table-responsive">
                        <EasyDataTable buttons-pagination alternating :headers="Header" :items="Item" border-cell
                            theme-color="#0bceaf" :rows-per-page="10">
                            <template #item-featured_image="{ featured_image }">
                                <img :src="featured_image ? `/storage/${featured_image}` : '/assets/images/placeholder-image.jpg'"
                                    alt="Project thumbnail image" style="width: 50px; height: 50px; object-fit: cover;"
                                    class="p-1">
                            </template>
                            <template #item-image="{ image }">
                                <img :src="image ? `/storage/${image}` : '/assets/images/placeholder-image.jpg'"
                                    alt="Project full image" style="width: 50px; height: 50px; object-fit: cover;"
                                    class="p-1">
                            </template>
                            <template #item-status="{ status, id }">
                                <button @click="toggleStatus(id, status)"
                                    style="font-size: 30px; border: none; outline: none; background: none;">
                                    <i :class="status === 'Active' ? 'fa fa-toggle-on actv' : 'fa fa-toggle-off deact'"></i>
                                </button>
                            </template>
                            <template #item-action="{ id }">
                                <div class="d-flex justify-content-center align-items-center">
                                    <Link :href="route('show.add.edit.portfolio', { id: id })" class="edit-btn">
                                    <i class="fa fa-edit"></i>
                                    </Link>
                                    <button class="dlt-btn" @click="deleteCourse(id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.table-responsive ::-webkit-scrollbar {
    height: 12px;
}

.table-responsive ::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.table-responsive ::-webkit-scrollbar-thumb {
    background: #0bceaf;
    border-radius: 10px;
}

.table-responsive ::-webkit-scrollbar-thumb:hover {
    background: #0bceaf;
}

.edit-btn {
    padding: 1.5px 6px;
    margin-right: 10px;
    border: 1px solid #0bceaf;
    color: #0bceaf;
    border-radius: 2px;
    font-size: 15px;
}

.edit-btn:hover {
    color: #fff;
    background: #0bceaf;
}

.dlt-btn {
    padding: 1.5px 6px;
    margin-right: 10px;
    border: 1px solid red;
    color: red;
    border-radius: 2px;
    font-size: 15px;
}

.dlt-btn:hover {
    color: #fff;
    background: red;
}

.actv{
    color: #0bceaf;
}

.deact{
    color: red;
}
</style>
