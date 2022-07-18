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
		Create Teacher
		</template>

		<Link :href="route('admin.teachers.index')" class="text-sm text-gray-600">&#8592; Go back to Teachers</Link>

		<TeacherForm :errors="props.errors" />
	</BreezeAuthenticatedLayout>
</template>
