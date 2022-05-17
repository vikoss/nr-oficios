<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <redirect-to-back />
    <h1 class="mt-5">Notificaciones recibidas</h1>
    <h2>Consulta el estatus de las notificaciones que as recibido.</h2>
    <table-base
      v-show="app.isEmpty"
      :headers="[{ name: 'notification.name', label: 'Nombre de la notificacion' }, { name: 'notification.user.email', label: 'Quien envia' }, { name: 'sent_at', label: 'Fecha de recibido' }, ]"
      :data="app.notifications.data"
      :action="showItem"
      property-for-text-gray="verified_at"
      flattenData
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
import { getInbox } from './../../api/users'
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
      app.notifications = await getInbox(page)
    }
    fetchNotifications()
    const showItem = (id) => router.push({ name: 'EmailValidation', params: { email: id }})

    return { app, showItem, fetchNotifications }
  },

}
</script>
