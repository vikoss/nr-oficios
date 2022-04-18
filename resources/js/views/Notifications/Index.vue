<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <redirect-to-back />
    <h1 class="mt-5">Notificaciones</h1>
    <h2>Consulta el estatus de las notificaciones enviadas o pendientes.</h2>
    <table-base
      v-show="app.isEmpty"
      :headers="[{ name: 'created_at', label: 'Fecha de registro' }, { name: 'name', label: 'Nombre de la notificacion' }]"
      :data="app.notifications.data"
      :action="showNotification"
    />
    <pagination-base
      v-show="app.isEmpty"
      :currentPage="app.currentPage"
      :offset="4"
      :lastPage="app.lastPage"
      @pageChanged="fetchNotifications"
      class="float-right mt-5"
    />
    <h2 v-show="!app.isEmpty" class="mt-4 text-xl text-wine">Niguna notification aun.</h2>
  </main>
</template>

<script>
import { computed, reactive } from 'vue'
import { useRouter } from 'vue-router'
import { getNotifications } from './../../api/notifications'
import TableBase from '../../components/TableBase.vue'
import HeaderBase from '../../components/HeaderBase.vue'
import RedirectToBack from '../../components/RedirectToBack.vue'
import PaginationBase from '../../components/PaginationBase.vue'

export default {
  components: { TableBase, HeaderBase, RedirectToBack, PaginationBase },
  setup() {
    const router = useRouter()
    const app = reactive({
      notifications: {},
      currentPage: computed(() => app.notifications.current_page
        ? app.notifications.current_page
        : 1),
      lastPage: computed(() => app.notifications.last_page
        ? app.notifications.last_page
        : 1),
      isEmpty: computed(() => {
        if (app.notifications.data) {
          return !!app.notifications.data.length
        }
        return false
      }),
    })
    const fetchNotifications = async (page) => {
      app.notifications = await getNotifications(page)
    }
    fetchNotifications()
    const showNotification = (notificationId) => router.push({ name: 'NotificationDetails', params: { notification: notificationId }})

    return { app, showNotification, fetchNotifications }
  },

}
</script>
