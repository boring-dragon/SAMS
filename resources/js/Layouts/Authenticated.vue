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
						<h2 class="font-extrabold text-6xl text-white">SAMS</h2>
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

						<Link :class="route().current('admin.modules.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.modules.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M19.25 15.25V5.75C19.25 5.19772 18.8023 4.75 18.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V16.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M19.25 15.25H6.75C5.64543 15.25 4.75 16.1454 4.75 17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H19.25V15.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Modules</span>
						</Link>

						<Link :class="route().current('admin.teachers.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.teachers.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M4.75 10L12 5.75L19.2501 10L12 14.25L4.75 10Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M12.5 10C12.5 10.2761 12.2761 10.5 12 10.5C11.7239 10.5 11.5 10.2761 11.5 10C11.5 9.72386 11.7239 9.5 12 9.5C12.2761 9.5 12.5 9.72386 12.5 10Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M6.75 11.5V16.25C6.75 16.25 8 18.25 12 18.25C16 18.25 17.25 16.25 17.25 16.25V11.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Teachers</span>
						</Link>

						<Link :class="route().current('admin.students.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.students.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
							</svg>

							<span class="flex-1">Students</span>
						</Link>

						<Link :class="route().current('admin.enrollments.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.enrollments.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24">
								<circle cx="12" cy="8" r="3.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M12.25 19.25H6.94953C5.77004 19.25 4.88989 18.2103 5.49085 17.1954C6.36247 15.7234 8.23935 14 12.25 14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								<path d="M14.75 17.75L16 19.25L19.25 14.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Enrollments</span>
						</Link>

						<Link :class="route().current('admin.attendances.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75'" :href="route('admin.attendances.index')" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.25 4.75V19.25M12.25 4.75H5.75C5.19772 4.75 4.75 5.19771 4.75 5.75V18.25C4.75 18.8023 5.19772 19.25 5.75 19.25H13.25M14.75 16.25V6.75C14.75 5.64543 15.6454 4.75 16.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V16.25L17 19.25L14.75 16.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>

							<span class="flex-1">Attendance</span>
						</Link>
					</nav>
				</div>
				<div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
					<a class="flex-shrink-0 w-full group block" href="#">
						<div class="flex items-center">
							<div>
								<img alt class="inline-block h-9 w-9 rounded-full" src="data:image/svg+xml;base64,PHN2ZyB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOmNjPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyMiIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgeG1sbnM6c3ZnPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNzYyIDc2MiIgZmlsbD0ibm9uZSI+PG1ldGFkYXRhPjxyZGY6UkRGPjxjYzpXb3JrPjxkYzpmb3JtYXQ+aW1hZ2Uvc3ZnK3htbDwvZGM6Zm9ybWF0PjxkYzp0eXBlIHJkZjpyZXNvdXJjZT0iaHR0cDovL3B1cmwub3JnL2RjL2RjbWl0eXBlL1N0aWxsSW1hZ2UiLz48ZGM6dGl0bGU+QWR2ZW50dXJlcjwvZGM6dGl0bGU+PGRjOmNyZWF0b3I+PGNjOkFnZW50PjxkYzp0aXRsZT5MaXNhIFdpc2Nob2Zza3k8L2RjOnRpdGxlPjwvY2M6QWdlbnQ+PC9kYzpjcmVhdG9yPjxkYzpzb3VyY2U+aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9saXNjaGlzX2FkdmVudHVyZXMvPC9kYzpzb3VyY2U+PGNjOmxpY2Vuc2UgcmRmOnJlc291cmNlPSJodHRwczovL2NyZWF0aXZlY29tbW9ucy5vcmcvbGljZW5zZXMvYnkvNC4wLyIvPjwvY2M6V29yaz48Y2M6TGljZW5zZSByZGY6YWJvdXQ9Imh0dHBzOi8vY3JlYXRpdmVjb21tb25zLm9yZy9saWNlbnNlcy9ieS80LjAvIj48Y2M6cGVybWl0cyByZGY6cmVzb3VyY2U9Imh0dHBzOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyNSZXByb2R1Y3Rpb24iLz48Y2M6cGVybWl0cyByZGY6cmVzb3VyY2U9Imh0dHBzOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyNEaXN0cmlidXRpb24iLz48Y2M6cGVybWl0cyByZGY6cmVzb3VyY2U9Imh0dHBzOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyNEZXJpdmF0aXZlV29ya3MiLz48Y2M6cmVxdWlyZXMgcmRmOnJlc291cmNlPSJodHRwczovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjTm90aWNlIi8+PGNjOnJlcXVpcmVzIHJkZjpyZXNvdXJjZT0iaHR0cHM6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zI0F0dHJpYnV0aW9uIi8+PC9jYzpMaWNlbnNlPjwvcmRmOlJERj48L21ldGFkYXRhPjxtYXNrIGlkPSJhdmF0YXJzUmFkaXVzTWFzayI+PHJlY3Qgd2lkdGg9Ijc2MiIgaGVpZ2h0PSI3NjIiIHJ4PSIwIiByeT0iMCIgeD0iMCIgeT0iMCIgZmlsbD0iI2ZmZiIvPjwvbWFzaz48ZyBtYXNrPSJ1cmwoI2F2YXRhcnNSYWRpdXNNYXNrKSI+PHBhdGggZD0iTTM5Ni4wMSAxNjQuODVjMzcuODIgNC45IDc0LjIxIDE5LjY0IDEwNC44IDQyLjM5IDYuMTUgNC44NCAxMi40OCA5LjMzIDE4LjAyIDE0LjkyIDIzLjc3IDIxLjk4IDQyLjczIDQ5LjAyIDU1LjEzIDc4Ljk1IDkuMzUgMjIuMzEgMTQuNzIgNDYuMDQgMTYuNjQgNzAuMTQgNi42Mi44MSAxMy4wNSAyLjE0IDE5LjEyIDUgMTUuNTQgNi45MyAyNy4wOCAyMC45NCAzMS43OCAzNy4yMSAyLjYzIDkuNTYgMy41NiAxOS43NSAxLjcyIDI5LjU1LTIuOTYgMTguNzYtMTMuNzIgMzYuMTMtMjkuMzcgNDYuOTItMTAuOTQgNy42NS0yNC40OSAxMi4wMy0zNy44NiAxMS42OC01LjEzLS4wNS0xMC4wNC0xLjYtMTUuMTMtMS43OS0xLjg1IDIuMTctMy4yMyA0Ljg0LTQuNzYgNy4yNS0xOC42NiAyOS42Mi00NC41NyA1NC41MS03NC42NCA3Mi40LTI4LjEgMTYuNzMtNTkuOSAyNy4xNi05Mi40NiAzMC4zMi0xMS4wOC43LTIxLjg3IDIuMDUtMzIuOTguNzQtNTEuNjktMi4zLTEwMi4wNy0yMy40NC0xNDAuMTUtNTguNDMtMjkuMDMtMjYuNTUtNTAuODQtNjAuODMtNjIuNTQtOTguMzktNy4wOS0yMi44NS0xMC42Mi00Ni43OC0xMC4wNy03MC43MS41Mi00MC4zNCAxMi41My04MC41OCAzMy45NC0xMTQuNzYgMTkuMS0zMC44MSA0NS45MS01Ni41OCA3Ny4yLTc0LjgzIDI5LjYzLTE3LjI4IDYzLjM1LTI3LjY4IDk3LjU5LTI5Ljg3IDE0LjY2LTEuNDcgMjkuNDQtLjM3IDQ0LjAyIDEuMzFaIiBmaWxsPSIjMDAwIi8+PHBhdGggZD0iTTM2MyAxNjkuMDZjNDguNDctMS4zOSA5Ny4zMiAxNC43IDEzNS44MSA0NC4xMiA2LjU1IDQuMDYgMTEuNzIgOS40OSAxNy4zNiAxNC42NCAyNC4zMyAyMi42MyA0My4yIDUwLjk1IDU0LjkzIDgyLjAyIDcuNDMgMTkuNjEgMTEuODYgNDAuMiAxMy41NiA2MS4wOS04Ljg5Ljc0LTE3LjM0IDIuMzQtMjUuMzggNi4zOC0yLjE5IDEuMDMtMS44OSA0Ljk1LjY4IDUuMjMgMi4zNS4yMyA0Ljk4LTEuNTEgNy4yNC0yLjIgMTQuNjItNS4zNyAzMS4zMi00LjM1IDQ0Ljc4IDMuNjggMTEuNjkgNi43OCAyMC4wOSAxOC4xNiAyMy44OSAzMS4wNiAyLjYgOC4yNSAyLjY4IDE3LjQxIDEuNzYgMjUuOTUtMi41IDE3LjM1LTEyLjM1IDMzLjczLTI2LjczIDQzLjgxLTE1LjcxIDExLjMzLTM3LjE3IDE0LjY0LTU0LjkzIDYuMi0zLjE3LTEuNDMtNS45NC0zLjU4LTkuMDgtNS4wNS0yLjk1LTEuMDktNC44OCAyLjc5LTIuNyA0Ljc1IDMuMTcgMi43NiA3LjM0IDQuNTIgMTEgNi41Ni0yMC4xNCAzNC4xNS00OS40NSA2Mi43LTg0LjQxIDgxLjQ3LTMwLjIgMTYuMzEtNjQuNDQgMjUuNTMtOTguNzggMjYuMTUtMjcuNjMuNzItNTUuMzMtNC4wNC04MS4yMS0xMy43Mi0zMC4zMi0xMS4yNC01Ny44NC0yOS40My04MC4zNy01Mi42LTIyLjY3LTIzLjM3LTM5LjkyLTUxLjg4LTUwLjItODIuNzctMTQuOTYtNDQuNjQtMTQuOTEtOTQuMDEuMjctMTM4LjU5IDExLjA1LTMzLjA2IDMwLjI4LTYzLjIxIDU1LjM3LTg3LjM5IDI5LjY3LTI4LjczIDY3LjY1LTQ4LjU0IDEwOC4xMy01Ni42NyAxMi44LTIuNTIgMjUuOTQtNC4yNCAzOS4wMS00LjEyWiIgZmlsbD0icmdiYSgxNTgsIDg2LCAzNCwgMSkiLz48cGF0aCBkPSJNNjA1LjAzIDQwNC40YzIuNjMtLjEgMy40NCAzLjggMS4zNiA0Ljk4LTMuNjkgMS44My03LjgyIDIuNzctMTEuNjQgNC4zNS01LjgyIDIuMDQtMTEuMjggNC43Ni0xNi42OCA3LjcyIDQuMjkgMi4zNCA4Ljg2IDQuNzQgMTIuNzEgNy43NiAyLjU4IDIuMDkgNC44NSA0LjM1IDUuMzMgNy44LS4yNiAzLjU5LTIuNzMgNi41NS01LjQ1IDguNjktNS44NiA0LjY2LTEzLjkyIDcuMTgtMjAuNzkgMTAuMjYtMS43NS42Mi00LjQzIDEuOTktNS41OS0uMjYtMS4wMi0xLjc0LS4wNi0zLjExIDEuNTctMy44NyA2LjY1LTMuMyAxNC44Ni01LjYyIDIwLjc5LTEwLjE2IDEuMzctMS4xNCAzLjM5LTIuNzQgMy42MS00LjYyLTQuMDctNS42My0xMi40Mi04LjU5LTE4LjIzLTEyLjA5LTIuMzQtMS43Mi0yLjI5LTQuMjQtLjE2LTYuMTMgNy4yNy01LjY0IDE2Ljk4LTkuMjYgMjUuNTctMTIuMzggMi40Mi0uODMgNS4wMy0xLjk1IDcuNi0yLjA1WiIgZmlsbD0iIzAwMCIvPjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0xNjEgLTgzKSI+PHBhdGggZD0iTTU0Ny41MSA0MjQuNzZjMTguODYtMi44NyAzOC43IDMuMTIgNTIuODUgMTUuOSAxMS45NyAxMC42NCAxOS43OCAyNS45IDIxLjM5IDQxLjg0IDEuNzEgMTUuMzEtMi40MSAzMS4zNS0xMS4yNSA0My45OC03LjcxIDExLjE2LTE4LjkzIDE5LjczLTMxLjY3IDI0LjM0LTEyLjEgNC4yMS0yNS4zOSA0Ljk4LTM3LjgyIDEuNzktMTcuMDYtNC4xNi0zMi4xLTE1LjU4LTQwLjc2LTMwLjg2LTEzLTIyLjE0LTExLjEyLTUxLjUzIDQuNTgtNzEuODQgMTAuMjQtMTMuNTEgMjUuODMtMjIuOSA0Mi42OC0yNS4xNVoiIGZpbGw9IiMwMDAiLz48cGF0aCBkPSJNNTQ5LjIyIDQzMC4yNmMxNC40Mi0xLjc0IDI4LjggMS40OCA0MC44NCA5LjYyIDExLjM4IDcuNTUgMjAuMDEgMTkuMjMgMjMuODQgMzIuMzQgNC4xOSAxMy41OSAzLjEyIDI4LjgxLTIuODQgNDEuNzItNi4xMSAxMy42My0xNy42NiAyNC44OS0zMS41NiAzMC40Mi0xMC4yMiA0LjI0LTIxLjU3IDUuNjUtMzIuNDkgMy42OC0xNC4wNC0yLjI2LTI3LjE2LTkuOTEtMzYuMTgtMjAuODktOC4zNy0xMC4xNi0xMy4wNi0yMy4wMy0xMy41OS0zNi4xNS0uMy0xNC4xNSA0LjQ3LTI4LjM0IDEzLjQ1LTM5LjMxIDkuNDYtMTEuNzYgMjMuNTgtMTkuNTQgMzguNTMtMjEuNDNaIiBmaWxsPSIjZmZmIi8+PHBhdGggZD0iTTM4MS4yIDQ0Ny4xYzEzLjczLTEuNDQgMjcuODYgMi40NCAzOC44NiAxMC43OSAxMS4wOSA4LjMyIDE4Ljc4IDIwLjkyIDIxLjA4IDM0LjU5IDEuMjMgOC4zNC45NyAxNy4yNy0xLjYxIDI1LjM0LTQuNDUgMTQuOTMtMTUuNTMgMjcuNi0yOS43MyAzMy45OS0xMy4zOCA2LjE5LTI5LjE1IDYuNTgtNDIuODYgMS4yMi0xMi44OS00Ljk2LTIzLjY0LTE0Ljk2LTI5LjU5LTI3LjQxLTQuNy05Ljk5LTYuNzUtMjEuNy00LjY3LTMyLjYxIDEuODQtMTIuMDIgNy45LTIzLjI2IDE2LjgyLTMxLjUxIDguNjQtOC4wOCAxOS45NC0xMy4xNyAzMS43LTE0LjRaIiBmaWxsPSIjMDAwIi8+PHBhdGggZD0iTTM3OC4yMiA0NTMuM2M5Ljc4LTEuNzUgMTkuODgtLjU0IDI4LjkzIDMuNTkgMTMuMTggNS44NCAyMy4zNyAxNy43MSAyNy4yMiAzMS42IDUuMTUgMTctLjQgMzYuNDktMTMuMiA0OC42OC0xMi42NiAxMi40NC0zMi4wOCAxNy4yMi00OSAxMS42My0xNS43NC00Ljg4LTI4LjM4LTE3LjkzLTMyLjcxLTMzLjgzLTQuNzktMTYuOTEuMTYtMzUuNTUgMTIuNTctNDcuOTQgNy4xMS03LjEzIDE2LjI4LTExLjkxIDI2LjE5LTEzLjczWiIgZmlsbD0iI2ZmZiIvPjxwYXRoIGQ9Ik01NTguNzcgNDU2Ljc0Yy0zLjg3IDQtNi42OSA4LjUyLTYuNjUgMTQuMjctLjY3IDguNjMgNC40OSAxNy4xMyAxMi41IDIwLjQyIDUuOTggMi40NSAxMi4yNiAxLjMyIDE3LjY0LTIuMDEtLjE2IDkuNDQtMi44NSAxOC41LTkuMjggMjUuNTgtOS40IDEwLjc0LTI0Ljk4IDE1LjA3LTM4LjUzIDEwLjQzLTE0LjM1LTQuNTQtMjQuNjYtMTguMzgtMjQuOTgtMzMuNDItLjQ4LTEzLjk2IDcuNDctMjcuNCAyMC4wNC0zMy41NCA5LjItNC43MyAxOS41MS00LjcyIDI5LjI2LTEuNzNaTTM5MS45NyA0NjcuODhjOC0xLjQzIDE1LjY4LjU0IDIyLjc0IDQuMjgtMy4wMiAzLjA4LTUuNDYgNi4zMS01LjUxIDEwLjgyLS42NiA3LjIzIDQuNTcgMTQuMjYgMTEuNzYgMTUuNDggMy40MS42OCA2LjItLjQ2IDkuNDEtMS40MSAxLjEyIDEyLjI3LTQuNDggMjQuNjktMTQuNzcgMzEuNTUtMTEuNjQgNy45LTI4LjM5IDYuOTktMzkuMjUtMS45MS05LjY5LTcuNTgtMTQuMzgtMjAuNzQtMTEuNzYtMzIuNzQgMi43Mi0xMy4zMSAxMy44NC0yNC4yMiAyNy4zOC0yNi4wN1oiIGZpbGw9IiMwMDAiLz48cGF0aCBkPSJNNTI3LjQ0IDQ4OS41MWMyLjI5LTEgNC44LTEuMzMgNi45Ni4xNiAzLjU0IDIuMjkgMy40NSA3LjU2Ljc3IDEwLjQ5LTIuNjcgMy4wMy03Ljc0IDMuMjEtMTAuMzItLjA2LTIuODQtMy40Mi0xLjMxLTguNyAyLjU5LTEwLjU5Wk0zNzkuNDQgNDk1LjU1YzQuNzYtMS42MyA5LjMxIDMuNTkgNy4wNyA4LjAxLTEuNjEgMy42Mi02LjkzIDQuMzctOS4zOSAxLjMtMi42MS0yLjk3LTEuNDgtOC4wMSAyLjMyLTkuMzFaTTUzNi41IDUwNC42OWMyLjQ4LS43NyA1LjI5LS41OSA3Ljc3LjEyIDYuMTUgMi40MiA4LjA1IDExLjIzIDMuNTggMTYuMDYtMy45NyA0Ljc1LTExLjc4IDQuODQtMTUuNy0uMDItNC40NC01LjM3LTIuNDQtMTMuOTIgNC4zNS0xNi4xNlpNMzg2LjUxIDUxMi43NGMzLjQyLTEuMTEgNy4xNC0uNjMgOS42MSAyLjE2IDMuNDkgMy4zOCAzLjM2IDkuNjUtLjU3IDEyLjY1LTQuMDUgMy40NC0xMC43OCAxLjcyLTEzLjIzLTIuODYtMi41OC00LjI5LS42MS0xMC4zMiA0LjE5LTExLjk1WiIgZmlsbD0iI2ZmZiIvPjwvZz48ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTYxIC04MykiPjxnIGZpbGw9IiMwMDAiPjxwYXRoIGQ9Ik01MDEuOTkgMzg0Ljk2YzkuOTEuMTIgMTkuODcgMy4yMyAyOC44MyA3LjMxIDMuMzYgMS44OCA3LjA1IDQuMDEgNy4zMSA4LjI5LTUuMTQtLjg2LTEwLjE0LTIuMDYtMTUuMzgtMi4yOC0xMS42LS42OC0yMy4xMyAxLjM2LTMzLjI1IDcuMjMtMi41NCAxLjQxLTQuOTUgMy4yNi03LjY0IDQuMzUtMS44LjI3LTMuOTItMS45OS0zLjk0LTMuNzMtLjE4LTUuODEgMS45NS0xMS45MiA2LjUzLTE1LjcgNS4wMy00LjIzIDExLjE1LTUuMyAxNy41NC01LjQ3Wk00MTQuMDMgNDAyLjYxYzUuODEuMTUgMTAuOTMgNS4zIDEyLjUxIDEwLjY0LjggMi42My0uNDYgNS43Mi0zLjUzIDUuNjEtOC44Mi4yMS0xOC4yMS4wMy0yNi44MSAyLjI2LTcuNTIgMi4wMS0xNC43NCA2LjcxLTIxLjM2IDEwLjc0LTEuMjIuODEtMi41Ny45Ni0zLjk4IDEuMjIuMzMtMS45My42NC0zLjY2IDEuOTQtNS4yMSAzLjI4LTQuMzMgNi43OC04LjU4IDEwLjc0LTEyLjMgNS44OC01LjE3IDEzLjAxLTguOTYgMjAuMzItMTEuNjYgMy4yMy0xLjExIDYuNzYtMS41OCAxMC4xNy0xLjNaIi8+PC9nPjwvZz48ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTYxIC04MykiPjxwYXRoIGQ9Ik01MTYuNDcgNTU1LjZjNi4wMiA0LjQzIDExLjcgMTAuMDEgMTUuMyAxNi42MiAyLjY0IDQuODMgMy4yNyAxMS42Ni0uNDIgMTYuMTMtNC4xNCA1LjM3LTExLjQ5IDcuNTgtMTcuODggOC43Ni0xNS42NyAyLjQ3LTMxLjkuOTUtNDcuNDYtMS41OS01Ljc0LTEuMTItMTAuMTggMS42Mi0xNiAyLjU0LTguNyAxLjU5LTE4LjM2IDIuOTItMjcuMDYgMS01LjEzLTEuMDItMTAuMjgtMy4yLTEzLjM0LTcuNjUtMi43OC0zLjg3LTIuNjQtOS4zNC0xLjEyLTEzLjY3IDEuNTYtNC4xMiA0LjEzLTcuOTUgNy4wNC0xMS4yNCAxLjMzLTEuNzQgMy4wOC0xLjAxIDQuOTctMS4xMi4zIDEuODQgMS4wNiAzLjIzLS4zNiA0LjgyLTIuNjEgMy4zNC01LjI0IDYuMzctNi40NCAxMC41NS0xLjEyIDMuMjctLjMzIDYuOTMgMi40IDkuMTQgMy4wMyAyLjM3IDcuMTYgMy40NyAxMC45MyAzLjg3IDcuNzguNSAxNS41Ny4xNCAyMy4xNi0xLjczIDUuNi0xLjA2IDkuOTYtMy41NyAxNS44MS0yLjUxIDEyLjAzIDEuOTMgMjMuNzggMy40NSAzNi4wMSAyLjgxIDYuOTEtLjIzIDEzLjk1LTEuMDcgMjAuMjYtNC4xMSAzLjIzLTEuNzggNi4wNC00LjE1IDUuNjgtOC4yMi0uMjctNi4wNS02LjA3LTExLjc5LTEwLjI1LTE1LjctMi41LTIuNjUtNi42Ni00LjA5LTYuMDItOC4zNiAxLjc5LS44OSAyLjk1LTEuOCA0Ljc5LS4zNFoiIGZpbGw9IiMwMDAiLz48L2c+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTE2MSAtODMpIi8+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTE2MSAtODMpIj48cGF0aCBkPSJNNTMwLjA5IDEyMi43NWMxNi43MSAzLjY4IDMyLjAxIDEyLjU1IDQyLjEzIDI2LjUzIDguNzMtNS4yNiAxNy45My05LjU2IDI3Ljc5LTEyLjIyIDExLjkxLTMuNDggMjQuNzMtNC4xNSAzNy4wMi0yLjc0IDE1LjMzIDIuMDUgMzAuNiA5LjA0IDQwLjA5IDIxLjYxIDYuODMgOC44OSA5Ljg3IDE5LjkzIDkuMzIgMzEuMDkgNi40Ni43OSAxMi44MSAxLjM3IDE5LjA4IDMuMjggMTMuNCAzLjgyIDI2LjE2IDExLjQxIDM0LjM0IDIyLjkgNi4yMyA4LjY5IDkuNTcgMjAuMjMgNy42NSAzMC44NSAyMC4yOC02LjUyIDQzLjYtMi44MyA2MSA5LjQxIDguMjUgNS45NiAxNS4xNCAxMy43OCAxOC45NCAyMy4zMSA0LjA4IDkuOTQgNC4wOSAyMS4zOS0uMTkgMzEuMjctMi44NSA2Ljc4LTcuNDcgMTIuMzYtMTMuMDQgMTcuMDkgMTcuMzUgMS4wOSAzMi45NCAxMC43NCA0Mi45NyAyNC43IDEuMTIgMS43NyAxLjU4IDMuOTQtLjExIDUuNTMtMS42NC40MS0zLjQ5LS44NC01LjAzLTEuMzctMy40OC0xLjY3LTYuOTItMS4zNy0xMC42Ni0xLjQgNC4xMyA0LjgxIDcuODEgOS44NyAxMC4yNCAxNS43NyA3LjcyIDE3LjgxIDUuMzYgMzkuMjYtNi43NyA1NC41Mi03LjQyIDkuMy0xNy43NyAxNS4yNS0yOS42MiAxNi43MyA2LjggMTcuODEgMS41MSA0MC45OC0xMy45NSA1Mi43MS0xLjgxIDEuMzItNC4xNSAyLjcxLTUuNjQuMTQtNS40MS0xMS40OC0xNC43MS0yMS45LTI2LjM0LTI3LjI3LTEuNDIgNC4zMy0zLjIyIDguMzktNi40IDExLjc0LTE0LjQxIDE1LjQ2LTQyLjkxIDEzLjU1LTU1LjExLTMuNzUtNS4wMi02Ljk3LTUuOTktMTUuNy0zLjA2LTIzLjc0LTUuOTcgMy43NS0xMS42NyA3LjYtMTYuMDcgMTMuMjItMS45MyAyLjQtMy41NyAyLjI3LTYuMDUuNjhDNjY3LjY5IDQ1Mi45IDY1OSA0MzUuMDYgNjU4LjQ2IDQxN2MtLjk4LTE3LjM4IDQuNjEtMzQuMjcgMTQuNC00OC41Mi0xNS40IDEuOTMtMzAuMTUtNy45OC0zNS4zLTIyLjM3LTcuNDYgNC40OC0xNS44IDcuMjUtMjQuNTYgNy4yOC0xMC44NS4zMS0yMS4yMS0zLjI1LTMwLjItOS4xNy0xMi4yMS03Ljk5LTIxLjg3LTIwLjE5LTI4LjM3LTMzLjE1LTIuNTYgMy4yNC01LjA1IDYuNDctNy45NiA5LjQtMTQuMzQgMTQuNjYtMzQuOTQgMjMuMTktNTUuNDcgMjIuNDEtMTMuMjktLjM5LTI2LjAxLTQuNjQtMzYuOTQtMTIuMTcgMi44NSA4LjI3IDcuMTEgMTYuNjggMTMuMzYgMjIuOSAxLjIxIDEuMjEgMS45NiAyLjM4IDEuMzYgNC4xNS0xLjUgMi4xMi00LjI4IDMuNTMtNi41NCA0LjY4LTE1LjEyIDcuNDItMzIuOCA5LjM2LTQ5LjIzIDUuODMtMTQuNzEtMy4wMi0yOC40My0xMC4yNi0zOS4zMS0yMC41OS04LjMxIDEyLjc0LTIyLjk2IDE3Ljk5LTM3LjcxIDE3LjM4LTcuNDcgMTUuOS0xNCAzMi4wOS0xOC4zOCA0OS4xMy0xLjExIDMuNzEtMS42NiA3LjY5LTMuMTQgMTEuMjctLjggMS44Ni0yLjY1IDIuMy00LjQ4IDEuNjctOS40NC0zLjM0LTE1Ljk3LTExLjM2LTE5LjctMjAuNC00LjM1LTEwLjM5LTUuMTEtMjIuNi0yLjA2LTMzLjQzLTExLjAzLjY0LTIxLjM4LTMuNjItMjkuMDUtMTEuNDktMTAuNDgtMTAuODktMTQuOTgtMjUuOTctMTUuNC00MC44MS0uMzItMTYuMjkgNC40NC0zMyAxMy45Mi00Ni4zMSAxLjUzLTEuODIgMi42MS0zLjk5IDUuNC0zLjI5IDEuOSAxLjI0IDEuNDQgMy42NSAxLjk1IDUuNjMuNiA0LjQxIDMuMDQgOC4yMyA1LjI2IDExLjk4IDUuMzYtMTUuNTUgMTguNTktMjkuMzUgMzUuNzktMzAuMjktLjYtMy4yNi0xLjMyLTYuMzgtMS4xOS05LjczLjU4LTE0LjggOC4xNC0yOS4xOSAxOS4zMy0zOC43NSA3LjM1LTYuMzUgMTYuMTgtMTAuMjEgMjUuOTYtMTAuNDggMS4yMi0xNC4yMiA4LjkzLTI3LjcgMTguOTQtMzcuNjMgMTAuMzItMTAuMSAyNC4zMy0xNy42OSAzOC44Ny0xOC44OWE0MS4xOTIgNDEuMTkyIDAgMCAxIDI4LjQ4IDcuNjRjMjMuODMtMjQuMDMgNjAuNDQtMzUuNDQgOTMuNi0yOC4xM1oiIGZpbGw9IiMwMDAiLz48cGF0aCBkPSJNNTE4LjgyIDEyNi43NGMxNi40MyAxLjcyIDMyLjY0IDguMTUgNDQuMDggMjAuMzcgMi41IDIuNTMgNC4yOCA1LjY0IDYuNjggOC4yMyAxLjg1IDEuMjcgMy40My40IDUuMTEtLjYgMTkuMzctMTIuNjQgNDQuNjktMTguNzQgNjcuNDYtMTMuNjEgMTAuODggMi41MiAyMS4xNSA3LjYyIDI4LjU3IDE2LjEzIDcuMTIgOC4wMSAxMC43MSAxOS4wOCA5Ljk1IDI5LjczLS4wMyAxLjU0LS40MSAzLjQ4LjMgNC44OSAxLjE0IDEuMjMgMi40NyAxLjA4IDQuMDEgMS4yIDEzLjY1LjExIDI3LjU0IDQuMzIgMzguNzMgMTIuMTkgOC45MSA2LjQ0IDE2LjE2IDE1LjY0IDE3Ljk0IDI2LjcxLjQ3IDUuNDguODcgMTEuMS0xLjUyIDE2LjE5LS45MiAyLjQ4IDEuMTYgNC4zNiAzLjYyIDMuMzggMTguOC03LjkzIDQxLjUyLTUuOTcgNTguNzggNC44OSA4LjUxIDUuMzggMTUuNzUgMTMgMTkuNTEgMjIuNDQgMy4zMSA4LjA0IDMuNjIgMTcuNTEuNDIgMjUuNjQtMi41NSA2Ljc1LTcuMzEgMTIuNTEtMTMgMTYuODYtMi40NyAxLjg5LTUuNCAzLjQ0LTcuNjIgNS41OC0xLjQ3IDEuNjUtLjEgNC41MSAyLjE0IDQuMzEgNS40My4wNCAxMC41OC0uNjMgMTYuMDEuNDQgMTAuODIgMi4wNSAyMC4xOSA3Ljg2IDI3Ljc2IDE1LjcxLTMuNjQuMDUtOC43LS42NC0xMS44IDEuNTgtMS44MyAxLjE4LTIuNDYgMy4zLTEuMTQgNS4xNCAyLjUxIDMuMiA1LjU3IDUuODEgNy42NyA5LjM1IDcuMTYgMTAuNzcgOS4wOCAyMy45MSA2Ljc5IDM2LjUxLTIuMjcgMTAuODMtOC40OSAyMS4zLTE3LjggMjcuNTEtNi40IDQuMjMtMTMuNjggNi45MS0yMS40NiA2LjExLTIuMjYtLjQ0LTIuOCAyLjYtMS45IDQuMTkgOC4wMiAxNS44NiA0LjM3IDM3LjM3LTkuMTggNDkuMTEtNC42MS04LjQ0LTEwLjc1LTE1LjYzLTE4LjI2LTIxLjYxLTMuMzEtMi41OS03LjIxLTQuMDItMTAuNjctNi4yOS0xLjQ1LTMuODYtLjQyLTguNDktNC44My0xMC40Ni0uOTIuNDYtMS44My45Mi0yLjc1IDEuMzcuMTIgMy44OCAxLjc2IDcuMjQgMS40NyAxMS4wOC0uMzEgNi4zOS00LjIxIDExLjk4LTkuMzggMTUuNTItMTEuNzYgOC4wMy0yOS4zNCA2LjQ3LTM5LjQxLTMuNjMtNC44OC00Ljg3LTcuNDUtMTEuODgtNS43NS0xOC43LjcxLTMuMzMgMi42My01LjcxIDQuMzctOC41MiAxLjA0LTEuMjMtLjExLTMuMDQtLjQxLTQuMzgtMi4wMi4xNC0zLjk3LjItNS44NiAxLjAxLTguNDQgMy4zLTE1Ljk4IDkuMTMtMjIuMDIgMTUuODMtMTAuMTQtNy4yNi0xNi45LTE4LjI4LTE5Ljc0LTMwLjM0LTUuMS0yMS4xOCAyLjA2LTQ0Ljc3IDE1Ljk3LTYxLjIgMS4zNS0xLjc2IDIuNjYtMy4yNyAxLjM1LTUuNS0xLjQ3LTEuOTktNC4wNi0uNzQtNS44Ny0uMDEtOS45NCA0LjY2LTIyLjMtLjEtMjkuMDItOC4xNC0zLjUzLTMuOTUtNC45OC04LjU4LTYuNzktMTMuNDItMi4yNy0uMjUtMy44Ni0uNDEtNS44MSAxLTcuMDUgNC41LTE1LjA4IDcuMjQtMjMuNTIgNy4wNS0xMC42NC4xNy0yMC44MS00LjE0LTI5LjIxLTEwLjQzLTExLjQxLTguNTgtMjAuMTItMjEuMDktMjUuNzEtMzQuMTMtLjc1LS41LTEuNTEtMS0yLjI2LTEuNS0xLjM5IDEuMDktMi43MiAyLjExLTMuNjMgMy42Ny0xMi4xNiAxOS40OC0zNS4xMiAzMi40Mi01OC4xOSAzMS43NS0xMy44NS40Mi0yNy44Ny00LjY0LTM4LjU2LTEzLjQtMS4yOC0uOS0yLjYyLTIuMTYtNC4zLTEuNDEtMi4yMS45OS0yLjUzIDMuNzYtMi4wMiA1LjkgMS44NCAxMC4yNSA3LjE5IDIwLjA2IDEzLjY5IDI4LjEtMjAuMzYgMTEuMDUtNDYuMzEgMTAuMzctNjYuNjctLjMtMTUuMzEtNy44Mi0yNy43NC0yMC45MS0zNC4wMi0zNi45OS00LjQxLTExLjI1LTUuNTgtMjQuMDgtMi43LTM1Ljg0LjM2LTEuODkuOS0zLjU1LjA0LTUuNC0xLjkzLTEuMTMtMy44Ni0xLjA5LTQuODQgMS4xNC02Ljk4IDIyLjY0LjQ4IDQ3LjIxIDE1Ljg4IDY0LjYzLTQuOTkgOC41LTEzLjg0IDEzLjgyLTIzLjQ4IDE1LjI2LTcuNTcuNzktMTUuMTIuNDktMjIuMjQtMi40NS00LjUyLTEuNTMtOC4xOC00LjMyLTEyLjIyLTYuNzItMi45Ny0xLjIyLTUuNDIgMi43My0yLjc2IDQuNzYgNi4wNiA1LjEyIDE0LjA0IDguMzIgMjEuNzYgOS45My04Ljg0IDE4LjE4LTE2LjA1IDM2Ljk4LTIwLjcxIDU2LjY4LTcuOTctMy44Ny0xMi40OC0xMS4yMi0xNS4zMy0xOS4zMi0yLjgtOC42OS0zLjU4LTE4LjYzLS4zNC0yNy4zMi43MS0yLjc1IDIuNTgtNS4wMS0uMy03LjIxLTQuMDItLjQ3LTcuNzkgMS4zLTExLjkuMzItMTAuMjUtMS4yNy0xOC41Ni03Ljc1LTIzLjk0LTE2LjMzLTcuMjYtMTEuNjYtOS43MS0yNi40My03LjkyLTM5Ljk0Ljk4LTEwLjU4IDQuNzctMjAuOTUgMTAuMjYtMzAuMDIgMS44NyA1LjI1IDQuNjMgMTEuMDUgOC44OCAxNC43OCAxLjQyIDEuMzIgMy4yNiAxLjMgNC45Mi40NSAxLjE1LTIuNDggMS4wMy01LjQ1IDIuMS03Ljk5IDQuNTQtMTAuMzMgMTIuMjgtMTkuMDMgMjMuMjMtMjIuNiAzLjk3LTEuMzEgNy41LS40IDExLjUxLS41NCAxLjE1LS4zNyAxLjctMS45MSAyLjQxLTIuODEtNC45LTExLjI4LTIuNDYtMjMuMjMgMy4yMi0zMy42NSA1LjUxLTkuOTEgMTQuNzQtMTguODQgMjUuODYtMjEuOTUgMy44My0xLjE3IDcuNTItLjQ5IDExLjM2LS45MyAyLjA3LS43OSAxLjY0LTIuOTYgMi4wMy00Ljc3IDEuMTctMTMuMTcgNy42Mi0yNC45NiAxNi44Ni0zNC4yMyA5LjYyLTkuNzYgMjIuNS0xNi42MiAzNi4yNS0xNy44NCA4LjQxLS42OCAxNi40MSAxLjMyIDIzLjM0IDYuMTYtOC45OSAxMS4zMy0xNS45NCAyMy40LTE3Ljk1IDM3Ljk2LS4xNyAyLjIxIDEuNjIgMy41NyAzLjcyIDMuMjUgMi4yNS0xLjIxIDIuMDEtMy41OSAyLjY0LTUuOCAyLjI0LTExLjIxIDcuNjYtMjEuMTcgMTQuODItMjkuOTggMTkuOTMtMjMuODggNTIuMzctMzYuNzEgODMuMjQtMzMuNzhaIiBmaWxsPSJyZ2JhKDE3MiwgMTAxLCAxNywgMSkiLz48cGF0aCBkPSJNNzE4LjQ4IDU3Ni41MmMxLjQtLjg4IDIuNTgtLjMgNC4wNS0uMDEgNS4zMyAxLjUxIDEwLjk4IDEuOTIgMTYuNDggMi4zIDIuMzcuMDQgNC43My0uMjEgNy4wOS0uMTcgMi4wMy44NCAxLjk5IDIuNDMgMS45OSA0LjM0LS4yNCA2LjEyLTEuNzMgMTIuNjgtNS4zMiAxNy43NC0zLjg4IDUuNy05LjkyIDEwLTE2LjczIDExLjM1LTcuNDkgMS43LTE1LjktLjM5LTIxLjc2LTUuMzYtMS42NS0xLjUtMy4xOC0zLjgxLTEuNDYtNS44OCAzLjY1LTUuMDIgNy40Ny0xMCAxMC42Ny0xNS4zMyAxLjc2LTIuOSAyLjg4LTYuMzMgNC45OS04Ljk4WiIgZmlsbD0iIzAwMCIvPjxwYXRoIGQ9Ik03MjEuNTEgNTgxLjk1YzYuOCAxLjI4IDEzLjYzIDIuMjUgMjAuNTYgMi40NS0uMTUgOS4wNC01LjM0IDE3LjU4LTEzLjg2IDIwLjk4LTYuNzcgMi44NC0xMy44MSAxLjQtMTkuNzktMi41MyA0LjcyLTYuODEgOS4zOC0xMy40OCAxMy4wOS0yMC45WiIgZmlsbD0icmdiYSgxNzIsIDEwMSwgMTcsIDEpIi8+PC9nPjwvZz48L3N2Zz4=" />
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

					<footer class="bg-white">
						<div class="max-w-7xl mx-auto py-5 px-4 overflow-hidden sm:px-6 lg:px-8">
							<p class="mt-8 text-center text-base text-gray-400">&copy; 2022 SAMS, All rights reserved.</p>
						</div>
					</footer>
				</div>
			</main>
		</div>
	</div>
</template>
