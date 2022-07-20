<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'bg-indigo-100 border-b-2 border-indigo-20 duration-150 ease-in-out focus:border-indigo-700 focus:outline-none font-medium inline-flex items-center leading-5 pt-1 px-8 text-gray-900 text-sm transition'
    : 'inline-flex items-center px-8 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
