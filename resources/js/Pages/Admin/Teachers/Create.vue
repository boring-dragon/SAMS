<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import TeacherForm from "./Form.vue";

const props = defineProps({
  errors: Object,
});
</script>

<template>
	<Head title="Teacher Create" />

	<BreezeAuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Create Teacher</h2>
		</template>

		<Link :href="route('admin.teachers.index')" class="text-sm text-gray-600">&#8592; Go back to Teachers</Link>

		<TeacherForm :errors="props.errors" />
	</BreezeAuthenticatedLayout>
</template>
