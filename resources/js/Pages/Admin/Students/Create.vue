<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import StudentForm from "./Form.vue";

const props = defineProps({
  errors: Object,
});
</script>

<template>
	<Head title="Student Create" />

	<BreezeAuthenticatedLayout>
		<template #header>
		Create Student
		</template>

		<Link :href="route('admin.students.index')" class="text-sm text-gray-600">&#8592; Go back to Students</Link>

		<StudentForm :errors="props.errors" />
	</BreezeAuthenticatedLayout>
</template>
