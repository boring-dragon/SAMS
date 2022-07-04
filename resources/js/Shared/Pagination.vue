<template>
	<div v-if="links.length > 3">
		<div class="flex flex-wrap -mb-1">
			<template v-for="(link, key) in links">
				<div :key="key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" v-if="link.url === null" />
				<Link :class="{ 'bg-white': link.active }" :href="link.url" :key="'else_' + key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-gray-500 focus:text-gray-500" v-else v-html="link.label" />
			</template>
		</div>
	</div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: {
    links: Array,
  },
  components: {
    Link,
  },
};
</script>
