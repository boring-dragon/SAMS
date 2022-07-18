<script setup>
import StudentLayout from "@/Layouts/Student.vue";
import { Head } from "@inertiajs/inertia-vue3";

const props = defineProps({
  modules: {
    type: Object,
  },
});
</script>

<template>
	<Head title="Modules" />

	<StudentLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">My Modules</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<section>
					<div class="relative">
						<div class="relative flex justify-start">
							<span class="pr-3 text-lg font-medium text-neutral-600">All Enrolled Modules</span>
						</div>
					</div>
					<div class="space-y-8 lg:divide-y lg:divide-gray-100">
                        <p class="text-md p-2 text-gray-600" v-if="props.modules.length === 0"> No modules yet..</p>
						<div :key="module.id" class="bg-white group lg:items-end mt-8 p-6 rounded sm:flex" v-for="module in props.modules">
							<div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
								<img alt="text" class="w-full rounded-md h-32 lg:w-32 object-cover" src="/images/neon-1.jpeg" />
							</div>
							<div>
								<span class="text-sm text-gray-500">Entrolled at: {{ module.pivot.enrolled_at }}</span>
								<p class="mt-3 text-lg font-medium leading-6">
									<a class="text-xl text-gray-800 group-hover:text-gray-500 lg:text-2xl">{{ module.name }}</a>
								</p>
								<p class="mt-2 text-lg text-gray-500">{{ module.description }}</p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</StudentLayout>
</template>
