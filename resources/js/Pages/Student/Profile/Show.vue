<script setup>
import { onBeforeMount, reactive, watch } from "vue";
import StudentLayout from "@/Layouts/Student.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Loader from "@/Shared/Loader.vue";

const props = defineProps({
  classes: {
    type: Number,
  },
  errors: Object,
  student: Object,
});

const state = reactive({
  sending: false,
  form: useForm(
    {
      bio: null,
      password: null,
    },
    { resetOnSuccess: true }
  ),
});

function onSubmit() {
  state.form.put(route("student.profile.update"), {
    onStart: () => (state.sending = true),
    onFinish: () => (state.sending = false),
    preserveScroll: true,
  });
}

onBeforeMount(() => {
  if (props.student) {
    state.form.bio = props.student.bio;
  }
});
</script>

<template>
	<Head title="Profile" />

	<StudentLayout>
		<template #header>
			<h2 class="font-semibold text-xl leading-tight">Profile</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 shadow-sm sm:rounded-lg">
					<form @submit.prevent="onSubmit" class="space-y-4">
						<label class="block text-sm font-medium text-gray-700" for="bio">Bio</label>
						<div>
							<textarea class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2" placeholder="Hello, I'm Jinas!" rows="8" type="text" v-model="state.form.bio" />
							<p class="mt-2 text-sm text-red-600" v-if="props.errors.bio">{{ props.errors.bio }}</p>
						</div>

						<label class="block text-sm font-medium text-gray-700" for="password">Password</label>
						<div>
							<input class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-indigo-500" id="name" placeholder="Password" type="password" v-model="state.form.password" />
							<p class="mt-2 text-sm text-red-600" v-if="props.errors.password">{{ props.errors.password }}</p>
						</div>

						<div class="mt-4">
							<button class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto" type="submit">
								<span class="font-medium mr-3">Update</span>

								<Loader v-if="state.sending" />
								<svg class="w-5 h-5" fill="none" stroke="currentColor" v-else viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
								</svg>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</StudentLayout>
</template>
