<script setup>
import { ref } from "vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import FlashMessages from "@/Shared/FlashMessages.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Gate from "@/Composables/Gate";

const showingNavigationDropdown = ref(false);

const { isAdmin, isTeacher } = Gate();
</script>

<template>
	<div class="flex overflow-hidden bg-gray-50 h-screen">
		<div class="flex flex-col w-64">
			<div class="flex-1 flex flex-col min-h-0 bg-indigo-700">
				<div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
					<div class="flex items-center flex-shrink-0 px-4">
						<!-- <h2 class="font-extrabold text-6xl text-white">SAMS</h2> -->
						<img src="/images/SAMS-01.png" class='rounded-xl w-[80px]'>
					</div>
					<nav aria-label="Sidebar" class="mt-5 flex-1 px-2 space-y-1">
						<Link :class="route().current('admin.dashboard') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.dashboard')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24">
								<path d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V17.25C19.25 18.3546 18.3546 19.25 17.25 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V6.75Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M9.75 8.75V19" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M5 8.25H19" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Dashboard</span>
						</Link>

						<Link v-if="isAdmin()" :class="route().current('admin.modules.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.modules.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M19.25 15.25V5.75C19.25 5.19772 18.8023 4.75 18.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M19.25 15.25H6.75C5.64543 15.25 4.75 16.1454 4.75 17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H19.25V15.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Modules</span>
						</Link>

                        	<Link v-if="isTeacher()" :class="route().current('admin.my-modules.index') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.my-modules.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M19.25 15.25V5.75C19.25 5.19772 18.8023 4.75 18.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M19.25 15.25H6.75C5.64543 15.25 4.75 16.1454 4.75 17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H19.25V15.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">My Modules</span>
						</Link>

						<Link v-if="isAdmin()" :class="route().current('admin.teachers.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.teachers.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M4.75 10L12 5.75L19.2501 10L12 14.25L4.75 10Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M12.5 10C12.5 10.2761 12.2761 10.5 12 10.5C11.7239 10.5 11.5 10.2761 11.5 10C11.5 9.72386 11.7239 9.5 12 9.5C12.2761 9.5 12.5 9.72386 12.5 10Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M6.75 11.5V16.25C6.75 16.25 8 18.25 12 18.25C16 18.25 17.25 16.25 17.25 16.25V11.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Teachers</span>
						</Link>

						<Link v-if="isAdmin()" :class="route().current('admin.students.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.students.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
							</svg>

							<span class="flex-1">Students</span>
						</Link>

						<Link v-if="isAdmin()" :class="route().current('admin.enrollments.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.enrollments.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24">
								<circle cx="12" cy="8" r="3.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M12.25 19.25H6.94953C5.77004 19.25 4.88989 18.2103 5.49085 17.1954C6.36247 15.7234 8.23935 14 12.25 14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M14.75 17.75L16 19.25L19.25 14.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Enrollments</span>
						</Link>

						<Link v-if="isTeacher()"  :class="route().current('admin.attendances.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.attendances.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.25 4.75V19.25M12.25 4.75H5.75C5.19772 4.75 4.75 5.19771 4.75 5.75V18.25C4.75 18.8023 5.19772 19.25 5.75 19.25H13.25M14.75 16.25V6.75C14.75 5.64543 15.6454 4.75 16.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V16.25L17 19.25L14.75 16.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Attendance</span>
						</Link>

						<p class="px-4 pt-4 font-medium uppercase text-white">Actions</p>
						<ul>
							<li>
								<Link :href="route('logout')" as="button" class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform rounded-lg text-white hover:bg-indigo-800 focus:shadow-outline" method="post">
									<span class="ml-4">Logout</span>
								</Link>
							</li>
						</ul>
					</nav>
				</div>
				<div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
					<a class="flex-shrink-0 w-full group block" href="#">
						<div class="flex items-center">
							<div>
								<img
									alt
									class="inline-block h-9 w-9 rounded-full"
									src="https://robohash.org/sams"
								/>
							</div>
							<div class="ml-3">
								<p class="text-sm font-medium text-white">{{ $page.props.auth.user.name}}</p>
								<p class="text-xs font-medium text-indigo-200 group-hover:text-white">View profile</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="flex flex-col flex-1 w-0 overflow-hidden">
			<main class="relative flex-1 overflow-y-auto focus:outline-none">
				<div class="py-6">
					<div class="container max-w-7xl mx-auto px-6">
						<div class="p-8 bg-gray-800 rounded-lg">
							<div class="md:flex md:items-center md:justify-between">
								<div class="flex-1 min-w-0">
									<h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl sm:truncate">
										<slot name="header" />
									</h2>
								</div>
								<div class="mt-4 flex md:mt-0 md:ml-4">
									<slot name="actions" />
								</div>
							</div>
						</div>
					</div>

					<div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
						<flash-messages />
						<slot />
					</div>

					<footer class="bg-white fixed bottom-0 w-full">
						<div class="max-w-4xl mx-auto py-5 px-4 overflow-hidden sm:px-6 lg:px-8">
							<p class="mt-8 ml-16 text-base text-gray-400">&copy; 2022 SAMS, All rights reserved.</p>
						</div>
					</footer>
				</div>
			</main>
		</div>
	</div>
</template>
