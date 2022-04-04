<template>
  <table class="w-full text-center border-separate" style="border-spacing: 20px;">
    <tr>
      <th class="text-wine" v-for="(header, index) in headers" :key="index">{{ header.label }}</th>
    </tr>
    <tr
      class="h-16 rounded-md hover:underline cursor-pointer rounded-l-md"
      style="box-shadow: 0px 0px 16px #00000029;"
      v-for="(item, index) in data"
      :key="index"
      @click="action(item.id)"
    >
      <td v-for="(header, index) in headers" :key="index">
        {{ item[header.name] }}
      </td>
    </tr>
  </table>
</template>

<script>
export default {
  name: 'TableBase',
  props: {
    headers: {
      type: Array,
      default: () => [],
    },
    data: {
      type: Array,
      default: () => [],
    },
    action: {
      type: Function,
      default: () => ({}),
    },
  },
}
</script>

<style scoped>

td:first-child {
  border-left-width: 12px;
  border-color: #54191b;
  border-top-left-radius: 0.375rem;
  border-bottom-left-radius: 0.375rem;
}

</style>