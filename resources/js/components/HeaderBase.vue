<template>
  <header class="bg-wine h-20 flex flex-col justify-center">
    <ul class="flex justify-between">
      <li class="ml- ml-11">
        <router-link :to="{ name: 'Home' }" class="text-white text-xl">
          Inicio
        </router-link>
      </li>
      <li class="mr-11">
        <div class="flex items-center">
          <p class="mr-3 text-white text-sm sm:text-lg font-light">
            {{ user.email }}
          </p>
          <arrow-bottom-svg class="mt-1 cursor-pointer" />
        </div>
      </li>
    </ul>
  </header>
</template>

<script>
import { inject } from 'vue'
import ArrowBottomSvg from './../svg/ArrowBottom.vue'

export default {
  name: 'HeaderBase',
  components: { ArrowBottomSvg },
  setup() {
    const user = inject('currentUser', {})

    return { user }
  },
}
</script>
