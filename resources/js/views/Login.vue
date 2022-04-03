<template>
  <div>
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
    />
    <button-base
      label="Entrar"
      :loading="false"
      @click="login"
    />
  </div>
</template>

<script>
import { reactive } from 'vue'
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

    const login = async () => {
      await authenticate(credentials)
      await me()
      router.push({ name: 'Home' })
    }

    return { credentials, login };
  },

}
</script>

<style>

</style>