<script setup>
import { ref } from "vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import FlashMessages from '@/Shared/FlashMessages.vue'
import { Link } from "@inertiajs/inertia-vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
	<div class="flex overflow-hidden bg-gray-100 h-screen">
		<div class="hidden md:flex md:flex-shrink-0">
			<div class="flex flex-col w-64">
				<div class="flex flex-col flex-grow pt-5 overflow-y-auto border-r bg-neutral-800">
					<div class="flex flex-col items-center flex-shrink-0 px-4">
						<Link :href="route('admin.dashboard')" class="px-8 text-left focus:outline-none">
							<h2 class="block p-2 text-xl font-medium tracking-tighter transition duration-500 ease-in-out transform cursor-pointer text-neutral-200 hover:text-neutral-200 uppercase">Sams Management</h2>
						</Link>
						<button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
							<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
								<path clip-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" fill-rule="evenodd" />
								<path clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" fill-rule="evenodd" />
							</svg>
						</button>
					</div>
					<div class="flex flex-col flex-grow px-4 mt-5">
						<nav class="flex-1 space-y-1 bg-neutral-800">
							<ul>
								<li>
									<Link class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform border rounded-lg  focus:shadow-outline hover:bg-neutral-900" :href="route('admin.dashboard')" :class="route().current('admin.dashboard') ? 'text-neutral-200 bg-neutral-900 border-neutral-900' : 'text-neutral-200 border-neutral-800 hover:border-neutral-800'">
										<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24">
											<path d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V17.25C19.25 18.3546 18.3546 19.25 17.25 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V6.75Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M9.75 8.75V19" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M5 8.25H19" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
										</svg>

										<span class="ml-4">Dashboard</span>
									</Link>
								</li>
								<li>
									<Link class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform border rounded-lg  focus:shadow-outline hover:bg-neutral-900" :href="route('admin.modules.index')" :class="route().current('admin.modules.*') ? 'text-neutral-200 bg-neutral-900 border-neutral-900' : 'text-neutral-200 border-neutral-800 hover:border-neutral-800'">
										<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path d="M19.25 15.25V5.75C19.25 5.19772 18.8023 4.75 18.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M19.25 15.25H6.75C5.64543 15.25 4.75 16.1454 4.75 17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H19.25V15.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
										</svg>

										<span class="ml-4">Modules</span>
									</Link>
								</li>
								<li>
										<Link class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform border rounded-lg  focus:shadow-outline hover:bg-neutral-900" :href="route('admin.teachers.index')" :class="route().current('admin.teachers.*') ? 'text-neutral-200 bg-neutral-900 border-neutral-900' : 'text-neutral-200 border-neutral-800 hover:border-neutral-800'">
										<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path d="M4.75 10L12 5.75L19.2501 10L12 14.25L4.75 10Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
											<path d="M12.5 10C12.5 10.2761 12.2761 10.5 12 10.5C11.7239 10.5 11.5 10.2761 11.5 10C11.5 9.72386 11.7239 9.5 12 9.5C12.2761 9.5 12.5 9.72386 12.5 10Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M6.75 11.5V16.25C6.75 16.25 8 18.25 12 18.25C16 18.25 17.25 16.25 17.25 16.25V11.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
										</svg>

										<span class="ml-4">Teachers</span>
									</Link>
								</li>
								<li>
										<Link class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform border rounded-lg  focus:shadow-outline hover:bg-neutral-900" :href="route('admin.students.index')" :class="route().current('admin.students.*') ? 'text-neutral-200 bg-neutral-900 border-neutral-900' : 'text-neutral-200 border-neutral-800 hover:border-neutral-800'">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
										</svg>
										<span class="ml-4">Students</span>
									</Link>
								</li>
								<li>
									<Link class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform border rounded-lg text-neutral-200 border-neutral-800 hover:border-neutral-800 focus:shadow-outline hover:bg-neutral-900" href="#">
										<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path d="M7.25 4.75V19.25M12.25 4.75H5.75C5.19772 4.75 4.75 5.19771 4.75 5.75V18.25C4.75 18.8023 5.19772 19.25 5.75 19.25H13.25M14.75 16.25V6.75C14.75 5.64543 15.6454 4.75 16.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V16.25L17 19.25L14.75 16.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
										</svg>

										<span class="ml-4">Attendance</span>
									</Link>
								</li>
							</ul>

							<p class="px-4 pt-4 font-medium uppercase text-neutral-200">Actions</p>
							<ul>
								<li>
									<Link :href="route('logout')" class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform border rounded-lg text-neutral-200 border-neutral-800 hover:border-neutral-800 focus:shadow-outline hover:bg-neutral-900" method="post" as="button">
										<span class="ml-4">Logout</span>
									</Link>
								</li>
							</ul>
						</nav>
					</div>
					<div class="flex flex-shrink-0 p-4 px-4 bg-neutral-900">
						<a class="flex-shrink-0 block w-full group" href="#">
							<div class="flex items-center">
								<div>
									<img alt class="inline-block rounded-full h-9 w-9" src="https://robohash.org/jinas" />
								</div>
								<div class="ml-3">
									<p class="text-sm font-medium text-neutral-200">{{ $page.props.auth.user.name }}</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="flex flex-col flex-1 w-0 overflow-hidden">
			<main class="relative flex-1 overflow-y-auto focus:outline-none">
				<div class="py-6">
					<div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
						<slot name="header" />
					</div>
					<div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                        <flash-messages />
						<slot />
					</div>
				</div>
			</main>
		</div>
	</div>
</template>
