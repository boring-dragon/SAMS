<script setup>
import { reactive, watch } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Shared/Pagination.vue";
import Search from "@/Shared/Search.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

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
		<div class="py-12">
			<div class="px-4 sm:px-6 lg:px-8">
				<div class="sm:flex sm:items-center">
					<div class="sm:flex-auto">
						<h1 class="text-xl font-semibold text-gray-900">Modules</h1>
						<p class="mt-2 text-sm text-gray-700">A list of all the modules.</p>
					</div>

					<div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
						<Link :href="route('admin.modules.create')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto">Add Module</Link>
					</div>
				</div>
				<div class="my-4">
					<search v-model="state.form.search" />
				</div>
				<div class="mt-8 flex flex-col">
					<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
								<table class="min-w-full divide-y divide-gray-300">
									<thead class="bg-gray-50">
										<tr>
											<th class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6" scope="col">Name</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Module Code</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Type</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Created</th>
											<th class="relative py-3 pl-3 pr-4 sm:pr-6" scope="col">
												<span class="sr-only">Edit</span>
											</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
										<tr :key="module.id" v-for="module in props.modules.data">
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ module.name }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ module.module_code }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ module.type }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ module.created_at }}</td>
											<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
												<a class="text-green-600 hover:text-green-900" href="#">Edit</a>

												<button @click.prevent="destroy(module)" class="text-red-600 hover:text-red-900 ml-4">Remove</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<pagination :links="modules.links" class="mt-6" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>