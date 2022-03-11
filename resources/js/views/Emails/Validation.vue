<template>
  <h1>Gracias por avisar de recibido.</h1>
</template>

<script>
import { reactive } from 'vue'
import { useRoute } from 'vue-router'
import { getEmail, updateEmail } from './../../api/emails'

export default {
  setup() {
    console.log('vaaa');
    const route = useRoute()
    const fetchEmail = async () => {
      const email = await getEmail(route.params.email)
      if (email.verified_at) {
        alert(`Ya habias notificado de recibido el: ${email.verified_at}`)
      } else {
        const verified_at = new Date()
        email.verified_at = verified_at.toISOString().slice(0, 19).replace('T', ' ')
        await updateEmail(email)
        alert('Listo ya se aviso que recibiste la notificacion.')
      }
      console.log(email)
    }
    fetchEmail()

    return { }
  },

}
</script>

<style>

</style>