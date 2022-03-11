<template>
  <h1>Detalles de notification</h1>
  <div v-if="notification.item">
    <h1>Notificacion:</h1>
    <p>{{ notification.item.document }}</p>
  </div>
  <div v-if="notification.emails">
    <h1>Emails notificados:</h1>
    <div v-for="email in notification.emails" :key="email.id">
      <span style="border: 2px solid aqua; display: block;"></span>
      <p>
        Para:
        <strong>{{ email.to }}</strong>
      </p>
      <p>
        Enviado el:
        <strong>{{ email.sent_at }}</strong>
      </p>
      <p>
        Validado de recibido:
        <strong>{{ email.verified_at ? 'Si' : 'No' }}</strong>
      </p>
    </div>
  </div>
</template>

<script>
import { reactive } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getNotification, getEmailsNotification } from './../../api/notifications'

export default {
  setup() {
    const router = useRouter()
    const route = useRoute()
    const notification = reactive({
      item: {},
      emails: [],
    })
    const fetchNotification = async() => {
      const data = await getNotification(route.params.notification)
      const { data: emails } = await getEmailsNotification(route.params.notification)
      console.log('emails', emails)
      notification.item = data
      notification.emails = emails
      console.log(data)
    }
    fetchNotification()
    const showNotification = (notificationId) => router.push({ name: 'NotificationDetails', params: { notification: notificationId }})

    return { notification, showNotification }
  },

}
</script>

<style>

</style>