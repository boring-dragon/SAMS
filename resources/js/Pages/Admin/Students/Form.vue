<script setup>
import { reactive, onMounted } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Loader from "@/Shared/Loader.vue";
import DateInput from "@/Shared/DateInput.vue"
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  student: Object,
  errors: Object,
});

const state = reactive({
  sending: false,
  form: useForm(
    {
      first_name: null,
      last_name: null,
      email: null,
      phone_number: null,
      profile_photo_url: null,
      bio: null,
      dob: null
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

  if (props.student && props.student.id) {
    state.form.put(route("admin.students.update", props.student), config);
  } else {
    state.form.post(route("admin.students.store"), config);
  }
}

onMounted(() => {
  if (props.student) {
    _.assign(state.form, props.student);
  }
});
</script>

<template>
	<div class="py-12">
		<div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">
			<form @submit.prevent="onSubmit" class="space-y-4">
            	<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
				<div>
					<label class="sr-only" for="first_name">First Name</label>
					<input class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500"  placeholder="First Name" type="text" v-model="state.form.first_name" />
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.first_name">{{ props.errors.first_name }}</p>
				</div>

                <div>
					<label class="sr-only" for="last_name">Last Name</label>
					<input class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500" placeholder="Last Name" type="text" v-model="state.form.last_name" />
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.last_name">{{ props.errors.last_name }}</p>
				</div>
                </div>

				<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    	<div>
						<label class="sr-only" for="email">Email</label>
						<input class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500" placeholder="Email" type="text" v-model="state.form.email" />
						<p class="mt-2 text-sm text-red-600" v-if="props.errors.email">{{ props.errors.email }}</p>
					</div>
					<div>
						<label class="sr-only" for="phone_number">Phone No</label>
						<input class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500" placeholder="Phone Number" type="text" v-model="state.form.phone_number" />
						<p class="mt-2 text-sm text-red-600" v-if="props.errors.phone_number">{{ props.errors.phone_number }}</p>
					</div>


				</div>

                	<div>
					<label class="sr-only" for="dob">DOB</label>
				    <date-input placeholder="DO" v-model="state.form.dob"></date-input>
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.dob">{{ props.errors.dob }}</p>
				</div>


				<div>
					<label class="sr-only" for="description">Bio</label>
					<textarea class="w-full p-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500" placeholder="Bio" rows="8" v-model="state.form.bio"></textarea>
					<p class="mt-2 text-sm text-red-600" v-if="props.errors.bio">{{ props.errors.bio }}</p>
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
