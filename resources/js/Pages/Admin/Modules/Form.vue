<script setup>
import { reactive, onMounted } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Loader from "@/Shared/Loader.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  module: Object,
  teachers: Object,
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
      teacher_id: null,
      time_slots: {
        sunday: [],
        monday: [],
        tuesday: [],
        wednesday: [],
        thursday: [],
        friday: [],
        saturday: [],
      },
    },
    { resetOnSuccess: false }
  ),
});

function addSlot(day) {
  state.form.time_slots[day].push({ start: "", end: "" });
}

function removeSlot(day, index) {
  state.form.time_slots[day].splice(index, 1);
}

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
					<label class="block text-sm font-medium text-gray-700" for="name">Name</label>
					<input class="mt-2 w-full p-3 text-sm border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-indigo-500" id="name" placeholder="Name" type="text" v-model="state.form.name" />
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.name">{{ props.errors.name }}</p>
				</div>

				<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
					<div>
						<label class="block text-sm font-medium text-gray-700" for="module_code">Module Code</label>
						<input class="mt-2 w-full p-3 text-sm border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-indigo-500" placeholder="Module Code" type="text" v-model="state.form.module_code" />
						<p class="mt-2 text-sm text-red-600" v-if="props.errors.module_code">{{ props.errors.module_code }}</p>
					</div>

					<div>
				        <label class="block text-sm font-medium text-gray-700">Type</label>
						<select class="mt-2 py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Type" v-model="state.form.type">
							<option value="core">Core</option>
							<option value="tutorial">Tutorial</option>
							<option value="practical">Practical</option>
						</select>

						<p class="mt-2 text-sm text-red-600" v-if="props.errors.type">{{ props.errors.type }}</p>
					</div>
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700" for="teacher">Teacher</label>
					<select class="mt-2 py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Type" v-model="state.form.teacher_id">
						<option :key="teacher.id" :value="teacher.id" v-for="teacher in props.teachers">{{ teacher.full_name }}</option>
					</select>

					<p class="mt-2 text-sm text-red-600" v-if="props.errors.teacher">{{ props.errors.teacher }}</p>
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700" for="description">Description</label>
					<textarea class="mt-2 w-full p-3 text-sm border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-indigo-500" placeholder="Description" rows="8" v-model="state.form.description"></textarea>
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.description">{{ props.errors.description }}</p>
				</div>

				<div class="bg-white rounded-lg w-full p-6 shadow-lg">
					<div v-for="(v,day) in state.form.time_slots">
						<span class="text-gray-700 relative text-xl date uppercase font-bold tracking-widest mb-4">{{ day }}</span>

						<div class="grid grid-cols-2 gap-8">
							<div :key="key" v-for="(i, key) in v">
								<div class="flex justify-between">
									<span class="text-gray-600 relative inline-block date uppercase font-medium tracking-widest mb-2 text-xs">Slot: {{ key + 1 }}</span>

									<button @click=" removeSlot(day,key)" class="focus:outline-none" type="button">
										<svg class="w-5 h-5 text-red-500 transform scale-100 hover:scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
										</svg>
									</button>
								</div>
								<div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
									<div class="sm:col-span-1">
										<label class="block text-sm font-medium text-gray-700" for="from">Start</label>
										<input class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-indigo-500" placeholder="From" type="time" v-model="state.form.time_slots[day][key].start" />
									</div>
									<div class="sm:col-span-1">
										<label class="block text-sm font-medium text-gray-700" for="from">End</label>
										<input class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-indigo-500" placeholder="To" type="time" v-model="state.form.time_slots[day][key].end" />
									</div>
								</div>
							</div>
						</div>
						<button @click="addSlot(day)" class="flex justify-center text-indigo-500 font-semibold text-sm mt-2" type="button">Add Slot</button>
						<div class="border-b mb-2 mt-2"></div>
					</div>
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
