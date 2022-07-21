<script setup>
import StudentLayout from "@/Layouts/Student.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { reactive, watch } from "vue";
import Search from "@/Shared/Search.vue";

const props = defineProps({
  attendances: {
    type: Object,
  },
});
</script>

<template>
	<Head title="Attendance" />

	<StudentLayout>
		<template #header>
			<h2 class="font-semibold text-xl leading-tight">Attendance</h2>
		</template>

		<div class="container mx-auto px-4 sm:px-6 lg:px-8">
			<div class="mt-8 flex flex-col">
				<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
						<div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 rounded-md">
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
											<th class="py-3 pl-4 pr-3 text-center text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6" scope="col">Attendance ID</th>
											<th class="px-3 py-3 text-center text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Module Name</th>
											<th class="px-3 py-3 text-center text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Attendance Taken At</th>
										</tr>
									</thead>
									<tbody>
										<tr :key="attendance.id" class="focus:outline-none h-16 border border-gray-100 rounded" tabindex="0" v-for="attendance in props.attendances">
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-600 sm:pl-6"># {{ attendance.id }}</td>
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-600 sm:pl-6">{{ attendance.module.name }}</td>
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-600 sm:pl-6">{{ attendance.attendance_taken_at }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</StudentLayout>
</template>
