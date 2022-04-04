<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <redirect-to-back />
    <h1 class="mt-5">Notificaciones</h1>
    <h2>Consulta el estatus de las notificaciones enviadas o pendientes.</h2>
    <table-base
      v-if="notifications.items"
      :headers="[{ name: 'created_at', label: 'Fecha de registro' }, { name: 'name', label: 'Nombre de la notificacion' }]"
      :data="notifications.items"
      :action="showNotification"
    />
    <h2 v-else>Niguna notification aun.</h2>
  </main>
</template>

<script>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import { getNotifications } from './../../api/notifications'
import TableBase from '../../components/TableBase.vue'
import HeaderBase from '../../components/HeaderBase.vue'
import RedirectToBack from '../../components/RedirectToBack.vue'

export default {
  components: { TableBase, HeaderBase, RedirectToBack },
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