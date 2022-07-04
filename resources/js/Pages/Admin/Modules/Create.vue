<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import ModuleForm from './Form.vue';

const props = defineProps({
    errors: Object
});
</script>

<template>
    <Head title="Module Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Module
            </h2>
        </template>

      <ModuleForm :errors="props.errors" />
    </BreezeAuthenticatedLayout>
</template>
