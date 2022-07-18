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
			Dashboard
		</template>

		<div class="py-12">
			<article class="p-2 rounded-2xl">
				<a class="flex flex-col justify-end h-full p-6 bg-white sm:p-8 rounded-xl hover:bg-opacity-90 shadow">
					<div>
						<h5 class="mt-2 text-xl font-bold text-gray-800">Welcome, {{ $page.props.auth.user.name }} 👋</h5>
						<div class="flex items-center justify-between mt-6">
							<p class="text-lg font-medium text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-indigo-600">Account Type: {{ $page.props.auth.user.role }}</p>
						</div>
					</div>
				</a>
			</article>
			<div class="items-center flex flex-wrap mt-8">
				<div class="px-3 mb-6 w-full md:w-1/2">
					<div class="bg-white shadow rounded-lg h-150">
						<div class="px-6 py-4">
							<div class="flex justify-between items-center mb-2">
								<h3 class="mr-3 text-base text-gray-700 font-bold">Total Modules</h3>
							</div>
							<p class="flex items-center text-4xl mb-4">{{ props.total_modules }}</p>
							<div class="inline-flex gap-2 p-1 text-green-600 bg-green-100 rounded" v-if="props.modules_today > 0">
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
								</svg>

								<span class="text-xs font-medium">{{ props.modules_today }} new modules today!</span>
							</div>
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
							<div class="inline-flex gap-2 p-1 text-blue-600 bg-blue-100 rounded" v-if="props.students_today > 0">
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
								</svg>

								<span class="text-xs font-medium">{{ props.students_today }} new students registered today!</span>
							</div>
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
