<script setup>
import { reactive, watch } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Shared/Pagination.vue";
import Search from "@/Shared/Search.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import moment from "moment";

const props = defineProps({
  modules: {
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

function destroy(module) {
  if (confirm("Are you sure you want to delete this module?")) {
    Inertia.delete(route("admin.modules.destroy", module.id));
  }
}

watch(
  state.form,
  _.debounce(() => {
    Inertia.get(route("admin.modules.index"), _.pickBy(state.form), {
      preserveState: true,
    });
  }, 300)
);
</script>

<template>
	<Head title="Modules" />

	<BreezeAuthenticatedLayout>
		<template #header>Modules</template>

		<template #actions>
			<Link :href="route('admin.modules.create')" class="text-white focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">Add Module</Link>
		</template>
		<div class="py-12">
			<div class="sm:px-6 w-full">
				<div class="py-4 md:py-7">
					<div>
						<search v-model="state.form.search" />
					</div>
				</div>
				<div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
					<div class="sm:flex items-center justify-between">
						<div class="flex items-center">
							<a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800" href=" javascript:void(0)">
								<div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
									<p>All</p>
								</div>
							</a>
							<a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
								<div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
									<p>Core</p>
								</div>
							</a>
						</div>
					</div>
					<div class="mt-7">
						<table class="w-full whitespace-nowrap">
							<tbody>
								<tr :key="module.id" class="focus:outline-none h-16 border border-gray-100 rounded" tabindex="0" v-for="module in props.modules.data">
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
									<td class="pl-4 space-x-8">
										<Link :href="route('admin.modules.edit', module)" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">Edit</Link>
										<button @click.prevent="destroy(module)" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-red-600 py-3 px-5 bg-red-100 rounded hover:bg-red-200 focus:outline-none">Remove</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<pagination :links="props.modules.links" class="mt-6" />
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
