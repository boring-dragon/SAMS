<script setup>
import { reactive, watch } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Shared/Pagination.vue";
import Search from "@/Shared/Search.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import moment from "moment";

const props = defineProps({
  enrollments: {
    type: Object,
    required: true,
  },
  filters: Object,
});

const state = reactive({
  form: {
    // search: props.filters.search,
  },
});

// function destroy(enrollment) {
//   if (confirm("Are you sure you want to delete this enrollment?")) {
//     Inertia.delete(route("admin.enrollments.destroy", enrollment.id));
//   }
// }

watch(
  state.form,
  _.debounce(() => {
    Inertia.get(route("admin.enrollments.index"), _.pickBy(state.form), {
      preserveState: true,
    });
  }, 300)
);
</script>

<template>

	<Head title="Enrollments" />

	<BreezeAuthenticatedLayout>
		<div class="py-12">
			<div class="px-4 sm:px-6 lg:px-8">
				<div class="sm:flex sm:items-center">
					<div class="sm:flex-auto">
						<h1 class="text-4xl font-semibold text-gray-900">Enrollments</h1>
						<p class="mt-2 text-sm text-gray-700">A list of all the enrollments.</p>
					</div>

					<div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
						<Link :href="route('admin.enrollments.create')"
							class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto">
						Add Enrollment</Link>
					</div>
				</div>
				<div class="my-4">
					<search />
				</div>
				<div class="mt-8 flex flex-col">
					<div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
								<table class="min-w-full divide-y divide-gray-300">
									<div v-show="">
										<div class="flex items-center justify-start ml-2 my-2">
											<p class="ml-3 text-sm leading-7 text-gray-500">No Students found..</p>
										</div>
									</div>
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
											<th class="relative py-3 pl-3 pr-4 sm:pr-6" scope="col">
												<span class="sr-only">Edit</span>
											</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
