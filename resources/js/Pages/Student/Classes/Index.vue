<script setup>
import StudentLayout from "@/Layouts/Student.vue";
import { Head } from "@inertiajs/inertia-vue3";
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
						<a class="relative block p-4 text-sm font-medium bg-white border-t border-l border-r border-gray-200" href>
							<span class="absolute inset-x-0 w-full h-px bg-white -bottom-px"></span>
							Occuring classes
						</a>
					</li>

					<li class="flex-1 pl-px">
						<a class="block p-4 text-sm font-medium text-gray-500 bg-gray-100 hover:bg-white" href>Upcoming</a>
					</li>
				</ul>
			</div>
		</div>
	</StudentLayout>
</template>
