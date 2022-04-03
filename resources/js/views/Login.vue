<template>
  <main class="flex flex-wrap min-h-screen">
    <div class="flex-grow py-7 px-6 sm:px-16 sm:pt-36 relative bg-wine" style="flex-basis: 540px;">
      <h1 class="text-white font-medium text-4xl sm:text-6xl">
        Bienvenido
        <br> a
        <strong class="text-gray-100 font-bold">Circulares-Web</strong>
      </h1>
      <h2 class="text-white text-base sm:text-xl lg:absolute sm:bottom-24">
        Nos renovamos para ofrecerte
        <strong class="font-bold text-gray-100">un mejor servicio.</strong>
      </h2>
    </div>
    <div class="flex-grow py-7 px-6 sm:px-16 sm:pt-36 bg-white" style="flex-basis: 540px;">
      <h1 class="text-3xl text-blue font-medium mb-2 text-wine">
        Inicia sesión
      </h1>
      <h2 class="text-base text-black font-normal mb-10 tracking-wide">
        Ingresa los datos que se te solicitan a continuación para iniciar sesión.
      </h2>
      <input-base
        id="email"
        v-model="credentials.email"
        label="Correo:"
      />
      <input-base
        id="password"
        v-model="credentials.password"
        type="password"
        label="Contraseña:"
        class="mt-2 mb-9"
      />
      <button-base
        class="sm:max-w-sm ml-auto mr-0"
        label="Entrar"
        :loading="app.loading"
        @click="login"
        :disabled="app.disabled"
      />
    </div>
  </main>
</template>

<script>
import { computed, reactive } from 'vue'
import { authenticate, me } from './../api/authenticate'
import { useRouter } from 'vue-router'
import ButtonBase from './../components/ButtonBase.vue'
import InputBase from './../components/InputBase.vue'


export default {
  name: 'Login',
  components: { InputBase, ButtonBase, },
  setup() {
    const router = useRouter()

    const credentials = reactive({
      email: '',
      password: '',
    })
    const app = reactive({
      loading: false,
      disabled: computed(() => !credentials.email || !credentials.password),
    })

    const login = async () => {
      app.loading = true
      await authenticate(credentials)
      await me()
      app.loading = false
      router.push({ name: 'Home' })
    }

    return { credentials, login, app };
  },

}
</script>

<style>

</style>