<script setup>
import { reactive } from 'vue';
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3';
import Loader from "@/Shared/Loader.vue";

const props = defineProps({
  modules: Object,
  errors: Object,
  module: Object,
});

const state = reactive({
  sending: false,
  form: useForm(
    {
      module_id: null
    },
    { resetOnSuccess: false }
  ),
});


function generate()
{
    state.form.post('admin.attendance.generate', {
        onStart: () => (state.sending = true),
        onFinish: () => (state.sending = false),
        preserveScroll: true,
    });
}
</script>

<template>
	<Head title="Attendance" />

	<BreezeAuthenticatedLayout>
		<template #header>Attendance</template>

		<div class="py-12">
			<h3 class="text-3xl text-center font-bold text-gray-700">Generate Attendance Code</h3>

			<div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3 mt-8">
				<form class="space-y-4">
					<div>
						<label class="block text-sm font-medium text-gray-700" for="student">Select Module</label>
						<select class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2" placeholder="Select User">
							<option value="1">Liza McCullough II Linda Marquardt</option>
						</select>
					</div>

					<div class="mt-4">
						<button class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto" type="submit">
							<span class="font-medium mr-3">Generate</span>
                            <Loader v-if="state.sending" />
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
							</svg>
						</button>
					</div>
				</form>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
