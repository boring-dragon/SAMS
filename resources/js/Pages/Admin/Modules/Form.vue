<script setup>
import { reactive, onMounted } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Loader from "@/Shared/Loader.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  module: Object,
  errors: Object,
});

const state = reactive({
  sending: false,
  form: useForm(
    {
      name: null,
      module_code: null,
      description: null,
      type: null,
    },
    { resetOnSuccess: false }
  ),
});

function onSubmit() {
  let config = {
    headers: {
      Accept: "application/json",
    },
    onStart: () => (state.sending = true),
    onFinish: () => (state.sending = false),
    preserveScroll: true,
  };

  if (props.module && props.module.id) {
    state.form.put(route("admin.modules.update", props.module), config);
  } else {
    state.form.post(route("admin.modules.store"), config);
  }
}

onMounted(() => {
  if (props.module) {
    _.assign(state.form, props.module);
  }
});
</script>

<template>
	<div class="py-12">
		<div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">
			<form @submit.prevent="onSubmit" class="space-y-4">
				<div>
					<label class="sr-only" for="name">Name</label>
					<input class="w-full p-3 text-sm border-gray-200 rounded-lg" id="name" placeholder="Name" type="text" v-model="state.form.name" />
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.name">{{ props.errors.name }}</p>
				</div>

				<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
					<div>
						<label class="sr-only" for="module_code">Module Code</label>
						<input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Module Code" type="text" v-model="state.form.module_code" />
						<p class="mt-2 text-sm text-red-600" v-if="props.errors.module_code">{{ props.errors.module_code }}</p>
					</div>

					<div>
						<label class="sr-only" for="type">Type</label>
						<input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Type" type="text" v-model="state.form.type" />
						<p class="mt-2 text-sm text-red-600" v-if="props.errors.type">{{ props.errors.type }}</p>
					</div>
				</div>

				<div>
					<label class="sr-only" for="description">Description</label>
					<textarea class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Description" rows="8" v-model="state.form.description"></textarea>
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.description">{{ props.errors.description }}</p>
				</div>

				<div class="mt-4">
					<button class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto" type="submit">
						<span class="font-medium mr-3">Save</span>

						<Loader v-if="state.sending" />
						<svg class="w-5 h-5" fill="none" stroke="currentColor" v-else viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						</svg>
					</button>
				</div>
			</form>
		</div>
	</div>
</template>
