<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});
</script>

<template>
	<Head title="SAMS " />
	<section>
		<div class="max-w-5xl px-4 py-32 mx-auto lg:items-center lg:flex">
			<div class="max-w-3xl mx-auto text-center">
				<h1 class="text-3xl font-extrabold sm:text-6xl">
					<strong class="font-extrabold text-primary sm:block">SAMS</strong>

				</h1>
                <p>The only Attendance System you will ever need.</p>

				<div class="flex flex-wrap justify-center gap-4 mt-8">
					<a class="block w-full px-12 py-3 text-sm font-medium text-white bg-indigo-500 rounded shadow sm:w-auto active:bg-secondary hover:bg-secondary focus:outline-none focus:ring" href="/register">Get Started</a>
                    <a class="block w-full px-12 py-3 text-sm font-medium text-white bg-indigo-500 rounded shadow sm:w-auto active:bg-secondary hover:bg-secondary focus:outline-none focus:ring" href="/login">Login</a>
				</div>
			</div>
		</div>
	</section>
</template>
