<script setup>

defineEmits(['update:modelValue']);

const props = defineProps({
  modelValue: {
    required: false,
  },
});
</script>
<template>
	<div class="flex-1 pr-4">
		<div class="relative md:w-1/3">
			<input :value="props.modelValue" @input="$emit('update:modelValue', $event.target.value)" autocomplete="off" class="text-sm w-full border border-gray-200 pl-10 pr-4 py-2 rounded-lg focus:outline-none focus:shadow-outline text-gray-600 font-normal focus:ring-main focus:border-main" name="search" placeholder="Search..." type="text" />
			<div class="absolute top-0 left-0 inline-flex items-center p-2">
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					<rect height="24" stroke="none" width="24" x="0" y="0" />
					<circle cx="10" cy="10" r="7" />
					<line x1="21" x2="15" y1="21" y2="15" />
				</svg>
			</div>
		</div>
	</div>
</template>

