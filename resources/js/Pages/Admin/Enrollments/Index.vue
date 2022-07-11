<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
	<Head title="Enrollments" />

	<BreezeAuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-4xl text-gray-800 leading-tight">Enrollments</h2>
		</template>

		<div class="py-12">
			<div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">
				<form @submit.prevent="onSubmit" class="space-y-4">
					<div>
						<label class="sr-only" for="user">Select User</label>
						<select class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-green-500 focus:ring-green-500" placeholder="Select User">
							<option value="jinas">Jinas</option>
						</select>


					</div>

					<div>
						<label class="sr-only" for="select_module">Select Module</label>
						<select class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-green-500 focus:ring-green-500" placeholder="Select Module">
							<option value="web-dev">Web development</option>
						</select>
					</div>

					<div class="mt-4">
						<button class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto" type="submit">
						   <span class="font-medium mr-3">Enroll</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>
