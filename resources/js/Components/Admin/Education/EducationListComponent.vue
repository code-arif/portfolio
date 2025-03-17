<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const Header = [
    { text: "No", value: "no" },
    { text: "Degree", value: "degree_name" },
    { text: "Institute", value: "institute_name" },
    { text: "Start Date", value: "start_date" },
    { text: "End Date", value: "end_date" },
    { text: "GPA", value: "gpa" },
    { text: "CGPA", value: "cgpa" },
    { text: "Action", value: "action", width: 20 },
];

// Transform data for table
const Item = computed(() => {
    return page.props.education?.map((degree, index) => ({
        no: index + 1,
        degree_name: degree.degree_name,
        institute_name: degree.institute_name,
        start_date: degree.start_date,
        end_date: degree.end_date ?? "N/A",
        gpa : degree.gpa ?? "N/A",
        cgpa: degree.cgpa ?? "N/A",
        id: degree.id,
    }));
});

</script>

<template>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- profile form card -->
            <div class="col-sm-12 col-xl-12 mb-1 col-md-6">
                <div class="rounded h-100 p-3" style="background: #191C24;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <h5 class="text-light">Degree</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.add.edit.degree')" class="btn btn-sm btn-outline-info">Add
                            Degree</Link>
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
                            <template #item-action="{ id }">
                                <div class="d-flex justify-content-center align-items-center">
                                    <Link :href="route('show.add.edit.degree', { id: id })" class="edit-btn">
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
