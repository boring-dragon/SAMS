<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Shared/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import moment from 'moment';

const props = defineProps({
  enrollments: Object,
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
		<div class="py-12">
			<div class="px-4 sm:px-6 lg:px-8">
				<div class="sm:flex sm:items-center">
					<div class="sm:flex-auto">
						<h1 class="text-xl font-semibold text-gray-900">Enrollments</h1>
						<p class="mt-2 text-sm text-gray-700">A list of all the enrollments.</p>
					</div>

					<div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
						<Link :href="route('admin.enrollments.create')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto">Add Enrollment</Link>
					</div>
				</div>

				<div class="mt-8 flex flex-col">
					<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
								<table class="min-w-full divide-y divide-gray-300">
									<div v-show="props.enrollments.total == 0">
										<div class="flex items-center justify-start ml-2 my-2">
											<p class="ml-3 text-sm leading-7 text-gray-500">No Enrollment found..</p>
										</div>
									</div>
									<thead class="bg-gray-50">
										<tr>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Student</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Module</th>
											<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Enrolled At</th>
											<th class="relative py-3 pl-3 pr-4 sm:pr-6" scope="col">
												<span class="sr-only">Edit</span>
											</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
										<tr :key="enrollment.id" v-for="enrollment in props.enrollments.data">
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ enrollment.student.full_name }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ enrollment.module.name }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ moment(enrollment.enrolled_at).format("YYYY-MM-DD HH:mm") }}</td>
											<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
												<button @click.prevent="destroy(enrollment)" class="text-red-600 hover:text-red-900 ml-4">Remove</button>
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
	</BreezeAuthenticatedLayout>
</template>
