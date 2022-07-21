<script setup>
import { reactive } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Loader from "@/Shared/Loader.vue";
import DialogModal from "@/Shared/DialogModal.vue";

const props = defineProps({
  modules: Object,
  errors: Object,
  generated_attendances: Object,
});

const state = reactive({
  sending: false,
  showQrCode: false,
  currentQrCodeShowing: null,
  form: useForm(
    {
      module_id: null,
    },
    { resetOnSuccess: false }
  ),
});

function generate() {
  state.form.post(route("admin.attendances.generate"), {
    onStart: () => (state.sending = true),
    onFinish: () => (state.sending = false),
    preserveScroll: true,
  });
}

function stop(module) {
  state.form.module_id = module.id;
  state.form.post(route("admin.attendances.stop"), {
    onStart: () => (state.sending = true),
    onFinish: () => (state.sending = false),
    preserveScroll: true,
  });
}

function showQrCode(QrCode) {
  state.showQrCode = true;
  state.currentQrCodeShowing = QrCode;
}

function hideQrCode() {
  state.showQrCode = false;
  state.currentQrCodeShowing = null;
}
</script>

<template>
	<Head title="Attendance" />

	<BreezeAuthenticatedLayout>
		<template #header>Attendance</template>

		<div class="py-12">
			<h3 class="text-3xl text-center font-bold text-gray-700">Generate Attendance Code</h3>

			<div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3 mt-8">
				<form @submit.prevent="generate" class="space-y-4">
					<div>
						<label class="block text-sm font-medium text-gray-700" for="module">Select Module</label>
						<select class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2" placeholder="Select Module" v-model="state.form.module_id">
							<option :key="module.id" :value="module.id" v-for="module in props.modules">{{ module.name }}</option>
						</select>
					</div>

					<div class="mt-4">
						<button class="inline-flex items-center justify-center w-full px-4 py-2 text-white bg-black rounded-lg sm:w-auto" type="submit">
							<span class="font-medium mr-3">Generate Attendance</span>
							<Loader v-if="state.sending" />
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
							</svg>
						</button>
					</div>
				</form>
			</div>

			<div>
				<div class="flex flex-col bg-white shadow-xl rounded-lg mt-8" v-if="props.generated_attendances.length > 0">
					<div class="-m-1.5 overflow-x-auto">
						<div class="p-1.5 min-w-full inline-block align-middle">
							<div class="overflow-hidden">
								<table class="min-w-full divide-y divide-gray-200">
									<thead>
										<tr>
											<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" scope="col">Module</th>
											<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" scope="col">Attendance Code</th>
											<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" scope="col">Generated At</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200">
										<tr :key="module.id" v-for="module in props.generated_attendances">
											<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ module.name }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ module.attendance_code }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ module.attendance_generated_at }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-5 flex items-center">
												<button @click="stop(module)" class="inline-flex px-6 py-3 text-sm font-medium text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white active:bg-indigo-500 focus:outline-none focus:ring">Stop Attendance</button>

												<button @click="showQrCode(module.qr_code)" class="inline-flex items-center px-6 py-3 text-sm font-medium text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white active:bg-indigo-500 focus:outline-none focus:ring">
													<svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
														<path d="M7.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
														<path d="M16.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
														<path d="M7.25 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
														<path d="M16.75 19.25H17.25C18.3546 19.25 19.25 18.3546 19.25 17.25V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
														<path d="M7.75 9V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
														<path d="M12 9V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
														<path d="M16.25 9V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
													</svg>

													<span>Show QR Code</span>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<DialogModal :show="state.showQrCode" @close="hideQrCode()">
				<template #title>
					<h2 class="text-md font-semibold text-gray-600 text-center">Qr code</h2>
				</template>

				<template #content>
					<div class="flex flex-col items-center justify-center">
						<img :src="state.currentQrCodeShowing" />
					</div>

					<p class="text-center text-md text-gray-500">Please scan the QR code above to copy the attendance code</p>
				</template>
			</DialogModal>
		</div>
	</BreezeAuthenticatedLayout>
</template>
