<script setup>
import { reactive, watch } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Shared/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import moment from "moment";

const props = defineProps({
  enrollments: {
    type: Object,
    required: true,
  },
});

function destroy(enrollment) {
  if (confirm("Are you sure you want to delete this enrollment?")) {
    Inertia.delete(route("admin.enrollments.destroy", enrollment));
  }
}
</script>

<template>
	<Head title="Enrollments" />

	<BreezeAuthenticatedLayout>
		<template #header>Enrollments</template>

		<template #actions>
			<Link :href="route('admin.enrollments.create')" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">Add Enrollment</Link>
		</template>
		<div class="py-12">
			<div class="px-4 sm:px-6 lg:px-8">
				<div class="mt-8 flex flex-col">
					<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
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
												<th class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6" scope="col">Student</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Module</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Enrolled At</th>
												<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Actions</th>
												<th class="relative py-3 pl-3 pr-4 sm:pr-6" scope="col">
													<span class="sr-only">Edit</span>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr :key="enrollment.id" class="focus:outline-none h-16 border border-gray-100 rounded" tabindex="0" v-for="enrollment in props.enrollments.data">
												<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ enrollment.student.full_name }}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ enrollment.module.name }}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ moment(enrollment.enrolled_at).format("YYYY-MM-DD HH:mm") }}</td>

												<td class="pl-4 space-x-8">
													<button @click.prevent="destroy(enrollment)" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-red-600 py-3 px-5 bg-red-100 rounded hover:bg-red-200 focus:outline-none">Remove</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<pagination :links="props.enrollments.links" class="mt-6" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
