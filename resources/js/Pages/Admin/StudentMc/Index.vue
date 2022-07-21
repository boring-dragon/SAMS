<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import moment from "moment";
import Pagination from "@/Shared/Pagination.vue";

const props = defineProps({
  student_mcs: Object,
});
</script>
<template>
	<BreezeAuthenticatedLayout>
		<template #header>MC Submitted by students</template>

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
								<th class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6" scope="col">Student Name</th>
								<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Module Name</th>
								<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Reason</th>
								<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Class Date</th>
								<th class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500" scope="col">Issued At</th>
							</tr>
						</thead>
						<tbody>
							<tr class="text-xl text-gray-600" v-if="student_mcs.length === 0">No mc Found.</tr>
							<tr :key="mc.id" class="focus:outline-none h-16 border border-gray-100 rounded" tabindex="0" v-for="mc in props.student_mcs.data">
								<td>
									<div class="flex items-center pl-5">
										<p class="text-base font-normal leading-none text-gray-700 mr-2 normal-case">{{ mc.student.full_name }}</p>
									</div>
								</td>

								<td class="pl-5">
									<div class="flex items-center">
										<p class="text-sm leading-none text-gray-600 ml-2">{{ mc.module.name }}</p>
									</div>
								</td>

								<td>
									<div class="flex items-center pl-5">
										<p class="text-base font-normal leading-none text-gray-700 mr-2 normal-case">{{ mc.reason }}</p>
									</div>
								</td>

								<td>
									<div class="flex items-center pl-5">
										<p class="text-base font-normal leading-none text-gray-700 mr-2 normal-case">{{ mc.class_date }}</p>
									</div>
								</td>

								<td class="pl-5">
									<div class="flex items-center">
										<svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24">
											<circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5" />
											<path d="M12 8V12L14 14" stroke="currentColor" stroke-width="1.5" />
										</svg>

										<p class="text-sm leading-none text-gray-600 ml-2">{{ moment(mc.created_at).format("YYYY-MM-DD HH:mm") }}</p>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<pagination :links="props.student_mcs.links" class="mt-6" />
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
