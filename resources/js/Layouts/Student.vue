<script>
import { ref } from "vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useToast } from "vue-toastification";

export default {
  components: {
    BreezeApplicationLogo,
    BreezeDropdown,
    BreezeDropdownLink,
    BreezeNavLink,
    BreezeResponsiveNavLink,
    Link
  },
  watch: {
    "$page.props.flash": {
      handler() {
        const timeout = 1000;
        if (this.$page.props.flash.success) {
          this.toast.success(this.$page.props.flash.success, {
            timeout: timeout,
          });
        }

        if (this.$page.props.flash.info) {
          this.toast.info(this.$page.props.flash.info, { timeout: timeout });
        }

        if (
          this.$page.props.flash.error ||
          Object.keys(this.$page.props.errors).length > 0
        ) {
          if (this.$page.props.flash.error) {
            this.toast.error(this.$page.props.flash.error, {
              timeout: timeout,
            });
          }
        }
      },
      deep: true,
    },
  },
  setup() {
    const showingNavigationDropdown = ref(false);

    return {
      showingNavigationDropdown,
    };
  },
};
</script>

<template>
	<div>
		<div class="min-h-screen bg-gray-100">
			<nav class="bg-white border-b border-gray-100">
				<!-- Primary Navigation Menu -->
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
					<div class="flex justify-between h-16">
						<div class="flex">
							<!-- Logo -->
							<div class="shrink-0 flex items-center uppercase">
								<Link :href="route('student.dashboard')">
									<h2 class="text-5xl font-extrabold text-indigo-500">SAMS</h2>
								</Link>
							</div>

							<!-- Navigation Links -->
							<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
								<BreezeNavLink :active="route().current('student.dashboard')" :href="route('student.dashboard')">Dashboard</BreezeNavLink>

								<BreezeNavLink :active="route().current('student.modules.index')" :href="route('student.modules.index')">Modules</BreezeNavLink>

								<BreezeNavLink :active="route().current('student.classes.index')" :href="route('student.classes.index')">Classes</BreezeNavLink>

								<BreezeNavLink :active="route().current('student.attendance.index')" :href="route('student.attendance.index')">Attendance</BreezeNavLink>

								<BreezeNavLink :active="route().current('student.medicalCertificate.index')" :href="route('student.medicalCertificate.index')">Medical Certificate</BreezeNavLink>
							</div>
						</div>

						<div class="hidden sm:flex sm:items-center sm:ml-6">
							<!-- Settings Dropdown -->
							<div class="ml-3 relative">
								<BreezeDropdown align="right" width="48">
									<template #trigger>
										<span class="inline-flex rounded-md">
											<button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" type="button">
												{{ $page.props.auth.user.name }}
												<svg class="ml-2 -mr-0.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
													<path clip-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" fill-rule="evenodd" />
												</svg>
											</button>
										</span>
									</template>

									<template #content>
										<BreezeDropdownLink :href="route('logout')" as="button" method="post">Log Out</BreezeDropdownLink>
									</template>
								</BreezeDropdown>
							</div>
						</div>

						<!-- Hamburger -->
						<div class="-mr-2 flex items-center sm:hidden">
							<button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
								<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
									<path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
								</svg>
							</button>
						</div>
					</div>
				</div>

				<!-- Responsive Navigation Menu -->
				<div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
					<div class="pt-2 pb-3 space-y-1">
						<BreezeResponsiveNavLink :active="route().current('student.dashboard')" :href="route('student.dashboard')">Dashboard</BreezeResponsiveNavLink>

						<BreezeResponsiveNavLink :active="route().current('student.modules.index')" :href="route('student.modules.index')">Modules</BreezeResponsiveNavLink>

						<BreezeResponsiveNavLink :active="route().current('student.modules.index')" :href="route('student.modules.index')">Classes</BreezeResponsiveNavLink>

						<BreezeResponsiveNavLink :active="route().current('student.attendance.index')" :href="route('student.attendance.index')">Attendance</BreezeResponsiveNavLink>

						<BreezeNavLink :active="route().current('student.medicalCertificate.index')" :href="route('student.medicalCertificate.index')">Medical Certificate</BreezeNavLink>
					</div>

					<!-- Responsive Settings Options -->
					<div class="pt-4 pb-1 border-t border-gray-200">
						<div class="px-4">
							<div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
							<div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
						</div>

						<div class="mt-3 space-y-1">
							<BreezeResponsiveNavLink :href="route('logout')" as="button" method="post">Log Out</BreezeResponsiveNavLink>
						</div>
					</div>
				</div>
			</nav>

			<!-- Page Heading -->
			<header class="shadow bg-indigo-500" v-if="$slots.header">
				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
					<slot name="header" />
				</div>
			</header>

			<!-- Page Content -->
			<main>
				<slot />
			</main>
		</div>
	</div>
</template>
