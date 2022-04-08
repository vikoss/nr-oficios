<template>
  <svg id="Componente_280_1" data-name="Componente 280 – 1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path id="Shape" d="M16,18H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H16a2,2,0,0,1,2,2V16A2,2,0,0,1,16,18ZM2,2V16H16V2Z" transform="translate(3 3)" :fill="hexColor"/>
  <rect id="Boundary" width="24" height="24" fill="none"/>
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
