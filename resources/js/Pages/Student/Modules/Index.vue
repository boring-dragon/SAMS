<script setup>
import StudentLayout from '@/Layouts/Student.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Modules" />

    <StudentLayout>
         <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modules
            </h2>
        </template>


    </StudentLayout>
</template>
