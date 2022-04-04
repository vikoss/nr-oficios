<template>
  <label
    :for="id"
    class="bg-wine rounded-md text-white text-base
    font-bold flex justify-center items-center h-10 cursor-pointer"
  >
    <input
      class="hidden"
      type="file"
      :accept="accept"
      @change="onChange"
      :name="id"
      :id="id"
    >
    <cloud-svg class="mr-3.5 h-6 w-6" />
    Agregar archivo
  </label>
</template>

<script>
import CloudSvg from './../svg/Cloud.vue'

export default {
  props: {
    id: {
      type: String,
      default: 'file_passport',
    },
    accept: {
      type: String,
      default: '.pdf'
    },
  },
  components: { CloudSvg },
  setup(props, { emit }) {
    const onChange = ({ target }) => {
      emit('file', { value: target.files[0], name: props.id })
    };

    return { onChange }
  },
};
</script>
