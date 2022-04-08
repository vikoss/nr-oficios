<template>
  <input
    :id="id"
    :checked="modelValue"
    class="h-6 w-6 bg-no-repeat bg-center bg-contain appearance-none outline-0 align-middle mr-3"
    :class="{ 'bg-checkbox-not-checked': !modelValue, 'bg-checkbox-checked': !!modelValue }"
    type="checkbox"
    @input="(event) => $emit('update:modelValue', event.target.checked)"
  >
  <label
    class="text-base text-blue font-normal"
    :for="id"
  >
    {{ label }}
  </label>
</template>

<script>
export default {
  name: 'CheckBoxBase',
  props: {
    id: {
      type: String,
      default: '',
    },
    label: {
      type: String,
      default: '',
    },
    modelValue: {
      type: Boolean,
      default: false,
    },
  },
  emits: ['update:modelValue'],
}
</script>
