<script setup>
import StudentLayout from "@/Layouts/Student.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import moment from "moment";

const props = defineProps({
  classes: {
    type: Object,
  },
});
</script>

<template>
	<Head title="Classes" />

	<StudentLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Classes</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<ul class="flex text-center border-b border-gray-200">
					<li class="flex-1">
						<Link :class=" route().current('student.classes.index', { filter: 'occuring'}) ? 'bg-white': 'bg-gray-100 hover:bg-white'" :href="route('student.classes.index', { filter: 'occuring'})" class="block p-4 text-sm font-medium text-gray-500">
							<span class="absolute inset-x-0 w-full h-px bg-white -bottom-px"></span>
							Occuring classes
						</Link>
					</li>

					<li class="flex-1 pl-px">
						<Link :class=" route().current('student.classes.index', { filter: 'upcoming'}) ? 'bg-white': 'bg-gray-100 hover:bg-white'" :href="route('student.classes.index', { filter: 'upcoming'})" class="block p-4 text-sm font-medium text-gray-500">Upcoming</Link>
					</li>
				</ul>

				<div class="space-y-8 lg:divide-y lg:divide-gray-100">
					<div v-if="props.classes <= 0">
						<p class="p-4 text-gray-500 text-xl">No classes found...</p>
					</div>
					<div :key="module.id" class="pt-8 sm:flex lg:items-end group" v-for="module in props.classes">
						<div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
							<img alt="text" class="w-full rounded-md h-32 lg:w-32 object-cover" src="/images/neon-1.jpeg" />
						</div>
                        <div class="flex items-center">
                        <div>
							<span class="text-sm text-gray-500">Next class at: {{ moment(module.at).format("MMM DD | HH:mm") }}</span>
							<p class="mt-3 text-lg font-medium leading-6">
								<a class="text-xl text-gray-700 group-hover:text-gray-500 lg:text-2xl">Name: {{ module.name }}</a>
							</p>
							<p class="mt-2 text-sm text-gray-500">Module Code: {{ module.module_code }}</p>
							<p class="mt-2 text-sm text-gray-500">Class Duration: {{ module.duration }} hr</p>
						</div>
						<div>
							<Link :href="route('student.attendance.take')" v-if="module.attendance_code && module.attendance_generated_at" class="flex items-center justify-between px-5 py-3 text-indigo-600 transition-colors border border-current rounded-lg hover:bg-indigo-600 group active:bg-indigo-500 focus:outline-none focus:ring">
								<span class="font-medium transition-colors group-hover:text-white">Take Attendance</span>

								<span class="flex-shrink-0 p-2 ml-4 bg-white border border-indigo-600 rounded-full group-active:border-indigo-500">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
									</svg>
								</span>
							</Link>
						</div>
                        </div>

					</div>
				</div>
			</div>
		</div>
	</StudentLayout>
</template>
