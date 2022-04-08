<template>
  <svg id="Componente_280_1" data-name="Componente 280 – 1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <rect id="Boundary" width="24" height="24" fill="none"/>
  <path id="ic_check_box_24px" d="M19,3H5A2,2,0,0,0,3,5V19a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2V5A2,2,0,0,0,19,3ZM10,17,5,12l1.41-1.41L10,14.17l7.59-7.59L19,8Z" :fill="hexColor"/>
</svg>

</template>

<script>
export default {
  name: 'CheckBoxCheched',
  props: {
    hexColor: {
      type: String,
      default: '#54191b',
    },
  },
}
</script>
