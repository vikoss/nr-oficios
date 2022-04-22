<template>
  <header class="bg-wine h-20 flex flex-col justify-center">
    <ul class="flex justify-between">
      <li class="ml-11">
        <router-link :to="{ name: 'Home' }">
          <img src="./../../../public/images/logo-nr.png" alt="logo" class="h-16">
        </router-link>
      </li>
      <li class="mr-11">
        <div class="flex justify-center h-full relative">
          <div class="flex items-center">
            <p class="mr-3 text-white text-sm sm:text-base font-light">
              {{ user.email }}
            </p>
            <arrow-bottom-svg class="mt-1 cursor-pointer w-4 h-4" @click="app.showWindowLogOut = !app.showWindowLogOut" />
          </div>
          <div v-show="app.showWindowLogOut" class="text-right absolute top-12 right-0">
            <input class="bg-white px-4 py-1 text-base hover:bg-gray-300 cursor-pointer rounded-sm shadow-lg shadow-wine" type="button" value="Salir" @click="logOut">
          </div>
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
