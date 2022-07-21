<script setup>
import { onMounted, reactive, watch } from "vue";
import StudentLayout from "@/Layouts/Student.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Loader from "@/Shared/Loader.vue";
import DateInput from "@/Shared/DateInput.vue";

import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

const props = defineProps({
  modules: {
    type: Object,
  },
  errors: {
    type: Object,
  },
});

const state = reactive({
  sending: false,
  form: useForm(
    {
      module_id: null,
      reason: null,
      class_date: null,
      medical_file_url: null,
    },
    { resetOnSuccess: false }
  ),
});

function serverConfig() {
  return {
    url: `/filepond/api`,
    timeout: 1200000,
    process: "/process",
    revert: "/process",
    patch: "?patch=",
    headers: {
      "X-CSRF-TOKEN": usePage().props.value.csrf_token,
    },
  };
}

function onSubmit() {
  let config = {
    headers: {
      Accept: "application/json",
    },
    onStart: () => (state.sending = true),
    onFinish: () => (state.sending = false),
    preserveScroll: true,
  };

  state.form.post(route("student.medicalCertificate.store"), config);
}
</script>
<template>
	<Head title="Medical Certificate" />

	<StudentLayout>
		<template #header>
			<h2 class="font-semibold text-xl leading-tight">Medical Certificate</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 shadow-sm sm:rounded-lg">
					<form @submit.prevent="onSubmit" class="space-y-4">
						<div>
							<label class="block text-sm font-medium text-gray-700" for="module">Select Module</label>
							<select class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2" placeholder="Select Module" v-model="state.form.module_id">
								<option :key="module.id" :value="module.id" v-for="module in props.modules">{{ module.name }}</option>
							</select>
							<p class="mt-2 text-sm text-red-600" v-if="props.errors.module_id">{{ props.errors.module_id[0] }}</p>
						</div>

						<div>
							<label class="block text-sm font-medium text-gray-700" for="reason">Reason</label>
							<textarea class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2" placeholder="Reason" type="text" v-model="state.form.reaason" />
							<p class="mt-2 text-sm text-red-600" v-if="props.errors.reason">{{ props.errors.reason[0] }}</p>
						</div>

						<div>
							<label class="block text-sm font-medium text-gray-700 mb-2" for="dob">Class Date</label>
							<date-input placeholder="Class Date" v-model="state.form.class_date"></date-input>
							<p class="mt-2 text-sm text-red-600" v-if="props.errors.class_date">{{ props.errors.class_date[0] }}</p>
						</div>

						<div>
							<label class="block text-sm font-medium text-gray-700 mb-2" for="file">Mc File</label>
							<file-pond :server="serverConfig()" accepted-file-types="application/pdf" label-idle="Drop files here Or Upload" v-bind:allow-multiple="false" v-bind:files="state.form.medical_file_url" />
                            <p class="mt-2 text-sm text-red-600" v-if="props.errors.medical_file_url">{{ props.errors.medical_file_url[0] }}</p>
						</div>

						<div class="mt-4">
							<button class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto" type="submit">
								<span class="font-medium mr-3">Submit</span>

								<Loader v-if="state.sending" />
								<svg class="w-5 h-5" fill="none" stroke="currentColor" v-else viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
								</svg>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</StudentLayout>
</template>
