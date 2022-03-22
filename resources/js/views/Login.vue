<template>
  <div>
    <input v-model="credentials.email" type="text" name="email" id="email">
    <input v-model="credentials.password" type="password" name="password" id="password">
    <input type="button" value="Entrar" @click="login">
  </div>
</template>

<script>
import { reactive } from 'vue'
import { authenticate } from './../api/authenticate'
import { useRouter } from 'vue-router'

export default {
  name: 'Login',
  setup() {
    const router = useRouter()
    const credentials = reactive({
      email: '',
      password: '',
    })

    const login = async () => {
      await authenticate(credentials)
      router.push({ name: 'Home' })

    }

    return { credentials, login };
  },

}
</script>

<style>

</style>