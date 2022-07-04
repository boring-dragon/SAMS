<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import StudentForm from "./Form.vue";

const props = defineProps({
  errors: Object,
  student: Object
});
</script>

<template>
	<Head title="Student Create" />

	<BreezeAuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Create Student</h2>
		</template>

		<Link :href="route('admin.students.index')" class="text-sm text-gray-600">&#8592; Go back to Students</Link>

		<StudentForm :student="student" :errors="props.errors" />
	</BreezeAuthenticatedLayout>
</template>
