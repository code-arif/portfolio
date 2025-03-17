<script setup>
import { Link, usePage, router } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const Header = [
    { text: "No", value: "no"},
    { text: "Icon", value: "icon" },
    { text: "Name", value: "name" },
    { text: "Status", value: "status" },
    { text: "Action", value: "action"},
];

// Transform data for table
const Item = computed(() => {
    return page.props.services?.map((service, index) => ({
        no: index + 1,
        icon: service.icon,
        name: service.name,
        status: service.status == 1 ? 'Active' : 'Inactive',
        id: service.id,
        icon_color_code: service.icon_color_code,
    }));
});

//========================change status functionality ========================//
const toggleStatus = (id, currentStatus) => {
    if (confirm("Are you sure you want to change status?")) {
        const newStatus = currentStatus === "Active" ? 0 : 1;

        router.post(route("change.status.service", {
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
                            <h5 class="text-light">Services</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.add.edit.service')" class="btn btn-sm btn-outline-info">Add Service</Link>
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
                            <template #item-icon="{ icon }">
                                <i :class="icon" style="font-size: 25px; color: #0bceaf;"> </i>
                            </template>
                            <template #item-status="{ status, id }">
                                <button @click="toggleStatus(id, status)"
                                    style="font-size: 30px; border: none; outline: none; background: none;">
                                    <i :class="status === 'Active' ? 'fa fa-toggle-on actv' : 'fa fa-toggle-off deact'"></i>
                                </button>
                            </template>
                            <template #item-action="{ id }">
                                <div class="d-flex justify-content-center align-items-center">
                                    <Link :href="route('show.add.edit.service', {id:id})"
                                        class="edit-btn">
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

<style scoped>.table-responsive ::-webkit-scrollbar {
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
    background: #0bceaf ;
}

.edit-btn{
    padding: 1.5px 6px;
    margin-right: 10px;
    border: 1px solid #0bceaf;
    color: #0bceaf;
    border-radius: 2px;
    font-size: 15px;
}

.edit-btn:hover{
    color: #fff;
    background: #0bceaf;
}

.dlt-btn{
    padding: 1.5px 6px;
    margin-right: 10px;
    border: 1px solid red;
    color: red;
    border-radius: 2px;
    font-size: 15px;
}

.dlt-btn:hover{
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
