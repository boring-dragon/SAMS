<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ModuleForm from "./Form.vue";

const props = defineProps({
  errors: Object,
  teachers: Object,
});
</script>

<template>
	<Head title="Module Create" />

	<BreezeAuthenticatedLayout>
		<template #header>
			Create Module
		</template>

		<Link :href="route('admin.modules.index')" class="text-sm text-gray-600">&#8592; Go back to Modules</Link>

		<ModuleForm :errors="props.errors" :teachers="props.teachers" />
	</BreezeAuthenticatedLayout>
</template>
