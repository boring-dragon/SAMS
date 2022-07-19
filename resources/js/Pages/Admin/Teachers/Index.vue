<script setup>
import { reactive, watch } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Shared/Pagination.vue";
import Search from "@/Shared/Search.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import moment from "moment";

const props = defineProps({
	teachers: {
		type: Object,
		required: true,
	},
	filters: Object,
});

const state = reactive({
	form: {
		search: props.filters.search,
	},
});

function destroy(teacher) {
	if (confirm("Are you sure you want to delete this teacher?")) {
		Inertia.delete(route("admin.teachers.destroy", teacher.id));
	}
}

watch(
	state.form,
	_.debounce(() => {
		Inertia.get(route("admin.teachers.index"), _.pickBy(state.form), {
			preserveState: true,
		});
	}, 300)
);
</script>

<template>

	<Head title="Teachers" />

	<BreezeAuthenticatedLayout>
		<template #header>Teachers</template>

		<template #actions>
			<Link :href="route('admin.teachers.create')"
				class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">
			Add Teacher</Link>
		</template>
		<div class="py-12">
			<div class="px-4 sm:px-6 lg:px-8">
				<div class="my-4">
					<search v-model="state.form.search" />
				</div>
				<div class="mt-8 flex flex-col">
					<div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

							<div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
								<div class="sm:flex items-center justify-between">
									<div class="flex items-center">
										<a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800"
											href=" javascript:void(0)">
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
												<th class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6"
													scope="col">Name</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500"
													scope="col">Email</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500"
													scope="col">Phone</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500"
													scope="col">Date Of Birth</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500"
													scope="col">Created At</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500"
													scope="col">Actions</th>

												<th class="relative py-3 pl-3 pr-4 sm:pr-6" scope="col">
													<span class="sr-only">Edit</span>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr :key="module.id"
												class="focus:outline-none h-16 border border-gray-100 rounded"
												tabindex="0" v-for="module in props.teachers.data">
												<td>
													<div class="flex items-center pl-5">
														<p
															class="text-base font-medium leading-none text-gray-700 mr-2 normal-case">
															{{ module.full_name }}</p>

													</div>
												</td>

												<td class="pl-5">
													<p class="text-sm leading-none text-gray-600 ml-2">{{
															module.email
													}}</p>
												</td>

												<td class="pl-5">
													<p class="text-sm leading-none text-gray-600 ml-2">{{
															module.phone_number
													}}</p>
												</td>

												<td class="pl-5">
													<p class="text-sm leading-none text-gray-600 ml-2">{{
															moment(module.dob).format("YYYY-MM-DD")
													}}</p>
												</td>

												<td class="pl-5">
													<div class="flex items-center">
														<svg class="w-6 h-6 text-gray-600" fill="none"
															viewBox="0 0 24 24">
															<circle cx="12" cy="12" r="7.25" stroke="currentColor"
																stroke-width="1.5" />
															<path d="M12 8V12L14 14" stroke="currentColor"
																stroke-width="1.5" />
														</svg>

														<p class="text-sm leading-none text-gray-600 ml-2">{{
																moment(module.created_at).format("YYYY-MM-DD HH:mm")
														}}</p>
													</div>
												</td>
												<td class="pl-4 space-x-8">
													<Link :href="route('admin.teachers.edit', module)"
														class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
													Edit</Link>
													<button @click.prevent="destroy(module)"
														class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-red-600 py-3 px-5 bg-red-100 rounded hover:bg-red-200 focus:outline-none">Remove</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<pagination :links="props.teachers.links" class="mt-6" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
