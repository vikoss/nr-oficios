<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <redirect-to-back />
    <div v-show="app.isEmptyDataNotification" class="grid grid-cols-5 mt-5">
      <div class="col-span-5 sm:col-span-2">
        <h1>
          Notificacion
          <a :href="app.notification.document" class="uppercase hover:underline font-bold text-wine" target="_blank" rel="noopener noreferrer">
            {{ app.notification.name }}
          </a>
        </h1>
        <h2 class="mb-3">Consulta los correos de quienes fueron notificados.</h2>
        <div class="flex justify-center items-center h-full">
          <a
            :href="`${baseUrl}/descargar/reporte-de-notificacion/${app.notification.id}`"
            target="_blank"
            rel="noopener noreferrer"
            class="uppercase hover:text-base text-sm underline font-bold text-wine"
          >
            Descargar informe
          </a>
        </div>
      </div>
      <div class="col-span-5 sm:col-span-3">
        <embed
          v-show="app.isEmptyDataNotification"
          :src="app.notification.document"
          type="application/pdf"
          frameBorder="0"
          scrolling="auto"
          height="350"
          width="100%"
          :alt="app.notification.name"
        />
      </div>
    </div>
    <table-base
      v-show="app.isEmptyDataNotification"
      :headers="[
        { name: 'created_at', label: 'Fecha de registro' },
        { name: 'sent_at', label: 'Fecha de envio' },
        { name: 'to', label: 'Para' },
        { name: 'verified_at', label: 'Validado de recibido' }
      ]"
      :data="app.emails.data"
    />
    <pagination-base
      v-show="app.isEmptyDataEmails"
      :currentPage="app.currentPage"
      :offset="4"
      :lastPage="app.lastPage"
      @pageChanged="fecthEmails"
      class="float-right mt-5"
    />
    <h2 v-show="!app.isEmptyDataNotification" class="mt-4 text-xl text-wine">Niguna dato encontrado.</h2>
  </main>
</template>

<script>
import { reactive, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getNotification, getEmailsNotification } from './../../api/notifications'
import TableBase from '../../components/TableBase.vue'
import HeaderBase from '../../components/HeaderBase.vue'
import RedirectToBack from '../../components/RedirectToBack.vue'
import ButtonBase from './../../components/ButtonBase.vue'
import PaginationBase from '../../components/PaginationBase.vue'
import { API } from './../../api/baseUrl'

export default {
  components: { TableBase, HeaderBase, RedirectToBack, ButtonBase, PaginationBase },
  setup() {
    const router = useRouter()
    const route = useRoute()
    const app = reactive({
      notification: {},
      emails: {},
      currentPage: computed(() => app.emails.current_page
        ? app.emails.current_page
        : 1),
      lastPage: computed(() => app.emails.last_page
        ? app.emails.last_page
        : 1),
      isEmptyDataEmails: computed(() => {
        if (app.emails.data) {
          return !!app.emails.data.length
        }
        return false
      }),
      isEmptyDataNotification: computed(() => {
        if (app.notification.id) {
          return !!app.notification.id
        }
        return false
      }),
    })
    const fetchNotification = async() => {
      app.notification = await getNotification(route.params.notification)
    }
    const fecthEmails = async (page = 1) => {
      app.emails = await getEmailsNotification({ id: route.params.notification, page })
    }
    fecthEmails()
    fetchNotification()
    const showNotification = (id) =>
      router.push({ name: 'NotificationDetails', params: { notification: id }})
    const baseUrl = API;

    return { app, showNotification, fecthEmails, baseUrl }
  },

}
</script>

<style>

</style>