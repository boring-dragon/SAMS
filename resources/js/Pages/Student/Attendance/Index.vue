<script setup>
import StudentLayout from '@/Layouts/Student.vue';
import { Head } from '@inertiajs/inertia-vue3';

// const props = [
//     { module: 'Web Development', id: 1, description: 'Lecture 07', created_at: '13:22:46', date: '15.07.2022' },
//     { module: 'Operating System', id: 2, description: 'Lecture 07', created_at: '11:22:46', date: '15.07.2022' },
//     { module: 'Calculus and Algebra', id: 3, description: 'Lecture 07', created_at: '15:22:46', date: '15.07.2022' },
//     { module: 'Computing Project', id: 4, description: 'Lecture 07', created_at: '18:22:46', date: '14.07.2022' },
//     { module: 'Web Development', id: 5, description: 'Lecture 07', created_at: '16:22:46', date: '14.07.2022' },
//     { module: 'Operating System', id: 6, description: 'Lecture 07', created_at: '19:22:46', date: '13.07.2022' }
// ]

// ex) sorted by dates
const sortedProps = [
    {
        date: '15.07.2022',
        modules: [
            { moduleId: 'ITS42604', moduleName: 'Web Development', created_at: '13:22:46', description: 'Lecture 07'},
            { moduleId: 'ITS42604', moduleName: 'Operating System', created_at: '13:22:46', description: 'Lecture 07' },
            { moduleId: 'ITS42604', moduleName: 'Calculus and Algebra', created_at: '13:22:46', description: 'Lecture 07' },
            { moduleId: 'ITS42604', moduleName: 'Operating System', created_at: '13:22:46', description: 'Lecture 07' },
            { moduleId: 'ITS42604', moduleName: 'Calculus and Algebra', created_at: '13:22:46', description: 'Lecture 07' }
        ]
    },
    {
        date: '14.07.2022',
        modules: [
            { moduleId: 'ITS42604', moduleName: 'Web Development', created_at: '13:22:46', description: 'Lecture 07' },
            { moduleId: 'ITS42604', moduleName: 'Web Development', created_at: '13:22:46', description: 'Lecture 07' },
            { moduleId: 'ITS42604', moduleName: 'Web Development', created_at: '13:22:46', description: 'Lecture 07' }
        ]
    },
    {
        date: '13.07.2022',
        modules: [
            { moduleId: 'ITS42604', moduleName: 'Web Development', created_at: '13:22:46', description: 'Lecture 07' }
        ]
    }
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section>
                    <div class="relative">
                        <span class="pr-3 text-lg font-medium text-neutral-600">Diploma in IT</span><br>
                        <span class="pr-3 text-lg font-medium text-neutral-600">Semester: 4 (Apr-2022 - Jul-2022)</span>
                    </div>
                    <div class="space-y-8 lg:divide-y lg:divide-gray-100">
                        <div :key="attendance.date" class="bg-white group lg:items-end mt-8 p-6 rounded" v-for="attendance in sortedProps">
                            <div>
                                <span class="text-sm text-gray-500">{{ attendance.date }}</span>
                            </div><hr>
                            <table class="w-4/5 h-auto m-auto">
                                <thead class="p-5 m-5">
                                    <th>Module ID</th>
                                    <th>Module Name</th>
                                    <th>Time</th>
                                    <th>Description</th>
                                </thead>
                                <tbody class="p-5 m-5" :key="key.module" v-for="key in attendance.modules">
                                    <th class="text-center text-neutral-600">{{ key.moduleId }}</th>
                                    <th class="text-center text-neutral-600">{{ key.moduleName }}</th>
                                    <td class="text-center text-neutral-600">{{ key.created_at }}</td>
                                    <td class="text-center text-neutral-600">{{ key.description }}</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </StudentLayout>
</template>
