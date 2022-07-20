<script setup>
import StudentLayout from '@/Layouts/Student.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Vue3ChartJs from '@j-t-mcc/vue3-chartjs';
import { computed, onBeforeMount, onMounted } from 'vue';
import { map } from 'lodash';

const props = defineProps({
    modules: {
        type: Object,
    }
});

const filterLabels = computed(() => {

});

function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
}

const doughnutChart = {
    id: 'doughnut',
    type: 'doughnut',
    data: {
        labels: [],
        datasets: [
            {
                backgroundColor: [],
                data: []
            }
        ]
    }
}

const pieChart = {
    id: 'pie',
    type: 'pie',
    data: {
        labels: ['Web Development', 'Operating System', 'Computing Project', 'Calculus and Algebra'],
        datasets: [
            {
                backgroundColor: [
                    random_rgba(),
                    random_rgba(),
                    random_rgba()
                ],
                data: [20, 15, 10]
            }
        ]
    }
}

onBeforeMount(() => {
    let enrolled_pie_labels = map(props.modules, function (module, key) {
        return module.name
    })

    enrolled_pie_labels.forEach(key => {
        doughnutChart.data.labels.push(key)
        doughnutChart.data.datasets[0].backgroundColor.push(random_rgba())
        doughnutChart.data.datasets[0].data.push(1)
    })

});
</script>


<template>

    <Head title="Dashboard" />

    <StudentLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in as a student
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 flex justify-between shadow-sm sm:rounded-lg">

                <div class="w-1/2 m-5 p-5">
                    <h1 class="text-lg font-medium text-neutral-600">Enrolled modules</h1>
                    <vue3-chart-js :id="doughnutChart.id" :type="doughnutChart.type" :data="doughnutChart.data">
                    </vue3-chart-js>
                </div>
                <div class="w-1/2 m-5 p-5">
                    <h1 class="text-lg font-medium text-neutral-600">Attendances record</h1>
                    <vue3-chart-js :id="pieChart.id" :type="pieChart.type" :data="pieChart.data"></vue3-chart-js>
                </div>

            </div>
        </div>

    </StudentLayout>
</template>
