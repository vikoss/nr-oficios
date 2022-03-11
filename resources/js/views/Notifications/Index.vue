<template>
  <h1>notifications</h1>
  <div v-if="notifications.items">
    <div v-for="notification in notifications.items" :key="notification.id">
      <p>{{ notification.document }}</p>
      <p>{{ notification.id }}</p>
      <input type="button" value="Detaller" @click="showNotification(notification.id)">
    </div>
  </div>
  <h2 v-else>Niguna notification aun.</h2>
</template>

<script>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import { getNotifications } from './../../api/notifications'

export default {
  setup() {
    const router = useRouter()
    const notifications = reactive({
      items: [],
    })
    const fetchNotifications = async() => {
      const { data } = await getNotifications()
      notifications.items = data
      console.log(data);
    }
    fetchNotifications()
    const showNotification = (notificationId) => router.push({ name: 'NotificationDetails', params: { notification: notificationId }})

    return { notifications, showNotification }
  },

}
</script>

<style>

</style>