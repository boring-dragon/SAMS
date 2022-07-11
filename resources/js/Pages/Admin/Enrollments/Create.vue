<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Form from "./Form.vue";

const props = defineProps({
  errors: Object,
  modules: Object,
  students: Object
});
</script>

<template>
	<Head title="Enrollment Create" />

	<BreezeAuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Create Enrollment</h2>
		</template>

		<Link :href="route('admin.enrollments.index')" class="text-sm text-gray-600">&#8592; Go back to Enrollments</Link>

		<Form :students="props.students" :modules="props.modules" :errors="props.errors" />
	</BreezeAuthenticatedLayout>
</template>
