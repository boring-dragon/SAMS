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
		<div class="bg-white">
			<main>
				<!-- Hero section -->
				<div class="pt-8 overflow-hidden sm:pt-12 lg:relative lg:py-48">
					<div
						class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24">
						<div>
							<div>
								<h2 class="text-6xl font-extrabold text-indigo-500">SAMS</h2>
							</div>
							<div class="mt-20">
								<div>
									<a class="inline-flex space-x-4" href="#">
										<span
											class="rounded bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-500 tracking-wide uppercase">What's
											new</span>
									</a>
								</div>
								<div class="mt-6 sm:max-w-xl">
									<h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Student
										Attendance Management System</h1>
									<p class="mt-6 text-xl text-gray-500">Welcome to SAMS application. Cams are on
										steroids. This app is going to help you to take attendance for students and keep
										track of it in school. We thought that Taylor's CAMS attendance system wasn't
										convenient enough for the students to use as we are experienced with Taylor's
										students. So we decided to make a better version of Taylor's cams. Now here we
										are.
									</p>
									<p>
										<a class="text-base font-medium text-rose-500" href="/login">Login&nbsp&rarr;</a>
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="sm:mx-auto sm:max-w-3xl sm:px-6">
						<div class="py-12 sm:relative sm:mt-12 sm:py-16 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
							<div class="hidden sm:block">
								<div
									class="absolute inset-y-0 left-1/2 w-screen bg-gray-50 rounded-l-3xl lg:left-80 lg:right-0 lg:w-full">
								</div>
								<svg class="absolute top-8 right-1/2 -mr-3 lg:m-0 lg:left-0" fill="none" height="392"
									viewBox="0 0 404 392" width="404">
									<defs>
										<pattern height="20" id="837c3e70-6c3a-44e6-8854-cc48c737b659"
											patternUnits="userSpaceOnUse" width="20" x="0" y="0">
											<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0"
												y="0" />
										</pattern>
									</defs>
									<rect fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)" height="392" width="404" />
								</svg>
							</div>
							<div
								class="relative pl-4 -mr-40 sm:mx-auto sm:max-w-3xl sm:px-0 lg:max-w-none lg:h-full lg:pl-12">
								<img alt
									class="w-full rounded-md shadow-xl ring-1 ring-black ring-opacity-5 lg:h-full lg:w-auto lg:max-w-none"
									src="/images/adminDashboard.png" />
							</div>
						</div>
					</div>
				</div>

				<!-- Testimonial/stats section -->
				<div class="relative mt-20">
					<div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
						<div class="relative sm:py-16 lg:py-0">
							<div aria-hidden="true"
								class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
								<div class="absolute inset-y-0 right-1/2 w-full bg-gray-50 rounded-r-3xl lg:right-72">
								</div>
								<svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12"
									fill="none" height="392" viewBox="0 0 404 392" width="404">
									<defs>
										<pattern height="20" id="02f20b47-fd69-4224-a62a-4c9de5c763f7"
											patternUnits="userSpaceOnUse" width="20" x="0" y="0">
											<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0"
												y="0" />
										</pattern>
									</defs>
									<rect fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)" height="392" width="404" />
								</svg>
							</div>
							<div
								class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
								<img src="/images/modulePage.png" alt="">
							</div>
						</div>

						<div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
							<!-- Content area -->
							<div class="pt-12 sm:pt-16 lg:pt-20">
								<h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">Objective</h2>
								<div class="mt-6 text-gray-500 space-y-6">
									<p class="text-lg">The objective of this system is to provide students with an easy
										way to sign in their attendance and allows the teachers an easy and efficient
										way to take attendance. It also allows the college or university administrators
										to view attendance records conveniently while letting students have a better UI
										experience when it comes to attendance with new functionalities since it hasn’t
										been easy.</p>
								</div>
							</div>

							<!-- Stats section -->
							<div class="mt-10">
								<dl class="grid grid-cols-2 gap-x-4 gap-y-8">
									<div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Founded</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">2022</dd>
									</div>

									<div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Students</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">4</dd>
									</div>

									<!-- <div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Beta Users</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">0</dd>
									</div>

									<div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Raised</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">$0M</dd>
									</div> -->
								</dl>
								<div class="mt-10">
									<a class="text-base font-medium text-rose-500" href="#">Learn more about how we're
										changing the world&nbsp&rarr;</a>
								</div>
							</div>
						</div>
					</div>
				</div>


<div class="pt-8 overflow-hidden sm:pt-12 lg:relative lg:py-48">
					<div
						class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24">
						<div>
							<div class="mt-20">
								<div class="mt-6 sm:max-w-xl">
									<h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Functionalities</h1>
									
									<div class="mt-6 text-xl text-gray-500">
										<li>Dashboard shows statistical graphs and students overview.</li>
										<li>Generate a random attendance code that expires after a certain period of time.</li>
										<li>Open and close buttons to keen attendance for the class.</li>
										<li>View the attendance history of a specific student.</li>
										<li>Export the attendance records to CSV.</li>
										<li>Filter the students in the module based on their performance.</li>
										<li>Allow students to view their own attendance history.</li>
										<li>Allow attendance marking by QR code.</li>
										<li>Students can submit MC if they miss a class through the web application.</li>
										<li>Teachers are able to edit previous attendance records.</li>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="sm:mx-auto sm:max-w-3xl sm:px-6">
						<div class="py-12 sm:relative sm:mt-12 sm:py-16 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
							<div class="hidden sm:block">
								<div
									class="absolute inset-y-0 left-1/2 w-screen bg-gray-50 rounded-l-3xl lg:left-80 lg:right-0 lg:w-full">
								</div>
								<svg class="absolute top-8 right-1/2 -mr-3 lg:m-0 lg:left-0" fill="none" height="392"
									viewBox="0 0 404 392" width="404">
									<defs>
										<pattern height="20" id="837c3e70-6c3a-44e6-8854-cc48c737b659"
											patternUnits="userSpaceOnUse" width="20" x="0" y="0">
											<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0"
												y="0" />
										</pattern>
									</defs>
									<rect fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)" height="392" width="404" />
								</svg>
							</div>
							<div
								class="relative pl-4 -mr-40 sm:mx-auto sm:max-w-3xl sm:px-0 lg:max-w-none lg:h-full lg:pl-12">
								<img alt
									class="w-full rounded-md shadow-xl ring-1 ring-black ring-opacity-5 lg:h-full lg:w-auto lg:max-w-none"
									src="/images/studentDashboard.png" />
							</div>
						</div>
					</div>
				</div>

				<!-- Testimonial/stats section -->
				<div class="relative mt-20">
					<div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
						<div class="relative sm:py-16 lg:py-0">
							<div aria-hidden="true"
								class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
								<div class="absolute inset-y-0 right-1/2 w-full bg-gray-50 rounded-r-3xl lg:right-72">
								</div>
								<svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12"
									fill="none" height="392" viewBox="0 0 404 392" width="404">
									<defs>
										<pattern height="20" id="02f20b47-fd69-4224-a62a-4c9de5c763f7"
											patternUnits="userSpaceOnUse" width="20" x="0" y="0">
											<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0"
												y="0" />
										</pattern>
									</defs>
									<rect fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)" height="392" width="404" />
								</svg>
							</div>
							<div
								class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
								<img src="/images/databaseDesign.png" alt="" class="rounded-3xl">
							</div>
						</div>

						<div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
							<!-- Content area -->
							<div class="pt-12 sm:pt-16 lg:pt-20">
								<h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">Database Design</h2>
								<div class="mt-6 text-gray-500 space-y-6">
									<p class="text-lg">
										There are 5 relational tables for our system which are students, teachers, modules, attendances and mc_students.
										Each one of the tables consists of the ID and created_at, updated_at columns for keeping track of the history of the data.
										The student’s table belongs to the module table so that we know which students have which modules and so on.
										The teacher's table belongs to the module table as well so that we know which teacher is teaching which modules.
										The Modules' table belongs to both students and teachers for the reasons above.
										The attendance table belongs to both the modules and student’s tables, so we know if students have taken attendance in which modules.
										Mc_student's table belongs to the student's table, so we know if students have MC or not.
									</p>
								</div>
							</div>

							
						</div>
					</div>
				</div>



				<!-- Logo cloud section -->
				<div class="mt-32">
					<div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
						<div class="lg:grid lg:grid-cols-2 lg:gap-24 lg:items-center">
							<div>
								<h2 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">Frameworks</h2>
								<p class="mt-6 max-w-3xl text-lg leading-7 text-gray-500">
									<li>Larabel</li>
									<li>Vue 3</li>
								</p>
								<div class="mt-6">
									<a class="text-base font-medium text-rose-500" href="#">See the frameworks&nbsp&rarr;</a>
								</div>
							</div>
							<div>
								<img src="/images/vueLaravel.jpeg" alt="" class="rounded-3xl">
							</div>
							<!-- <div class="mt-12 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-0 lg:grid-cols-2">
								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Transistor" class="max-h-12"
										src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Mirage" class="max-h-12"
										src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Tuple" class="max-h-12"
										src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Laravel" class="max-h-12"
										src="https://tailwindui.com/img/logos/laravel-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="StaticKit" class="max-h-12"
										src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Workcation" class="max-h-12"
										src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" />
								</div>
							</div> -->
						</div>
					</div>
				</div>

				<!-- CTA section -->
				<div class="relative mt-24 sm:mt-32 sm:py-16">
					<div aria-hidden="true" class="hidden sm:block">
						<div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50 rounded-r-3xl"></div>
						<svg class="absolute top-8 left-1/2 -ml-3" fill="none" height="392" viewBox="0 0 404 392"
							width="404">
							<defs>
								<pattern height="20" id="8228f071-bcee-4ec8-905a-2a059a2cc4fb"
									patternUnits="userSpaceOnUse" width="20" x="0" y="0">
									<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0" y="0" />
								</pattern>
							</defs>
							<rect fill="url(#8228f071-bcee-4ec8-905a-2a059a2cc4fb)" height="392" width="404" />
						</svg>
					</div>
					<div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
						<div
							class="relative rounded-2xl px-6 py-10 bg-indigo-500 overflow-hidden shadow-xl sm:px-12 sm:py-20">
							<div aria-hidden="true" class="absolute inset-0 -mt-72 sm:-mt-32 md:mt-0">
								<svg class="absolute inset-0 h-full w-full" fill="none"
									preserveAspectRatio="xMidYMid slice" viewBox="0 0 1463 360"
									xmlns="http://www.w3.org/2000/svg">
									<path class="text-indigo-400 text-opacity-40"
										d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z"
										fill="currentColor" />
									<path class="text-indigo-600 text-opacity-40"
										d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z"
										fill="currentColor" />
								</svg>
							</div>
							<div class="relative">
								<div class="sm:text-center">
									<h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Get
										notified when we&rsquo;re launching.</h2>
									<p class="mt-6 mx-auto max-w-2xl text-lg text-rose-100">Sagittis scelerisque nulla
										cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique
										pellentesque.</p>
								</div>
								<form action="#" class="mt-12 sm:mx-auto sm:max-w-lg sm:flex">
									<div class="min-w-0 flex-1">
										<label class="sr-only" for="cta-email">Email address</label>
										<input
											class="block w-full border border-transparent rounded-md px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-rose-500"
											id="cta-email" placeholder="Enter your email" type="email" />
									</div>
									<div class="mt-4 sm:mt-0 sm:ml-3">
										<button
											class="block w-full rounded-md border border-transparent px-5 py-3 bg-gray-900 text-base font-medium text-white shadow hover:bg-black focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-rose-500 sm:px-10"
											type="submit">Notify me</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</main>

			<!-- Footer section -->
			<footer class="mt-24 bg-gray-900 sm:mt-12">
				<div class="mx-auto max-w-md py-12 px-4 overflow-hidden sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
					<!-- <nav aria-label="Footer" class="-mx-5 -my-2 flex flex-wrap justify-center">
						<div class="px-5 py-2">
							<a class="text-base text-gray-400 hover:text-gray-300" href="#">About</a>
						</div>

						<div class="px-5 py-2">
							<a class="text-base text-gray-400 hover:text-gray-300" href="#">Features</a>
						</div>

						<div class="px-5 py-2">
							<a class="text-base text-gray-400 hover:text-gray-300" href="#">Partners</a>
						</div>
					</nav> -->

					<p class="mt-8 text-center text-base text-gray-400">&copy; 2022 SAMS, Inc. All rights reserved.</p>
				</div>
			</footer>
		</div>
	</section>
</template>
