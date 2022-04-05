<template>
  <router-view />
</template>

<script>
import { provide, reactive } from 'vue'
import { currentUser } from './helpers/localStorage'

export default {
  name: 'HeaderBase',
  setup() {
    const user = reactive(currentUser())
    provide('currentUser', user)
  },
}
</script>
