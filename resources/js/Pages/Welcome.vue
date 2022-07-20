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
					<div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24">
						<div>
							<div>
								<img alt="Sams" class="h-16 w-auto rounded-lg" src="/images/SAMS-01.png" />
							</div>
							<div class="mt-20">
								<div>
									<a class="inline-flex space-x-4" href="#">
										<span class="rounded bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-500 tracking-wide uppercase">What's new</span>
									</a>
								</div>
								<div class="mt-6 sm:max-w-xl">
									<h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Issue management for growing teams</h1>
									<p class="mt-6 text-xl text-gray-500">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="sm:mx-auto sm:max-w-3xl sm:px-6">
						<div class="py-12 sm:relative sm:mt-12 sm:py-16 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
							<div class="hidden sm:block">
								<div class="absolute inset-y-0 left-1/2 w-screen bg-gray-50 rounded-l-3xl lg:left-80 lg:right-0 lg:w-full"></div>
								<svg class="absolute top-8 right-1/2 -mr-3 lg:m-0 lg:left-0" fill="none" height="392" viewBox="0 0 404 392" width="404">
									<defs>
										<pattern height="20" id="837c3e70-6c3a-44e6-8854-cc48c737b659" patternUnits="userSpaceOnUse" width="20" x="0" y="0">
											<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0" y="0" />
										</pattern>
									</defs>
									<rect fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)" height="392" width="404" />
								</svg>
							</div>
							<div class="relative pl-4 -mr-40 sm:mx-auto sm:max-w-3xl sm:px-0 lg:max-w-none lg:h-full lg:pl-12">
								<img alt class="w-full rounded-md shadow-xl ring-1 ring-black ring-opacity-5 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/task-app-rose.jpg" />
							</div>
						</div>
					</div>
				</div>

				<!-- Testimonial/stats section -->
				<div class="relative mt-20">
					<div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
						<div class="relative sm:py-16 lg:py-0">
							<div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
								<div class="absolute inset-y-0 right-1/2 w-full bg-gray-50 rounded-r-3xl lg:right-72"></div>
								<svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" fill="none" height="392" viewBox="0 0 404 392" width="404">
									<defs>
										<pattern height="20" id="02f20b47-fd69-4224-a62a-4c9de5c763f7" patternUnits="userSpaceOnUse" width="20" x="0" y="0">
											<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0" y="0" />
										</pattern>
									</defs>
									<rect fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)" height="392" width="404" />
								</svg>
							</div>
							<div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
								<!-- Testimonial card-->
								<div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
									<img alt class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1521510895919-46920266ddb3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&fp-x=0.5&fp-y=0.6&fp-z=3&width=1440&height=1440&sat=-100" />
									<div class="absolute inset-0 bg-rose-500 mix-blend-multiply"></div>
									<div class="absolute inset-0 bg-gradient-to-t from-rose-600 via-rose-600 opacity-90"></div>
									<div class="relative px-8">
										<div>
											<img alt="Workcation" class="h-12" src="https://tailwindui.com/img/logos/workcation.svg?color=white" />
										</div>
										<blockquote class="mt-8">
											<div class="relative text-lg font-medium text-white md:flex-grow">
												<svg aria-hidden="true" class="absolute top-0 left-0 transform -translate-x-3 -translate-y-2 h-8 w-8 text-rose-400" fill="currentColor" viewBox="0 0 32 32">
													<path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
												</svg>
												<p class="relative">Tincidunt integer commodo, cursus etiam aliquam neque, et. Consectetur pretium in volutpat, diam. Montes, magna cursus nulla feugiat dignissim id lobortis amet.</p>
											</div>

											<footer class="mt-4">
												<p class="text-base font-semibold text-rose-200">Sarah Williams, CEO at Workcation</p>
											</footer>
										</blockquote>
									</div>
								</div>
							</div>
						</div>

						<div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
							<!-- Content area -->
							<div class="pt-12 sm:pt-16 lg:pt-20">
								<h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">On a mission to empower teams</h2>
								<div class="mt-6 text-gray-500 space-y-6">
									<p class="text-lg">Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi. Cursus faucibus nunc nisl netus morbi vel porttitor vitae ut. Amet vitae fames senectus vitae.</p>
									<p class="text-base leading-7">Sollicitudin tristique eros erat odio sed vitae, consequat turpis elementum. Lorem nibh vel, eget pretium arcu vitae. Eros eu viverra donec ut volutpat donec laoreet quam urna. Sollicitudin tristique eros erat odio sed vitae, consequat turpis elementum. Lorem nibh vel, eget pretium arcu vitae. Eros eu viverra donec ut volutpat donec laoreet quam urna.</p>
									<p class="text-base leading-7">Rhoncus nisl, libero egestas diam fermentum dui. At quis tincidunt vel ultricies. Vulputate aliquet velit faucibus semper. Pellentesque in venenatis vestibulum consectetur nibh id. In id ut tempus egestas. Enim sit aliquam nec, a. Morbi enim fermentum lacus in. Viverra.</p>
								</div>
							</div>

							<!-- Stats section -->
							<div class="mt-10">
								<dl class="grid grid-cols-2 gap-x-4 gap-y-8">
									<div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Founded</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">2021</dd>
									</div>

									<div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Employees</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">5</dd>
									</div>

									<div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Beta Users</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">521</dd>
									</div>

									<div class="border-t-2 border-gray-100 pt-6">
										<dt class="text-base font-medium text-gray-500">Raised</dt>
										<dd class="text-3xl font-extrabold tracking-tight text-gray-900">$25M</dd>
									</div>
								</dl>
								<div class="mt-10">
									<a class="text-base font-medium text-rose-500" href="#">Learn more about how we're changing the world&nbsp&rarr;</a>
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
								<h2 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">Backed by world-renowned investors</h2>
								<p class="mt-6 max-w-3xl text-lg leading-7 text-gray-500">Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi. Cursus faucibus nunc nisl netus morbi vel porttitor vitae ut. Amet vitae fames senectus vitae.</p>
								<div class="mt-6">
									<a class="text-base font-medium text-rose-500" href="#">Meet our investors and advisors&nbsp&rarr;</a>
								</div>
							</div>
							<div class="mt-12 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-0 lg:grid-cols-2">
								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Transistor" class="max-h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Mirage" class="max-h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Tuple" class="max-h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Laravel" class="max-h-12" src="https://tailwindui.com/img/logos/laravel-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="StaticKit" class="max-h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" />
								</div>

								<div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
									<img alt="Workcation" class="max-h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" />
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- CTA section -->
				<div class="relative mt-24 sm:mt-32 sm:py-16">
					<div aria-hidden="true" class="hidden sm:block">
						<div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50 rounded-r-3xl"></div>
						<svg class="absolute top-8 left-1/2 -ml-3" fill="none" height="392" viewBox="0 0 404 392" width="404">
							<defs>
								<pattern height="20" id="8228f071-bcee-4ec8-905a-2a059a2cc4fb" patternUnits="userSpaceOnUse" width="20" x="0" y="0">
									<rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0" y="0" />
								</pattern>
							</defs>
							<rect fill="url(#8228f071-bcee-4ec8-905a-2a059a2cc4fb)" height="392" width="404" />
						</svg>
					</div>
					<div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
						<div class="relative rounded-2xl px-6 py-10 bg-indigo-500 overflow-hidden shadow-xl sm:px-12 sm:py-20">
							<div aria-hidden="true" class="absolute inset-0 -mt-72 sm:-mt-32 md:mt-0">
								<svg class="absolute inset-0 h-full w-full" fill="none" preserveAspectRatio="xMidYMid slice" viewBox="0 0 1463 360" xmlns="http://www.w3.org/2000/svg">
									<path class="text-indigo-400 text-opacity-40" d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z" fill="currentColor" />
									<path class="text-indigo-600 text-opacity-40" d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z" fill="currentColor" />
								</svg>
							</div>
							<div class="relative">
								<div class="sm:text-center">
									<h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Get notified when we&rsquo;re launching.</h2>
									<p class="mt-6 mx-auto max-w-2xl text-lg text-rose-100">Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque.</p>
								</div>
								<form action="#" class="mt-12 sm:mx-auto sm:max-w-lg sm:flex">
									<div class="min-w-0 flex-1">
										<label class="sr-only" for="cta-email">Email address</label>
										<input class="block w-full border border-transparent rounded-md px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-rose-500" id="cta-email" placeholder="Enter your email" type="email" />
									</div>
									<div class="mt-4 sm:mt-0 sm:ml-3">
										<button class="block w-full rounded-md border border-transparent px-5 py-3 bg-gray-900 text-base font-medium text-white shadow hover:bg-black focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-rose-500 sm:px-10" type="submit">Notify me</button>
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
					<nav aria-label="Footer" class="-mx-5 -my-2 flex flex-wrap justify-center">
						<div class="px-5 py-2">
							<a class="text-base text-gray-400 hover:text-gray-300" href="#">About</a>
						</div>

						<div class="px-5 py-2">
							<a class="text-base text-gray-400 hover:text-gray-300" href="#">Features</a>
						</div>

						<div class="px-5 py-2">
							<a class="text-base text-gray-400 hover:text-gray-300" href="#">Partners</a>
						</div>
					</nav>

					<p class="mt-8 text-center text-base text-gray-400">&copy; 2022 SAMS, Inc. All rights reserved.</p>
				</div>
			</footer>
		</div>
	</section>
</template>
