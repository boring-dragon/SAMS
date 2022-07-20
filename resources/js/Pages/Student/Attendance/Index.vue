<script setup>
import StudentLayout from '@/Layouts/Student.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive, watch } from "vue";
import Search from "@/Shared/Search.vue";

const propsExample = [
    { module: 'Web Development', id: 1, description: 'Lecture 07', created_at: '13:22:46', date: '15.07.2022' },
    { module: 'Operating System', id: 2, description: 'Lecture 07', created_at: '11:22:46', date: '15.07.2022' },
    { module: 'Calculus and Algebra', id: 3, description: 'Lecture 07', created_at: '15:22:46', date: '15.07.2022' },
    { module: 'Computing Project', id: 4, description: 'Lecture 07', created_at: '18:22:46', date: '14.07.2022' },
    { module: 'Web Development', id: 5, description: 'Lecture 07', created_at: '16:22:46', date: '14.07.2022' },
    { module: 'Operating System', id: 6, description: 'Lecture 07', created_at: '19:22:46', date: '13.07.2022' }
]

</script>

<template>

    <Head title="Attendance" />

    <StudentLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                Attendance
            </h2>
        </template>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 rounded-md">

                            <div class="sm:flex items-center justify-between">
                                <div class="flex items-center">
                                    <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800"
                                        href=" javascript:void(0)">
                                        <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                                            <p>All</p>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="mt-7">
                                <table class="w-full whitespace-nowrap">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="py-3 pl-4 pr-3 text-center text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6"
                                                scope="col">Module ID</th>
                                            <th class="px-3 py-3 text-center text-xs font-medium uppercase tracking-wide text-gray-500"
                                                scope="col">Description</th>
                                            <th class="px-3 py-3 text-center text-xs font-medium uppercase tracking-wide text-gray-500"
                                                scope="col">Enrolled At</th>
                                            <th class="px-3 py-3 text-center text-xs font-medium uppercase tracking-wide text-gray-500"
                                                scope="col">date</th>
                                            <th class="relative py-3 pl-3 pr-4 sm:pr-6" scope="col">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr :key="module.id"
                                            class="focus:outline-none h-16 border border-gray-100 rounded" tabindex="0"
                                            v-for="module in propsExample">

                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ module.module }}</td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ module.description }}</td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ module.created_at }}</td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ module.date }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </StudentLayout>
</template>
