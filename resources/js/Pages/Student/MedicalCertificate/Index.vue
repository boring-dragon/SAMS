<script setup>
import { reactive, watch } from "vue";
import StudentLayout from '@/Layouts/Student.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import Loader from "@/Shared/Loader.vue";

const props = defineProps({
    modules: {
        type: Object,
    },
    filters: Object,
});

const state = reactive({
  sending: false,
  form: useForm(
    {
      module: null,
      reason: null,
      file: null
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

  if (props.teacher && props.teacher.id) {
    state.form.put(route("student.medicalCertificate.index", props.teacher), config);
  } else {
    state.form.post(route("student.medicalCertificate.index"), config);
  }
}

</script>

<template>

    <Head title="Medical Certificate" />

    <StudentLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                Medical Certificate
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 shadow-sm sm:rounded-lg">

                    <form @submit.prevent="onSubmit" class="space-y-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="module">Select Module</label>
                            <select
                                class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2"
                                placeholder="Select Module" v-model="state.form.module">
                                <option :key="module.id" :value="module.name" v-for="module in props.modules">{{ module.name
                                }}</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="reason">Reason</label>
                            <textarea
                                class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2"
                                placeholder="Reason" type="text" v-model="state.form.reaason" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="file">File</label>
                            <input
                                class='py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 mt-2'
                                type="file" ref="file" />
                        </div>

                        <div class="mt-4">
                            <button
                                class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                                type="submit">
                                <span class="font-medium mr-3">Submit</span>

                                <Loader v-if="state.sending" />
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" v-else viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </StudentLayout>
</template>
