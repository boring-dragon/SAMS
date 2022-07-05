<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

const props = defineProps({
  total_students: {
    type: Number,
    default: 0,
  },
  total_teachers: {
    type: Number,
    default: 0,
  },
  total_modules: {
    type: Number,
    default: 0,
  },
  modules_today: {
    type: Number,
    default: 0,
  },
  students_today: {
    type: Number,
    default: 0,
  },
});
</script>

<template>
	<Head title="Dashboard" />

	<BreezeAuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-4xl text-gray-800 leading-tight">Dashboard</h2>
		</template>

		<div class="py-12">
			<div class="items-center flex flex-wrap">
				<div class="px-3 mb-6 w-full md:w-1/2">
					<div class="bg-white shadow rounded-lg h-150">
						<div class="px-6 py-4">
							<div class="flex justify-between items-center mb-2">
								<h3 class="mr-3 text-base text-gray-700 font-bold">Total Modules</h3>
							</div>
							<p class="flex items-center text-4xl mb-4">{{ props.total_modules }}</p>
							<p class="flex items-center text-sm mb-4 text-green-600" v-if="props.modules_today > 0">{{ props.modules_today }} new modules today!</p>
						</div>
					</div>
				</div>

				<div class="px-3 mb-6 w-full md:w-1/2">
					<div class="bg-white shadow rounded-lg h-150">
						<div class="px-6 py-4">
							<div class="flex justify-between items-center mb-2">
								<h3 class="mr-3 text-base text-gray-700 font-bold">Total Students</h3>
							</div>
							<p class="flex items-center text-4xl mb-4">{{ props.total_students }}</p>
                            <p class="flex items-center text-sm mb-4 text-green-600" v-if="props.students_today > 0">{{ props.students_today }} new students registered today!</p>
						</div>
					</div>
				</div>

				<div class="px-3 mb-6 w-full md:w-1/2">
					<div class="bg-white shadow rounded-lg h-150">
						<div class="px-6 py-4">
							<div class="flex justify-between items-center mb-2">
								<h3 class="mr-3 text-base text-gray-700 font-bold">Total Teachers</h3>
							</div>
							<p class="flex items-center text-4xl mb-4">{{ props.total_teachers }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
