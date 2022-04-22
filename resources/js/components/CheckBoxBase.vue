<template>
  <input
    :id="id"
    :checked="modelValue"
    class="h-6 w-6 bg-no-repeat bg-center bg-contain appearance-none outline-0 align-middle cursor-pointer"
    :class="{ 'bg-checkbox-not-checked': !modelValue, 'bg-checkbox-checked': !!modelValue, 'mr-3': !small }"
    type="checkbox"
    @input="(event) => $emit('update:modelValue', event.target.checked)"
  >
  <label
    class="font-normal"
    :class="{ 'text-xs': small, 'text-base': !small, 'text-gray': !modelValue, 'text-black': modelValue }"
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
    small: {
      type: Boolean,
      default: false,
    },
  },
  emits: ['update:modelValue'],
}
</script>
