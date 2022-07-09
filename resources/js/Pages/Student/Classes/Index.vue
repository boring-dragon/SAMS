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
						<div>
							<span class="text-sm text-gray-500">Next class at: {{ moment(module.at).format("MMM DD | HH:mm") }}</span>
							<p class="mt-3 text-lg font-medium leading-6">
								<a class="text-xl text-gray-700 group-hover:text-gray-500 lg:text-2xl">Name: {{ module.name }}</a>
							</p>
							<p class="mt-2 text-sm text-gray-500">Module Code: {{ module.module_code }}</p>
							<p class="mt-2 text-sm text-gray-500">Class Duration: {{ module.duration }} hr</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</StudentLayout>
</template>
