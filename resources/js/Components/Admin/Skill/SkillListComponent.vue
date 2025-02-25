<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const Header = [
    { text: "No", value: "no" },
    { text: "Certificate", value: "certificate" },
    { text: "Title", value: "title" },
    { text: "Start Date", value: "start_date", width:100 },
    { text: "End Date", value: "end_date", width:100 },
    { text: "Language or Key", value: "language_or_key", width:150 },
    { text: "Category", value: "category" },
    { text: "Batch", value: "batch_no" },
    { text: "Institute", value: "institute", width: 80 },
    { text: "Trainer", value: "trainer", width: 150 },
    { text: "Action", value: "action", width: 20},
];

// Transform data for table
const Item = computed(() => {
    return page.props.skills?.map((skill, index) => ({
        no: index + 1,
        certificate: skill.certificate,
        title: skill.title,
        start_date: skill.start_date,
        end_date: skill.end_date,
        language_or_key: skill.language_or_key,
        category: skill.category,
        batch_no: skill.batch_no,
        institute: skill.institute,
        trainer: skill.trainer,
        id: skill.id,
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
                            <h5 class="text-light">Skills</h5>
                        </div>
                        <div class="col-auto">
                            <Link :href="route('show.add.edit.skill')" class="btn btn-sm btn-outline-info">Add Skill</Link>
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
                            <template #item-certificate="{ certificate }">
                                <img src="https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg"
                                    alt="Course Certificate" style="width: 50px; height: 50px; object-fit: cover;" class="p-1">
                            </template>
                            <template #item-status="{ status, id }">
                                <button @click="toggleStatus(id, status)"
                                    :class="status === 'Active' ? 'btn btn-sm btn-success' : 'btn btn-sm btn-outline-danger'"
                                    class="btn btn-sm">
                                    {{ status }}
                                </button>
                            </template>
                            <template #item-action="{ id }">
                                <div class="d-flex justify-content-center align-items-center">
                                    <Link :href="route('show.add.edit.skill', {id:id})"
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
    padding: 1px 5px;
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
    padding: 1px 5px;
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
</style>
