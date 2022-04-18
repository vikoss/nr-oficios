<template>
  <header class="bg-wine h-20 flex flex-col justify-center">
    <ul class="flex justify-between">
      <li class="ml- ml-11">
        <router-link :to="{ name: 'Home' }" class="text-white text-xl">
          Inicio
        </router-link>
      </li>
      <li class="mr-11">
        <div class="flex items-center relative">
          <p class="mr-3 text-white text-sm sm:text-base font-light">
            {{ user.email }}
          </p>
          <arrow-bottom-svg class="mt-1 cursor-pointer w-4 h-4" @click="app.showWindowLogOut = !app.showWindowLogOut" />
        </div>
        <div v-show="app.showWindowLogOut" class="text-right absolute right-10">
          <input class="bg-white px-3 py-1 text-base hover:bg-gray-300 cursor-pointer rounded-sm shadow-lg shadow-wine" type="button" value="Salir" @click="logOut">
        </div>
      </li>
    </ul>
  </header>
</template>

<script>
import ArrowBottomSvg from './../svg/ArrowBottom.vue'
import { currentUser } from './../helpers/localStorage'
import { reactive } from 'vue'
import { logout } from './../api/authenticate'
import { useRouter } from 'vue-router'

export default {
  name: 'HeaderBase',
  components: { ArrowBottomSvg },
  setup() {
    const router = useRouter()
    const app = reactive({
      showWindowLogOut: false,
    })
    const user = reactive(currentUser())
    const logOut = async () => {
      await logout()
      router.push({ name: 'Login' })
    }

    return { user, logOut, app }
  },
}
</script>
