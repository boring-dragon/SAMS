<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import TeacherForm from "./Form.vue";

const props = defineProps({
  errors: Object,
  teacher: Object
});
</script>

<template>
	<Head title="Teacher Edit" />

	<BreezeAuthenticatedLayout>
		<template #header>
			Edit Teachers
		</template>

		<Link :href="route('admin.teachers.index')" class="text-sm text-gray-600">&#8592; Go back to Teachers</Link>

		<TeacherForm :teacher="props.teacher" :errors="props.errors" />
	</BreezeAuthenticatedLayout>
</template>
