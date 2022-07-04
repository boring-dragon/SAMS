<script setup>
import { reactive, watch } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Shared/Pagination.vue";
import Search from "@/Shared/Search.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  students: {
    type: Object,
    required: true,
  },
  filters: Object,
});

const state = reactive({
  form: {
    search: props.filters.search,
  },
});

function destroy(student) {
  if (confirm("Are you sure you want to delete this student?")) {
    Inertia.delete(route("admin.students.destroy", student.id));
  }
}

watch(
  state.form,
  _.debounce(() => {
    Inertia.get(route("admin.students.index"), _.pickBy(state.form), {
      preserveState: true,
    });
  }, 300)
);
</script>

<template>
    <Head title="Students" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students
            </h2>
        </template>

        <div class="py-12">

        </div>
    </BreezeAuthenticatedLayout>
</template>
