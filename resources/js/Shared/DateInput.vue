<template>
	<div>
		<label class="block text-sm font-medium text-gray-700" v-if="label">
			<span>{{ label }}</span>
		</label>

		<div class="relative mt-1 rounded-md">
			<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
				<svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
				</svg>
			</div>
			<flatpickr :config="options" class="block w-full pl-10 border border-gray-300 form-input rounded-md sm:text-sm focus:ring-0 focus:border-green-500" ref="input" v-model="dataValue" />
		</div>

		<div v-if="error">
			<p class="mt-2 text-sm text-red-600">{{ error }}</p>
		</div>
	</div>
</template>

<script>
import Flatpickr from "vue-flatpickr-component";
import "flatpickr/dist/flatpickr.css";
import { defaults } from "lodash";

export default {
  props: {
    id: {
      type: String,
      default() {
        return `date-input-1`;
      },
    },
    modelValue: {
      required: true,
    },
    value: String,
    label: String,
    error: String,
    config: Object,
  },

  components: {
    Flatpickr,
  },

  data() {
    return {
      dataValue: null,
    };
  },

  watch: {
    dataValue: {
      handler() {
        this.$emit("update:modelValue", this.dataValue);
      },
      deep: true,
    },
  },

  methods: {
    focus() {
      this.$refs.input.focus();
    },
  },

  computed: {
    options() {
      return defaults(this.config, {
        wrap: true, // set wrap to true only when using 'input-group'
        altFormat: "Y-m-d",
        altInput: true,
        defaultDate: null,
        enableTime: true,
        dateFormat: "Y-m-d",
      });
    },
  },
};
</script>
<style>
.flatpickr-day.selected,
.flatpickr-day.selected:hover {
  border-color: #22c55e;
  background: #22c55e;
}
</style>
