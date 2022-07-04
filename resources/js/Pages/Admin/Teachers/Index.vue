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
		<div class="py-12">
			<div class="px-4 sm:px-6 lg:px-8">
				<div class="sm:flex sm:items-center">
					<div class="sm:flex-auto">
						<h1 class="text-xl font-semibold text-gray-900">Teachers</h1>
						<p class="mt-2 text-sm text-gray-700">A list of all the teachers.</p>
					</div>

					<div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
						<Link :href="route('admin.teachers.create')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto">Add Teacher</Link>
					</div>
				</div>
				<div class="my-4">
					<search v-model="state.form.search" />
				</div>
				<div class="mt-8 flex flex-col">
					<div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
								<table class="min-w-full divide-y divide-gray-300">
									<div v-show="props.teachers.total == 0">
										<div class="flex items-center justify-start ml-2 my-2">
											<p class="ml-3 text-sm leading-7 text-gray-500">No Teachers found..</p>
										</div>
									</div>
									<thead class="bg-gray-50">
										<tr>
											<th class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6" scope="col">Name</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Email</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Phone</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Date Of Birth</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Created At</th>
											<th class="relative py-3 pl-3 pr-4 sm:pr-6" scope="col">
												<span class="sr-only">Edit</span>
											</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
										<tr :key="teacher.id" v-for="teacher in props.teachers.data">
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ teacher.full_name }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ teacher.email }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ teacher.phone_number }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ moment(teacher.dob).format("YYYY-MM-DD") }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ moment(teacher.created_at).format("YYYY-MM-DD HH:mm") }}</td>
											<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
												<Link :href="route('admin.teachers.edit', teacher)" class="text-green-600 hover:text-green-900">Edit</Link>

												<button @click.prevent="destroy(teacher)" class="text-red-600 hover:text-red-900 ml-4">Remove</button>
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
	</BreezeAuthenticatedLayout>
</template>
