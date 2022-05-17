<template>
  <div class="min-h-screen flex items-center justify-center">
    <loading-circle-svg class="w-1/3 h-auto text-wine self-center" />
  </div>
</template>

<script>
import { useRoute } from 'vue-router'
import { getEmail, updateEmail } from './../../api/emails'
import { getNotification } from './../../api/notifications'
import LoadingCircleSvg from './../../svg/LoadingCircle.vue'

export default {
  components: { LoadingCircleSvg },
  setup() {
    const route = useRoute()
    const fetchEmail = async () => {
      const email = await getEmail(route.params.email)
      if (!email.verified_at) {
        const verified_at = new Date()
        email.verified_at = verified_at.toISOString().slice(0, 19).replace('T', ' ')
        await updateEmail(email)
      }
      const notification = await getNotification(email.notification_id)
      window.location.href = notification.document
    }
    fetchEmail()
  },

}
</script>
