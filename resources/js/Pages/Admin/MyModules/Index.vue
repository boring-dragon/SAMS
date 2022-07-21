<script setup>
import { reactive } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Loader from "@/Shared/Loader.vue";
import moment from "moment";

const props = defineProps({
  modules: Object,
});
</script>

<template>
	<Head title="Attendance" />

	<BreezeAuthenticatedLayout>
		<template #header>List of Modules Assigned to "{{ $page.props.auth.user.name }}"</template>

		<div class="py-12">
			<div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
				<div class="sm:flex items-center justify-between">
					<div class="flex items-center">
						<a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800" href=" javascript:void(0)">
							<div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
								<p>All</p>
							</div>
						</a>
					</div>
				</div>
				<div class="mt-7">
					<table class="w-full whitespace-nowrap">
						<thead class="bg-gray-50">
							<tr>
								<th class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6" scope="col">Module Name</th>
								<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Module Code</th>
								<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Type</th>
								<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Created At</th>
							</tr>
						</thead>
						<tbody>
							<tr class="text-xl text-gray-600" v-if="modules.length === 0">No modules Found.</tr>
							<tr :key="module.id" class="focus:outline-none h-16 border border-gray-100 rounded" tabindex="0" v-for="module in props.modules">
								<td>
									<div class="flex items-center pl-5">
										<p class="text-base font-medium leading-none text-gray-700 mr-2 normal-case">{{ module.name }}</p>
									</div>
								</td>

								<td class="pl-5">
									<div class="flex items-center">
										<svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path d="M7.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M16.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M7.25 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M16.75 19.25H17.25C18.3546 19.25 19.25 18.3546 19.25 17.25V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M7.75 9V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M12 9V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M16.25 9V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
										</svg>

										<p class="text-sm leading-none text-gray-600 ml-2">{{ module.module_code }}</p>
									</div>
								</td>

								<td class="pl-5">
									<button class="py-2 px-2 text-sm focus:outline-none leading-none text-indigo-700 bg-indigo-100 rounded">{{ module.type }}</button>
								</td>

								<td class="pl-5">
									<div class="flex items-center">
										<svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24">
											<circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5" />
											<path d="M12 8V12L14 14" stroke="currentColor" stroke-width="1.5" />
										</svg>

										<p class="text-sm leading-none text-gray-600 ml-2">{{ moment(module.created_at).format("YYYY-MM-DD HH:mm") }}</p>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
