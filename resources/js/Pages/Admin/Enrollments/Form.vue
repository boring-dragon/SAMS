<script setup>
import { reactive } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Loader from "@/Shared/Loader.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  enrollment: Object,
  errors: Object,
  students: Object,
  modules: Object,
});

const state = reactive({
  sending: false,
  form: useForm(
    {
      module_id: null,
      student_id: null,
    },
    { resetOnSuccess: false }
  ),
});

function onSubmit() {
  let config = {
    headers: {
      Accept: "application/json",
    },
    onStart: () => (state.sending = true),
    onFinish: () => (state.sending = false),
    preserveScroll: true,
  };

  state.form.post(route("admin.enrollments.store"), config);
}
</script>

<template>
	<div class="py-12">
		<div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">
			<form @submit.prevent="onSubmit" class="space-y-4">
				<div>
					<label class="block text-sm font-medium text-gray-700" for="student">Select Student</label>
					<select class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-green-500 focus:ring-green-500 mt-2" placeholder="Select User" v-model="state.form.student_id">
						<option :key="student.id" :value="student.id" v-for="student in props.students">{{ student.full_name }}</option>
					</select>
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700" for="module">Select Module</label>
					<select class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-green-500 focus:ring-green-500 mt-2" placeholder="Select Module" v-model="state.form.module_id">
						<option :key="module.id" :value="module.id" v-for="module in props.modules">{{ module.name }}</option>
					</select>
				</div>

				<div class="mt-4">
					<button class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto" type="submit">
						<span class="font-medium mr-3">Enroll</span>

						<Loader v-if="state.sending" />
						<svg class="w-5 h-5" fill="none" stroke="currentColor" v-else viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						</svg>
					</button>
				</div>
			</form>
		</div>
	</div>
</template>
