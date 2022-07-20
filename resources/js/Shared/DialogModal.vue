<script setup>
import Modal from "./BaseModal.vue";

const emit = defineEmits(["close"]);

const props = defineProps({
  show: {
    default: false,
  },
  maxWidth: {
    default: "2xl",
  },
  closeable: {
    default: true,
  },
});

function close() {
  emit("close");
}
</script>


<template>
	<modal :closeable="props.closeable" :max-width="props.maxWidth" :show="props.show" @close="close">
		<div class="px-6 py-4">
			<div class="text-lg">
				<slot name="title"></slot>
			</div>

			<div class="mt-4">
				<slot name="content"></slot>
			</div>
		</div>

		<div class="px-6 py-4 bg-gray-100 text-right">
			<slot name="footer"></slot>
		</div>
	</modal>
</template>
